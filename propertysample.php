<?php
    // propertysample.php
  session_start();
    try {
        include_once "includes/dbh.inc.php";
        
        // Retrieve property ID from the URL
        $propID = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$propID) {
            // Redirect to an error page or handle the situation accordingly
            header("Location: error.html");
            exit();
        }
        
        // Fetch property details based on the property ID
        $query = "SELECT * FROM property WHERE PROP_ID = :propID";
        $st = $pdo->prepare($query);
        $st->bindParam(":propID", $propID);
        $st->execute();
        
        if ($row = $st->fetch(PDO::FETCH_ASSOC)) {
            // Access property details and display them as needed
            $propDesc = $row['PROP_DESC'];
            $price = $row['PRICE'];
            $addressText = $row['ADDRS_TEXT'];
            $addressBal = $row['BAL_NAME'];
            $addressWil = $row['WIL_NAME'];
            $catnum=$row['CAT_ID'];
            $proName=$row['PROP_NAME'];
            $ownID=$row['OWNER_ID'];
            $view=$row['VIEW'];
            $area=$row['AREA'];
            $rating=$row['RATING'];
            $ps=$row['P_SECURITY'];
            $fnum=$row['FLOORS_NUM'];
            $pBy=$row['PAYMENT_BY'];
            $nrooms=$row['NUM_ROOMS'];
           
        } else {
            // Handle the situation where the property with the given ID is not found
            echo '<p>Property not found</p>';
        }
    } catch (PDOException $e) {
        // Handle database connection error
        echo '<p>Error connecting to the database</p>';
    }
    ?>


<!DOCTYPE html>

<html class="no-js"> 

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Property sample</title>
    
    <meta name="keyword" content="html5, css, bootstrap, property, real-estate theme , bootstrap template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

   
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="propertysample.css" />  
    <link rel="stylesheet" href="./CssFiles/footer.css">  
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"> 

    <link href="assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icheck.min_all.css">
    <link rel="stylesheet" href="assets/css/price-range.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">
    <link rel="stylesheet" href ="PropertyReview.css"> 
    <link rel="stylesheet" href="assets/css/lightslider.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <style>
        .footer
{
    background-color: #213555;
    display: flex;
    align-items: center;
    flex-direction: column;
    width: 100%;
    justify-content: space-evenly;
}
 .left-footer{
    display: flex;
    width: 20%;
    margin-left: 10px;
    flex-direction: column;
}
.footer-container{
    display: flex;
    width: 100%;
    justify-content: space-evenly;
}
 .left-footer img{
    width: 220px;
    height: 220px;
}
 .footer p{
color: white;
font-size: 0.8em;}
.right-footer{
    display: flex;
    gap: 40px;
}
.right-footer .Get-In-Touch,.right-footer .quick-links{
    display: flex;
    gap: 10px;
    flex-direction: column;
}
.right-footer  img{
    width: 20px;
    height: 20px;
}

.right-footer .Get-In-Touch p,.right-footer .quick-links p{
    color: white;
    font-weight: bold;
    font-size: 1.4em;
} 
.right-footer .Get-In-Touch .location-footer,.right-footer .Get-In-Touch .phone,.right-footer .Get-In-Touch .mail{
    display: flex;
    align-items: center;
    gap: 5px;
    color: rgb(173, 168, 168);
    font-size: 0.8em;
}
.right-footer .Get-In-Touch .social-media{
    text-align: center;
}
.right-footer .quick-links{
    display: flex;
    gap: 10px;
    
}
.right-footer .quick-links a{
    color: rgb(173, 168, 168);
    font-size: 0.8em;
    font-weight: 600;
}
.right-footer .quick-links a:hover{
    font-size: 0.9em;
}
@media (max-width:700px) {
    .right-footer .Get-In-Touch p,.right-footer .quick-links p{
        
        font-size: 1em;
    }
    .footer-container{
        justify-content: space-between;
    }
    .right-footer .quick-links a,.right-footer .Get-In-Touch .location-footer,.right-footer .Get-In-Touch .phone,.right-footer .Get-In-Touch .mail{
        font-size: 0.6em;
    }
     .left-footer img{
        
        width: 120px;
        height: 120px;
    }
     .footer p{
        font-size: 0.6em;}
    
}
    </style>
