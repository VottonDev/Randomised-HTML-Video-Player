<?php
require_once('mysql-connector.php');
// Disable registrations
$registration_enabled = false;

// Register a new account to the database and hash the password with bcrypt
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!$res = $mysqli->query("SELECT * FROM `users` WHERE `username` = ':username'")) {
        echo "Failed to retrieve user: " . $mysqli->error;
    }
    $user = $res->fetch_object();
    if ($user) {
        echo "User already exists";
    } else {
        // Hash the password with bcrypt
        $options = [
      'cost' => 12,
    ];
        $password = password_hash($password, PASSWORD_BCRYPT, $options);
        if (!$res = $mysqli->query("INSERT INTO `users` (`username`, `password`) VALUES (':username', ':password')")) {
            echo "Failed to insert user: " . $mysqli->error;
        }
    }
}
?>

<?php if ($registration_enabled) { ?>
<form action="register.php" method="post">
  <input type="text" name="username" placeholder="Username">
  <input type="password" name="password" placeholder="Password">
  <input type="submit" value="Register">
</form>
<?php } ?>
