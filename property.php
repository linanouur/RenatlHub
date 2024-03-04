<?php

include 'topost-con.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['contract-image']) && !empty($_FILES['images']['name'][0])) {
    
   
    $area=$_POST["area"];
    $view=$_POST["view"];
    $security=$_POST["security"];
    $floors=$_POST["floors"];
    $desc=$_POST["description"];
    $paymentBy=$_POST["payment-by"];
    $numRooms=$_POST["rooms"];    
    $address = $_POST['address'];
    $town = $_POST['wilaya'];
    $state = $_POST['baladiya'];
    $prop_name=$_POST['name'];
    $cat_id=$_POST['category'];
    $price=$_POST['price'];
    $checkIn=$_POST['from'];
    $checkOut=$_POST['to'];

    $img_name=$_FILES['contract-image']['name'];  
    $img_size=$_FILES['contract-image']['size'];  
    $tmp_name=$_FILES['contract-image']['tmp_name'];  
    $error=$_FILES['contract-image']['error']; 
        
   
 if($error === 0) 
{ 
 $img_ex=pathinfo($img_name,PATHINFO_EXTENSION); 
 $img_ex_lc=strtolower($img_ex); 
 $allowed_exs=array("jpg" , "jpeg", "png"); 
 if(in_array($img_ex_lc,$allowed_exs)) 
 { 
    $new_img_name=uniqid("IMG-", true ). '.'.$img_ex_lc;  
   $img_upload_path='Uploads/'.$new_img_name; 
    move_uploaded_file($tmp_name,$img_upload_path); 

 } 
 else { 
    echo"you cannot upload pictures of this type "; 
 }
}  try{
        $sql = "INSERT INTO property (PROP_DESC,PRICE,CAT_ID ,PROP_NAME,OWNER_ID,CHECK_IN,CHECK_OUT,P_CONTRACT,VIEW,AREA,P_SECURITY,FLOORS_NUM,PAYMENT_BY,NUM_ROOMS,ADDRS_TEXT, WIL_NAME,BAL_NAME)
        
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$desc,$price,$cat_id,$prop_name,$_SESSION['id'],$checkIn,$checkOut, $img_upload_path,
        $view,$area, $security,$floors,$paymentBy,$numRooms,$address,$town,$state]);
         
        $_SESSION['Prop_ID']=$pdo->lastInsertId();
        $stml=null; 
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['images']['name'][$key];
            $file_size = $_FILES['images']['size'][$key];
            $file_tmp = $_FILES['images']['tmp_name'][$key];
            $error = $_FILES['images']['error'][$key];
    
            if ($error === 0) {
                $img_ex = pathinfo($file_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg", "jpeg", "png");
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'Uploads/' . $new_img_name;
    
                    move_uploaded_file($file_tmp, $img_upload_path);
    
                    // Insert data into your database table
                    $sql = "INSERT INTO  images (PROP_ID,IMG_URL) VALUES (?,?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$_SESSION['Prop_ID'],$new_img_name]);
                } else {
                    echo "You cannot upload pictures of this type: $file_name <br>";
                }
            } else {
                echo "Error uploading file: $file_name <br>";
            }
        }
    
        echo "New record created successfully";
        header( "Location: post.php#component-form");
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
