<?php
header('Content-Type: application/json; charset=utf-8');
echo json_encode(['day' => (int)date('d')], JSON_UNESCAPED_UNICODE);
