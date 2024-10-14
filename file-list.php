<?php

$directory = isset($_GET['dir']) ? $_GET['dir'] : __DIR__;
$directory = realpath($directory);  // Prevent directory traversal
$files = scandir($directory);

echo "<h2>Files and Folders in: " . basename($directory) . "</h2>";
echo "<ul>";
if ($directory !== __DIR__) {
    $parentDir = dirname($directory);
    echo "<li><a href='?dir=$parentDir'>.. (Up one level)</a></li>";
}

foreach ($files as $file) {
    if ($file != '.' && $file != '..') {
        $filePath = $directory . '/' . $file;

        if (is_dir($filePath)) {
            echo "<li><a href='?dir=$filePath'>$file/</a></li>";
        } else {
            echo "<li><a href='download.php?file=$filePath'>$file</a></li>";
        }
    }
}
echo "</ul>";
