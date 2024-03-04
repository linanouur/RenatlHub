<?php

include 'topost-con.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
   
    $address = $_POST['address'];
    $town = $_POST['wilaya'];
    $state = $_POST['baladiya'];
    $_SESSION['PROP_NAME']=$_POST['name'];
    $_SESSION['cat_id']=$_POST['category'];
    $_SESSION['price']=$_POST['price'];

    try {
      
        $sql = "INSERT INTO address (ADDRS_TEXT, WIL_NAME,BAL_NAME) 
                VALUES (?, ?,?)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$address, $town,$state]);
        $_SESSION['ADDRESS_ID']= $pdo->lastInsertId();

        $stml = null; 
       
        echo "New record created successfully";
        header("Location: post.php#property-form");
        exit();
    } catch (PDOException $e) {
        
        echo "Error: " . $e->getMessage();
    }
} 
else {
    echo "Else branch entered";
    sleep(10);
    header("Location: index.php");
    exit();
}


