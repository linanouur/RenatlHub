<?php

include 'topost-con.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $equipments= $_POST['equipments']; 
                if (is_array($equipments)) {
                    foreach ($equipments as $row) {
                        $sql = "INSERT INTO equipment_property (PROP_ID,EQUI_ID ) 
                        VALUES (?, ?)";
        
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$_SESSION['Prop_ID'], $row]);
         
                        $stml=null;
                    }
                
                }
        
        echo "New record created successfully";
        } catch (PDOException $e) {
        
        echo "Error: " . $e->getMessage();
        }
        }
        else {
        echo "Else branch entered";
        sleep(10);
        header("Location: index.html");
        exit();
        }
                    

