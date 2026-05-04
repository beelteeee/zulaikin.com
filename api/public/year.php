<?php
header('Content-Type: application/json; charset=utf-8');
echo json_encode(['year' => (int)date('Y')], JSON_UNESCAPED_UNICODE);
