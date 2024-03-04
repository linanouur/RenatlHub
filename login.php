<?php 
session_start(); 
include "dbh.conn.php";

if (isset($_POST['emailOrName']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['emailOrName']);
    $pass = $_POST['password']; // Do not hash the password here

    if (empty($uname) || empty($pass)) {
        header("Location: newlogin.php?error=Name or email and password are required");
        exit();
    } else {
        echo "valid input";

        // Use prepared statement to prevent SQL injection
        $sql = "SELECT * FROM user WHERE EMAIL=?"; // Only selecting by email for simplicity

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: newlogin.php?error=SQL error");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $uname);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                $hashed_pw = $row['USER_PW'];

                if (password_verify($pass, $hashed_pw)) {
                    $_SESSION['EMAIL'] = $row['EMAIL'];
                    $_SESSION['fname'] = $row['F_NAME'];
                    $_SESSION['lname'] = $row['L_NAME'];
                    $_SESSION['phone']=$row['PHONE_NUM'];
                    $_SESSION['id'] = $row['USER_ID'];
                    $_SESSION['birthdate'] = $row['BIRTH_DATE'];
                    echo "Connect Successfully!";
                    header("Location: newprofile.php");
                    exit();
                } else {
                    header("Location: newlogin.php?error=Incorect User name or USER_PW");
                    exit();
                }
            } else {
                header("Location: newlogin.php?error=Incorect User name or USER_PW");
                exit();
            }
        }
    }
} else {
    header("Location: newlogin.php");
    exit();
}

