<?php
$response = ['success' => false, 'images' => []];

$uploadDir = 'uploads/';
if (is_dir($uploadDir)) {
    $files = scandir($uploadDir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $response['images'][] = $uploadDir . $file;
        }
    }
    $response['success'] = !empty($response['images']);
}

echo json_encode($response);

