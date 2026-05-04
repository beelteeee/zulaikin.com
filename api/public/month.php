<?php

header('Content-Type: application/json; charset=utf-8');
echo json_encode(['month' => (int)date('m')], JSON_UNESCAPED_UNICODE);
