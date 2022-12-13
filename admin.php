<?php
// If $_SESSION['username'] is set, then the user is logged in
if (isset($_SESSION['username'])) {
    echo "Welcome, " . $_SESSION['username'] . "!";
} else {
    echo "You are not logged in";
    // Redirect back to login page
    header('Location: login.php');
}

?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
</form>
