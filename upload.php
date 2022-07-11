<?php

require_once('config.php');
$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// Add submitted video from admin.php to the database
if (isset($_POST['submit'])) {
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['fileToUpload']['name'])));
        $extensions = array("mp4", "webm");
        if (in_array($file_ext, $extensions) === false) {
            echo "Extension not allowed, please use mp4 or webm.";
        }
        if ($file_size > 20971520) {
            echo "File size must be less than 20 MB";
        }
        $file_name_new = uniqid('', true) . "." . $file_ext;
        $file_destination = 'files/' . $file_name_new;
        move_uploaded_file($file_tmp, $file_destination);
        // INSERT INTO `videos` (`id`, `file`, `name`) VALUES
        $mysqli->query("INSERT INTO `videos` (`file`, `name`) VALUES (':file_name_new', ':file_name')");
    }
}
