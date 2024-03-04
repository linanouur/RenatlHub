<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $name = $_POST["name"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    try {
        $dsn = "mysql:host=localhost;dbname=rentalhub";
        $dbusername = "root";
        $dbpassword = "";

        // Establish a PDO connection
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement with placeholders
        $query = "INSERT INTO contact (CONTC_NAME, CONTC_EMAIL, C_SUBJECT, C_MESSAGE) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);

        // Execute the prepared statement with parameters
        $stmt->execute([$name, $email, $subject, $message]);

        // Close the connection and statement
        $pdo = null;
        $stmt = null;

        // Redirect to index.html
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        // Handle any exceptions that occur during the process
        die("Query failed: " . $e->getMessage());
    }
} else {
    echo "Else branch entered";
    sleep(10);
    header("Location:  index.php");
    exit();
}
?>
