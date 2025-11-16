<?php

function uploadImage()
{
    $uploadDir = __DIR__ . '/uploads/';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['image'];

        // Ensure tmp_name is not empty
        if (empty($file['tmp_name'])) {
            return null;
        }

        // Validate MIME type
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($file['tmp_name']);
        $allowed = ['image/jpeg', 'image/png', 'image/webp'];

        if (!in_array($mime, $allowed)) {
            return null; // Invalid file type
        }

        // Create clean unique filename
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = time() . "_" . bin2hex(random_bytes(4)) . "." . $ext;

        if (move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) {
            return $filename;
        }
    }

    return null;
}
