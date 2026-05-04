<?php


require_once 'config.php';
header('Content-Type: application/json; charset=utf-8');

$action = $_GET['action'] ?? '';
$id = (int)($_GET['id'] ?? 0);
$pdo = getDbConnection();

if (!$pdo) {
    http_response_code(500);
    echo json_encode(['error' => 'DB connection failed']);
    exit;
}

switch ($action) {
    case 'all':
        $stmt = $pdo->query("SELECT * FROM articles ORDER BY created_at DESC");
        echo json_encode($stmt->fetchAll(), JSON_UNESCAPED_UNICODE);
        break;
        
    case 'get':
        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'id required']);
            break;
        }
        $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch();
        echo $result ? json_encode($result, JSON_UNESCAPED_UNICODE) : json_encode(['error' => 'Not found']);
        break;
        
    case 'del':
        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'id required']);
            break;
        }
        $stmt = $pdo->prepare("DELETE FROM articles WHERE id = :id");
        $stmt->execute([':id' => $id]);
        echo json_encode(['deleted' => $stmt->rowCount() > 0]);
        break;
        
    case 'edit':
        if (!$id || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(400);
            echo json_encode(['error' => 'id and POST required']);
            break;
        }
        $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;
        $title = $input['title'] ?? '';
        $content = $input['content'] ?? '';
        
        if (!$title || !$content) {
            http_response_code(400);
            echo json_encode(['error' => 'title and content required']);
            break;
        }
        
        $stmt = $pdo->prepare("UPDATE articles SET title = :title, content = :content, updated_at = NOW() WHERE id = :id");
        $stmt->execute([':title' => $title, ':content' => $content, ':id' => $id]);
        echo json_encode(['updated' => $stmt->rowCount() > 0]);
        break;
        
    default:
        http_response_code(400);
        echo json_encode(['error' => 'Unknown action. Use: all, get, del, edit']);
}
