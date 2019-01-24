<?php
  session_start();
  require 'datos/database.php';
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome to My Page</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

      <?php require 'partials/header.php'; ?>

      <?php if(!empty($user)): ?>
        <br> Welcome. <?= $user['email']; ?>
        <br>  You are Logged in.
        <a href="logout.php">Logout</a>
      <?php else:  ?>

      <h1>Please Login or SignUp</h1>
      <a href="login.php">Login</a> or
      <a href="signup.php">signUp</a>
    <?php endif; ?>

  </body>
</html>
