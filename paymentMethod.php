<?php

include 'topost-con.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

try {
$pay_method= $_POST['PaymentsMehtods']; 
        if (is_array($pay_method)) {
            foreach ($pay_method as $row) {
                $sql = "INSERT INTO prop_paymentmethod (PROP_ID,PAY_METHOD_ID ) 
                VALUES (?, ?)";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_SESSION['Prop_ID'], $row]);
 
                $stml=null; 

            }
        
        }

echo "New record created successfully";
header( "Location: post.php#equipment-form");

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
            