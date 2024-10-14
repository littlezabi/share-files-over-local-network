<?php
ini_set('memory_limit', '1G');
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $file = realpath($file);
    if (file_exists($file)) {
        // Force download dialog if not a common displayable file
        $fileType = mime_content_type($file);
        header('Content-Description: File Transfer');
        header('Content-Type: ' . $fileType);
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    } else {
        echo "File does not exist.";
    }
} else {
    echo "No file specified.";
}
