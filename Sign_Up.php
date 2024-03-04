<?php 
include("signup_conn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="Sign_up.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body{
            background-image: linear-gradient(115deg, rgba(18, 18, 59, 0.8), rgba(82, 82, 120, 0.7)), url("images/Herosectionpic.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>
    <div class="sign-up-form">
        <div class="header">
            <a href="index.php"> <img src="images/logodarkcolor.png" class="logo" alt="Logo"> </a>
            <h1 class="greet">
                <span class="welcome">Welcome to</span>
                <span class="rentalhub">RentalHub</span>
            </h1>
        </div>
        <h2>Create an Account</h2>
        <form id="form" action="signup.php" method="POST">
            <div class="input-control">
                <label for="first-name">First Name</label>
                <input type="text" class="input-box" name="first-name" id="first-name" placeholder="Ex: Mohamed"
                    size="15" maxlength="30" autocomplete="off">
                <small id="first-nameError" class="error"></small>
            </div>

            <div class="input-control">
                <label for="last-name">Last Name</label>
                <input type="text" class="input-box" name="last-name" id="last-name" placeholder="Ex: Belkacem"
                    size="15" maxlength="30" autocomplete="off">
                <small id="last-nameError" class="error"></small>
            </div>

            <div class="input-control">
                <label for="email">Email Address</label>
                <input type="email" class="input-box" name="email" id="email" placeholder="example@mail.com" size="15"
                    maxlength="50" autocomplete="off">
                <small id="emailError" class="error"></small>
            </div>
            <div class="input-control">
                <label for="password">Password</label>
                <input type="password" class="input-box" name="password" id="password" placeholder="********" size="15"
                    maxlength="20" minlength="8" autocomplete="off">
                <small id="passwordError" class="error"></small>
            </div>

            <div class="input-control">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" class="input-box" name="confirm-password" id="confirm-password"
                    placeholder="********" size="15" maxlength="20" minlength="8" autocomplete="off">
                <small id="confirm-passwordError" class="error"></small>
            </div>
            <div class="input-control">
                <label for="date-of-birth">Date of Birth</label>
                <input type="date" class="input-box" name="date-of-birth" id="date-of-birth"
                    placeholder="Ex: 01/01/1990" size="15" autocomplete="off">
                <small id="date-of-birthError" class="error"></small>
            </div>
            <div class="input-control">
                <label for="phone-number">Phone Number</label>
                <input type="tel" class="input-box" name="phone-number" id="phone-number"
                    placeholder="Ex: (+213) 123456789" size="15" maxlength="12" autocomplete="off">
                <small id="phone-numberError" class="error"></small>
            </div>
            <a href="newprofile.html" class="button-box">
                <input type="submit" value="Sign Up" id="Submit-Btn">
            </a>

            <p>Already have an account? <a href="newlogin.php"><b>Log in</b></a></p>
            <p><b>By creating an account, you agree to our <a href="terms&privacy.html#terms">Terms of Use</a> and <a
                        href="terms&privacy.html#pp">Privacy & Policy</a>.</b></p>
        </form>
    </div>
</body>

</html>