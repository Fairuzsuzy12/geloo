<?php
$response = ['success' => false, 'images' => []];

if (!empty($_FILES['images']['name'][0])) {
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
        $fileName = basename($_FILES['images']['name'][$key]);
        $targetFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($tmpName, $targetFilePath)) {
            $response['images'][] = $targetFilePath;
        }
    }

    $response['success'] = !empty($response['images']);
}

echo json_encode($response);

