<?php
include('set_conn.php');

session_start();
$user_id = $_SESSION['id']; // Assuming you have a user ID in the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : null;
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : null;

    // Validate and sanitize user input
    // Add additional validation logic as needed

    // Use prepared statements to prevent SQL injection
    $update_query = "UPDATE user SET F_NAME = ?, L_NAME = ?, EMAIL = ?, USER_PW = ?, PHONE_NUM = ? WHERE USER_ID = ?";

    $stmt = mysqli_prepare($connection, $update_query);
    
    // Check if the statement was prepared successfully
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sssssi', $first_name, $last_name, $email, $password, $phone, $user_id);

        if (mysqli_stmt_execute($stmt)) {
            // Update successful
            echo "Update Successfull";
            header("settings.php");

        } else {
            // Update failed
            echo json_encode(['success' => false, 'message' => 'Update failed']);
        }

        mysqli_stmt_close($stmt);
    } else {
        // Handle statement preparation failure
        echo json_encode(['success' => false, 'message' => 'Statement preparation failed']);
    }
} else {
    // Handle invalid request method
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
