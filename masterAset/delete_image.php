<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file_path = $_POST['file_path'];

    // Check if the file exists and delete it
    if (file_exists($file_path)) {
        unlink($file_path);
    }

    // Redirect back to index.php
    header("Location: index.php");
    exit();
}
?>