</head>

<body>

    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>



    <div class="searchuser">
        <div class="profile-rectangle">
            <a href="newprofile.php"> <img src="images/user picture.png" alt="" class="profile-pic"> </a>
            <div class="name-email">
                <p class="name">
                    <?php
                    echo $_SESSION['fname'] . ' ' . $_SESSION['lname'];
                    ?>
                </p>
                <p class="email">
                <?php
               echo $_SESSION['EMAIL'] ;
                    ?>
                </p>
            </div>

        </div>
        <div class="search-bar">
            <form class="hero-section-search">
                <input type="text" placeholder="location">
                <input type="date" placeholder="Period">
                <select name="category">

                    <option value="" disabled>Choose category</option>
                    <option value="Longterm">Long term</option>
                    <option value="shortterm">short term</option>
                    <option value="collocation">Collocation</option>
                    <option value="Events">Events</option>


                </select>
                <input type="number" placeholder="Number of adults" min="0">
                <button type="submit">Search</button>
            </form>
        </div>

    </div>

    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">
                        <?php
                        echo $proName .'<br>';
                        ?></h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <!-- property area -->
    <div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
        <div class="container">

            <div class="clearfix padding-top-40">

                <div class="col-md-8 single-property-content prp-style-2">
                    <div class="">
                        <div class="row">
                            <div class="light-slide-item">
                                <div class="clearfix">
                                    <div class="favorite-and-print">
                                        <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                        <a class="printer-icon " href="javascript:window.print()">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>

                                    <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
    <?php
    try { 
        include_once "includes/dbh.inc.php";
        
        $sql = "SELECT IMG_URL FROM images WHERE PROP_ID=:id;";
        $st = $pdo->prepare($sql);
        $st->bindParam(":id", $propID);
        $st->execute();
        
        $result = $st->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            foreach ($result as $row) {
                echo '<li data-thumb="Uploads/' . htmlspecialchars($row['IMG_URL'], ENT_QUOTES, 'UTF-8') . '">';
                echo '<img src="Uploads/' . htmlspecialchars($row['IMG_URL'], ENT_QUOTES, 'UTF-8') . '" alt="Image">';
                echo '</li>';
            }
        } else {
            echo "No images found.";
        }
    } catch (PDOException $e) {
        echo "PDOException: " . $e->getMessage();
    }
    ?>
</ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-property-wrapper">

                            <div class="section">
                                <h4 class="s-property-title">Description</h4>
                                <div class="s-property-content">
                                    <p><?php
                                    echo $propDesc .'<br>' ;
                                    ?> </p>
                                </div>
                            </div>
                            <!-- End description area  -->

                            <div class="section additional-details">

                                <h4 class="s-property-title">Additional Details</h4>

                                <ul class="additional-details-list clearfix">
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Area</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php
                                        echo $area;
                                        ?> m2</span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">View</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">
                                            <?php
                                            echo $view;
                                            ?>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Floors</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">
                                            <?php
                                            echo $fnum;
                                            ?>
                                        </span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Security</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">
                                            <?php
                                            echo $ps;
                                            ?>
                                        </span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Payment by</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">
                                            <?php
                                            echo $pBy;
                                            ?>
                                        </span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">rating </span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">
                                            <?php  echo $rating ;?>
                                        </span>
                                    </li>

                                </ul>
                            </div>
                            <!-- End additional-details area  -->

                            <?php
