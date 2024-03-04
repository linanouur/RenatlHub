<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="newlogin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
  <title>Log in</title>
</head>

<body>
  <main>
    <div class="container">
      <div class="intro">
        <a class="logo" href="index.php"><img src="images/logodarkcolor.png" alt="Logo"></a>

        <h1>Welcome to <span>RentalHub</span></h1>
      </div>




      <form action="login.php" method="post">
      <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

        <label for="emailOrName">Email Address</label>
        <div class="input"><input type="text" name="emailOrName" id="emailOrName" required></div>
        <message></message>
        <label for="password">Password</label>
        <div class="input"><input type="password" name="password" id="password" required></div>
        <message2></message2>
        <a href="#" class="forgot">Forgot Password?</a>
        <p class="noaccount">Don't have an account? <a href="Sign_Up.php" class="signup">Sign up</a></p>
        <input type="submit" value="Log in" class="login">


      </form>





    </div>
  </main>
</body>

</html>