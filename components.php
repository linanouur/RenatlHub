<?php

include 'topost-con.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

try {
$components= $_POST['components']; 
        if (is_array($components)) {
            foreach ($components as $row) {
                $sql = "INSERT INTO component_property (PROP_ID,COMPO_ID ) 
                VALUES (?, ?)";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_SESSION['Prop_ID'], $row]);
 
                $stml=null; 

            }
        
        }

echo "New record created successfully";
header( "Location: post.php#pay_method");

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
            