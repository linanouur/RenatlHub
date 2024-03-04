<?php
  include_once 'signup_conn.php';
  session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    $date_of_birth = $_POST["date-of-birth"];
    $phone_number = $_POST["phone-number"];

    // Insert user data into the database
    $sql = "INSERT INTO user (F_NAME, L_NAME , EMAIL, USER_PW, DATE_BIRTH, PHONE_NUM) VALUES ('$first_name', '$last_name', '$email', '$password', '$date_of_birth', '$phone_number')";
    $sql2 = "select * from user where EMAIL='$email'";

    $result = mysqli_query($conn, $sql2);
    $count_user = mysqli_num_rows($result);

    if($count_user>0){
        echo '<script>
        window.location.href="Sign_Up.php";
        alert("Email Already exist!");
        </script>';
    }
    

    else if ($count_user == 0) {
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            $last_inserted_id = mysqli_insert_id($conn);
    
            $_SESSION['id'] = $last_inserted_id;
            $_SESSION['EMAIL'] = $email;
            $_SESSION['fname'] = $first_name;
            $_SESSION['lname'] = $last_name;
            $_SESSION['phone'] = $phone_number;
    
            // Redirect to a success page or login page
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
    $conn->close();
?>