try {
    include_once "includes/dbh.inc.php";

    // Fetch component IDs related to the property
    $query1 = $pdo->prepare("SELECT COMPO_ID FROM component_property WHERE PROP_ID = :propID");
    $query1->bindParam(':propID', $propID);
    $query1->execute();
    $componentIDs = $query1->fetchAll(PDO::FETCH_COLUMN);

    // Fetch component names based on the retrieved component IDs
    $query = $pdo->prepare("SELECT 	COMPONENT_NAME FROM components WHERE COMPONENT_ID IN (" . implode(',', $componentIDs) . ")");
    $query->execute();
    $components = $query->fetchAll(PDO::FETCH_COLUMN);

    // Display the components
    echo '<div class="section property-features">';
    echo '<h4 class="s-property-title">Components</h4>';
    echo '<ul>';

    foreach ($components as $component) {
        echo '<li><a href="properties.html">' . $component . '</a></li>';
    }

    echo '</ul>';
    echo '</div>';

} catch (PDOException $e) {
    echo "PDOException: " . $e->getMessage();
}
?>

                            <!-- End components area  -->

                            <div class="section property-video">
                                <h4 class="s-property-title">Property Location</h4>
                                <div class="video-thumb">
                                    <a class="video-popup" href="yout" title="Virtual Tour">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3199.367851513773!2d2.8533943747631665!3d36.689697472278816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fa3bb62c1df43%3A0x4963bf2eb486c3ce!2sSidi%20Abdellah!5e0!3m2!1sen!2sdz!4v1699272485257!5m2!1sen!2sdz" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
                                            
                                    
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- similar posts section -->
                    <div class="similar-post-section padding-top-40">
                        <div id="prop-smlr-slide_0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="property-1.html"><img src="assets/img/similar/property-1.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="property-1.html"> Super nice villa </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b> Area :</b> 120m </span>
                                    <span class="proerty-price pull-right"> $ 300,000</span>
                                </div>
                            </div>
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="property-1.html"><img src="assets/img/similar/property-2.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="property-1.html"> Super nice villa </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b> Area :</b> 120m </span>
                                    <span class="proerty-price pull-right"> $ 300,000</span>
                                </div>
                            </div>
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="property-1.html"><img src="assets/img/similar/property-3.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="property-1.html"> Super nice villa </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b> Area :</b> 120m </span>
                                    <span class="proerty-price pull-right"> $ 300,000</span>
                                </div>
                            </div>
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="property-1.html"><img src="assets/img/similar/property-1.jpg"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="property-1.html"> Super nice villa </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b> Area :</b> 120m </span>
                                    <span class="proerty-price pull-right"> $ 300,000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  end of similar posts section -->
                </div>

                <div class="col-md-4 p0">
                    <aside class="sidebar sidebar-property blog-asside-right property-style2">
                        <div class="dealer-widget">
                            <div class="dealer-content">
                                <div class="inner-wrapper">
                                    <div class="single-property-header">
                                        <h1 class="property-title"> equipped F
                                            <?php 
                                            echo $nrooms.' ' ;?> apartment </h1>
                                        <span class="property-price">
                                            <?php
                                             echo $addressText . ' ' .$addressBal.' ' .$addressWil;
                                             ?>
                                        </span>
                                    </div>

                                    <div class="property-meta entry-meta clearfix ">

                                        <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                            <span class="property-info-icon icon-tag">
                                                <img src="imagess/tv.png">
                                            </span>
                                            <span class="property-info-entry">
                                                <span class="property-info-label">TV</span>
                                               
                                            </span>
                                        </div>

                                        <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                            <span class="property-info icon-area">
                                                <img src="imagess/washing-machine.png">
                                            </span>
                                            <span class="property-info-entry">
                                                <span class="property-info-label">washing-machine</span>
                                               
                                            </span>
                                        </div>

                                        <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                            <span class="property-info-icon icon-bed">
                                                <img src="imagess/chef.png">
                                            </span>
                                            <span class="property-info-entry">
                                                <span class="property-info-label">Cooking utencils</span>
                                               
                                            </span>
                                        </div>

                                        <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                            <span class="property-info-icon icon-bath">
                                                <img src="imagess/sofa.png">
                                            </span>
                                            <span class="property-info-entry">
                                                <span class="property-info-label">sofa</span>
                                               
                                            </span>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                            <span class="property-info-icon icon-bath">
                                                <img src="assets/img/icon/wifi (1).png">
                                            </span>
                                            <span class="property-info-entry">
                                                <span class="property-info-label">Wifi</span>
                                               
                                            </span>
                                        </div>

                                        <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                            <span class="property-info-icon icon-garage">
                                                <img src="imagess/heater.png">
                                            </span>
                                            <span class="property-info-entry">
                                                <span class="property-info-label">heating</span>
                                               
                                            </span>
                                        </div>

                                        <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                            <span class="property-info-icon icon-garage">
                                                <img src="assets/img/icon/air-conditioner.png">
                                            </span>
                                            <span class="property-info-entry">
                                                <span class="property-info-label">Air conditionner </span>
                                               
                                            </span>
                                        </div> 
                                        


                                    </div>
                                    <div class="dealer-section-space">
                                        <span>Dealer information</span>
                                    </div>
                                    <div class="clear">
                                        <div class="col-xs-4 col-sm-4 dealer-face">
                                            <a href="">
                                                <img src="images/person.png" class="img-circle">
                                            </a>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 ">
                                            <h3 class="dealer-name">
                                                <a href="">
                                                    <?php
                                                    try{
                                                    //    include_once "includes/dbh.inc.php";
                                                       $query="SELECT F_NAME ,L_NAME,EMAIL,PHONE_NUM FROM user WHERE USER_ID=:id;";
                                                       $st=$pdo->prepare($query);
                                                        $st->bindParam(":id",$ownID);
                                                       $st->execute();
                                                       
                                                       if ($row = $st->fetch(PDO::FETCH_ASSOC)) {
                                                        // Access property details and display them as needed
                                                        $fname = $row['F_NAME'];
                                                        $lname = $row['L_NAME'];
                                                        $emailowner = $row['EMAIL'];
                                                        $phoneowner = $row['PHONE_NUM'];
                                                        // $addressowner = $row['F_NAME'];
                                                        
                                                        echo $fname .' ' . $lname;
                                                    } else {
                                                        // Handle the situation where the property with the given ID is not found
                                                        echo '<p>Property not found</p>';
                                                    }
                                                } catch (PDOException $e) {
                                                    // Handle database connection error
                                                    echo '<p>Error connecting to the database </p>'. $e->getMessage();
                                                }
                                                    ?></a>

                                            </h3>

                                        </div>
                                    </div>

                                    <div class="clear">
                                        <ul class="dealer-contacts">
                                            <!-- <li><i class="pe-7s-map-marker strong"> </i> 9089 your adress her</li> -->
                                            <li><i class="pe-7s-mail strong"> </i><?php
                                            echo $emailowner;
                                            ?></li>
                                            <li><i class="pe-7s-call strong"> </i> <?php
                                            echo '0' .$phoneowner;
                                            ?></li>
                                        </ul>

                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                            <div class="panel-heading">
                                <h3 class="panel-title">Reservation </h3>
                            </div>
                            <div class="payment">
                                <p class="price">
                                    <?php echo $price .' DA per ' ;
                                    if($pBy==="Months"){
                                      echo "Month";}
                                      elseif($pBy==="Years"){
                                        echo "Year";
                                      }
                                    else echo "night";
                                    ?>  </p>
                                <div class="check">
                                    <div class="check-in">
                                        <p>from</p>
                                        <input type="Date" value="check-in">
                                    </div>
                                    <div class="check-out">
                                        <p>to</p>
                                        <input type="Date" value="check-out">
                                    </div>
                                </div>
                                <p class="payment-methodss">Payment Methods </p>

