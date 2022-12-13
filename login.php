<?php
require_once('mysql-connector.php');
// Login to website
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!$res = $mysqli->query("SELECT * FROM `users` WHERE `username` = :username'")) {
        echo "Failed to retrieve user: " . $mysqli->error;
    }
    $user = $res->fetch_object();
    if ($user) {
        if (password_verify($password, $user->password)) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user->id;
            header('Location: index.php');
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User does not exist";
    }
}
?>

<form action="login.php" method="post">
  <input type="text" name="username" placeholder="Username">
  <input type="password" name="password" placeholder="Password">
  <input type="submit" value="Login">
</form>
