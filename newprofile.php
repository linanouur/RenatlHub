<?php
session_start();
include_once "includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newprofile.css">
    <link rel="icon" href="images/logolightcolor.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <script defer src="profile.js"></script>
    <script src="main.js"></script>
    
    <title>Profile</title> 
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 10px;
        }

        form {
            max-width: 150px; 
            
            margin: 2% auto;
            background-color: #fff;
            padding: 2px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-label {
            display: block;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: -15%;
        }

       

        .profile-submit {
            background-color: rgba(33, 53, 85, 1);
            color: #fff;
            padding: 5px 5px; 
            border: none; 
            margin-bottom: 2%;
            margin-top: -20%; 
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

       

        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            margin: -1px;
            padding: 0;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0;
        } 
        

        img.img-search {
            height: 25vh;
        }
        .container{
            display: flex;
            flex-direction: row;
        }
        .post{
            display: flex;
            flex-direction: column;
            width: 20vw;
        }
        .details{
            display: flex;
            flex-direction: column;
            align-items: start;
        }
    </style>
</head>
<body>
    
   <div class="icon"><i class="fa-solid fa-bars" ></i></div> 
 
   
        <div class="navbar">
            <div class="icon2"><i class="fa-thin fa-x" style="color: #ffffff;"></i></div> 
            
           <div class="logo">
            <a href="index.php"><img src="./images/logolightall.png" alt=""></a>
                    </div>
            <ul class="menu"> 
                <div class="insidePage">
                <li class="li"> 
                    <a href="searchpage.php"> 
                        <p>Rent</p> 
                    </a> 
                </li> 
           
                <li class="li"> 
                    <a href="post.php"> 
                        <p>Post</p> 
                    </a> 
                </li> 
                <li class="li"> 
                    <a href="searchpage.php"> 
                        <p>Categories</p> 
                    </a> 
                </li> 
    
                <li class="li"> 
                    <a href="clientrequest.html"> 
                        <p>Clients Request</p> 
                    </a> 
                </li> 
    
                <li class="li"> 
                    <a href="notifications.html"> 
                        <p>Notifications</p> 
                    </a> 
                </li> 
    
    
                <li class="li"> 
                    <a href="about.html"> 
                        <p>About us</p> 
                    </a> 
                </li> 

                <li class="li"> 
                    <a href="settings.php"> 
                        <p>Settings</p> 
                    </a> 
                </li> 

            </div>
        
            
                <li class="log-out"> 
                    <a href="logOut.php" > 
                        <i class="fas fa-sign-out"></i> 
                        <p>Log out</p> 
                    </a> 
                </li> 
            </ul> 
        </div> 
    
        </div>
    

<div class="content">
    <div class="profile-rectangle"> 
    <div class="profile-img">
        <?php
        $sql = "SELECT IMG_PRF FROM user WHERE USER_ID = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $_SESSION['id'], PDO::PARAM_INT);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!isset($userData['IMG_PRF'])) {
            echo '<img src="images/profile-default-pic.png" alt="" class="profile-pic" width="100" height="100">';
        }
        else{
         $imgSrc = isset($userData['IMG_PRF']) ? 'Uploads/' . $userData['IMG_PRF'] : 'images/profilee.png';
        echo '<img src="' . $imgSrc . '" alt="" class="profile-pic" id="profile-pic" width="100" height="100">';}
    ?>
<br>
<form method="post" action="profile-picture.php"  enctype="multipart/form-data">
<label for="prof-image" class="profile-label">Change Picture</label>