<div class="payment-methods">
    <?php
     try {
        include_once "includes/dbh.inc.php";
        
        // Fetch property details based on the property ID
        $query = "SELECT * FROM prop_paymentmethod WHERE PROP_ID = :propID";
        $st = $pdo->prepare($query);
        $st->bindParam(":propID", $propID);
        $st->execute();
        
        if ($row = $st->fetch(PDO::FETCH_ASSOC)) {
            // Access property details and display them as needed
            $pid=$row['PAY_METHOD_ID'];
            if ($pid === 2) {
                echo '
                <div class="p1">
                    <label for="1">BaridiMob</label>
                    <input type="radio" id="1" name="payment-method">
                </div>';
            } elseif ($pid === 3) {
                echo '
                <div class="p1">
                    <label for="2">CIB</label>
                    <input type="radio" id="2" name="payment-method">
                </div>';
            } elseif ($pid === 1) {
                echo '
                <div class="p1">
                    <label for="3">Cash</label>
                    <input type="radio" id="3" name="payment-method">
                </div>';
            }
           
        } 
    } catch (PDOException $e) {
        // Handle database connection error
        echo '<p>Error connecting to the database</p>';
    }
    
    ?>
</div>

                                </div>
                                <button type="submit" class="reserve-btn" > <a href="newprofile.html"> Reserve</a></button>
                            </div> 
                             
                            <div class="review-container">
                                <div class="flipper">
                                    <div class="front">
                                        <div class="form-container">
                                            <form id="feedbackForm">
                                                <p class="form_title">Your Review</p>
                                                <hr>
                                                <h4>Rating</h4>
                                                <div class="form-group star-rating">
                                                    <input type="radio" id="star5" name="rating" value="5"><label for="star5">&#9733;</label></input>
                                                    <input type="radio" id="star4" name="rating" value="4"><label for="star4">&#9733;</label></input>
                                                    <input type="radio" id="star3" name="rating" value="3"><label for="star3">&#9733;</label></input>
                                                    <input type="radio" id="star2" name="rating" value="2"><label for="star2">&#9733;</label></input>
                                                    <input type="radio" id="star1" name="rating" value="1"><label for="star1">&#9733;</label></input>
                                                </div>
                                                <div class="form-group">
                                                    <label>Comment</label>
                                                    <textarea id="feedback" name="feedback" required></textarea>
                                                </div>
                                                <button type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="back">
                                        <div class="message-container">
                                            <p>Thank you for submitting your feedback about this property!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="PropertyReview.js"></script>
                        </div>

                    </aside>
                </div>

            </div>

        </div>
    </div>  

    <div class="footer">
        <div class="footer-container">
            <div class="left-footer">
                <img src="./images/logolightall.png" alt="">

            </div>
            <div class="right-footer">
                <div class="Get-In-Touch">
                    <p>Get In Touch</p>
                    <div class="location-footer">
                        <img src="./images/location3.png" alt="">
                        <span>123 street , Hydra ,Algeria</span>
                    </div>
                    <div class="phone">
                        <img src="./images/phone.png" alt="">
                        <span>+21369854712</span>
                    </div>
                    <div class="mail">
                        <img src="./images/email.png" alt="">
                        <span>RentalHub@gmail.com</span>
                    </div>
                    <div class="social-media">
                        <a href="#" class="social-media"><img src="./images/linkedIn.png" alt=""></a>
                        <a href="#" class="social-media"><img src="./images/facebook.png" alt=""></a>

                        <a href="#" class="social-media"><img src="./images/instagram.png" alt=""></a>
                    </div>
                </div>

                <div class="quick-links">
                    <p>Quick Links</p>
                    <a href="about.html">> About Us</a>
                    <a href="index.php#contact">> Contact Us</a>
                    <a href="terms&privacy.html#pp">> Privacy & Policy </a>
                    <a href="terms&privacy.html#terms">> Terms and conditions</a>

                </div>
            </div>

        </div>
        <p> @RentalHub2023.All Rights Reserved.
        </p>



    </div>
    

    <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
    <script src="assets/js/jquery-1.10.2.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/bootstrap-hover-dropdown.js"></script>
    <script src="assets/js/easypiechart.min.js"></script>
    <script src="assets/js/jquery.easypiechart.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/icheck.min.js"></script>
    <script src="assets/js/price-range.js"></script>
    <script type="text/javascript" src="assets/js/lightslider.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        $(document).ready(function () {

            $('#image-gallery').lightSlider({
                gallery: true,
                item: 1,
                thumbItem: 9,
                slideMargin: 0,
                speed: 500,
                auto: true,
                loop: true,
                onSliderLoad: function () {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
        });
    </script>

</body>

</html>