<br>
            <input type="file" name="prof-image" id="prof-image" class="profile-file visually-hidden" accept=".jpg,.jpeg,.png"/>
            <br>
            
            
            <button type="submit" name="submit" class="profile-submit">Save</button>
        </form>
    </div>

    

       <!-- <img src="images/person.png" alt="" class="profile-pic" width="100" height="100">  -->


        <div class="name-email"> 
            <p class="name">
                <?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname'];?>
                </p> 
            <div class="nameoutput"></div>
            <p class="email">
            <?php echo $_SESSION['EMAIL'];?>

            </p> 
            <div class="emailoutput"></div>
            <p class="phone">Phone Number : <?php echo ' 0'. $_SESSION['phone'];?> </p> 
            <div class="phoneoutput"></div>
        </div> 

    </div>

    <div class="choice">
        <div class="CHF">FAVORITS</div>
        <div class="CHPr">PreviousRents</div>
        <div class="CHPo">POSTS</div>
    </div>

    <div class="Favourits">
    <?php
    try {
        include_once "includes/dbh.inc.php";
        $query = "SELECT p.PROP_ID, p.PROP_DESC, p.PRICE
                  FROM favourits f
                  JOIN property p ON f.PROP_ID = p.PROP_ID
                  WHERE f.USER_ID = :id";

        $st = $pdo->prepare($query);
        $st->bindParam(":id", $_SESSION['id']);
        $st->execute();

        while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
            // Access each property detail
            $propID = $row['PROP_ID'];
            $propDesc = $row['PROP_DESC'];
            $price = $row['PRICE'];

            // Display Favourits details
            echo '
                <div class="fav">
                    <a href="propertysample.php?id=' . $propID . '" >
                        <img src="images2/1280x960 (1).webp" alt="">
                        <div class="details">
                            <div class="desc">' . $propDesc . '</div>
                            <div class="price">Price: ' . $price . '</div>
                            <!-- Add other details here -->
                        </div>
                    </a>
                </div>
            ';
        }
    } catch (PDOException $e) {
        header("Location: index.php");
    }
    ?>
</div>

  <div class="PreviousRents">
  <?php

    try {
        include_once "includes/dbh.inc.php";
        $query = "SELECT p.PROP_ID, p.PROP_DESC, p.PRICE
                  FROM previous_rents f
                  JOIN property p ON f.PROP_ID = p.PROP_ID
                  WHERE f.USER_ID = :id";

        $st = $pdo->prepare($query);
        $st->bindParam(":id", $_SESSION['id']);
        $st->execute();

        while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
            // Access each property detail
            $propID = $row['PROP_ID'];
            $propDesc = $row['PROP_DESC'];
            $price = $row['PRICE'];

            // Display Favourits details
            echo '
                <div class="preRent">
                    <a href="propertysample.php?id=' . $propID . '" >
                        <img src="images2/1280x960 (1).webp" alt="">
                        <div class="details">
                            <div class="desc">' . $propDesc . '</div>
                            <div class="price">Price: ' . $price . '</div>
                            <!-- Add other details here -->
                        </div>
                    </a>
                </div>
            ';
        }
    } catch (PDOException $e) {
        header("Location: index.php");
    }
    
        ?>

</div>


<div class="posts">
    
            <?php
    try {
        include_once "includes/dbh.inc.php";
        $query = "SELECT p.PROP_ID, p.PROP_DESC, p.PRICE
                  FROM posts f
                  JOIN property p ON f.PROP_ID = p.PROP_ID
                  WHERE f.USER_ID = :id";

        $st = $pdo->prepare($query);
        $st->bindParam(":id", $_SESSION['id']);
        $st->execute();

        while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
            // Access each property detail
            $propID = $row['PROP_ID'];
            $propDesc = $row['PROP_DESC'];
            $price = $row['PRICE'];
            $sql = "SELECT IMG_URL FROM images WHERE PROP_ID=:id;";
            $sti = $pdo->prepare($sql);
            $sti->bindParam(":id", $propID);
            $sti->execute();
            
            $result = $sti->fetchAll(PDO::FETCH_ASSOC); 
            
            if ($result) {
                echo '<div class="container"> ';
                foreach ($result as $row) {
                    echo '<div class="post">';
                    echo '<a href="propertysample.php?id=' . $propID . '" >';
                    
                    echo'<img class="img-search" src="Uploads/' . htmlspecialchars($row['IMG_URL'], ENT_QUOTES, 'UTF-8') . '" alt="Image">';
                    echo '
                <div class="post">
                    

                
                        <div class="details">
                            <div class="desc">' . $propDesc . '</div>
                            <div class="price">Price: ' . $price . '</div>
                            <!-- Add other details here -->
                        </div>
                    
                </div>
             </a>';

            echo '</div>';
            
                    break;
                }
                echo '</div>';
  
            } else {
                echo "No images found.";
            }
            // Display Favourits details
            
        }
    } catch (PDOException $e) {
        header("Location: index.php");
    }
    ?>
        
 </div>
    
</body>
</html>