<?php
// propertysample.php
session_start();
try {
    include_once "includes/dbh.inc.php";

    // Fetch property details based on the property ID
    $query = "SELECT * FROM property ";
    $st = $pdo->prepare($query);
    $st->execute();

    // Fetch all properties and store them in an array
    $properties = $st->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle database connection error
    echo '<p>Error connecting to the database</p>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
<script defer src="./jsFiles/searchValidation.js"></script>
    <link rel="stylesheet" href="./CssFiles/search-content.css">
    <link rel="stylesheet" href="./CssFiles/search-page.css">
    <link rel="stylesheet" href="./CssFiles/footer.css">
    <script defer src="./jsFiles/scroll.js"></script>
    <link rel="stylesheet" href="./CssFiles/nav-bar.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search page</title>
    <style>
        

img.img-search {
    height: 25vh;
}
    </style>
    
    
</head>

<body>
    <div class="container">
        <div class="nav-bar">
            <a href="" class="home"><img src="./images/logolightall.png" alt="" class="home-logo"></a>
            <div class="right-nav-bar">
                <ul class="nav-bar-list">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.html">ABOUT US</a></li>
                    <li><a href="searchpage.html">CATEGORIES <span>^</span></a></li>
                    <li><a href="index.php#contact">CONTACT</a></li>
                    <li><a href="SignUp.html" class="sign">SIGN IN</a></li>
                    <li><a href="newlogin.html" class="log">LOG IN</a></li>
                </ul>


            </div>
            <a href="#" class="menu"><img src="./images/whitehambergermenu.png" alt=""></a>

        </div>
        <div class="search-body">
            <section class="search-bar">
                <form  class="hero-section-search" action="">
                    <input class="input-location" type="text" name="destination" placeholder="type your destination...">
                    <input type="date" name="check in" class="Check-in">
                    <input type="date" name="check out" class="Check-out">
                    <input class="adult-input" type="number" min="0" placeholder="Adult" name="adult number">
                    <input class="child-input" type="number" name="children number" min="0" placeholder="Children">
                    <select name="CATEGORIES" id="">
                        <optgroup label="CATEGORIES" class="categories">
                            <option value="holiday">Holidays</option>
                            <option value="Events">Event</option>
                            <option value="long period">Long period</option>
                            <option value="Short period">Short period</option>
                            <option value="collocation">Collocation</option>
                        </optgroup>
                    </select>
                </form>
                <button class="avalability-button">check avalability</button>
            </section>
            <div class="search-content">
                <div class="right-search-section">
                    <div class="map-section">
                        <img src="./images/map.png" alt="map" class="map">
                        <img src="./images/location icon.png" alt="location" class="location-icon">
                        <p>Search on map</p>
                    </div>
                    <div class="filters">
                        <p class="badget-text">Your badget</p>
                        <div class="badget-buttons">
                            <input type="button" value="per night">
                            <input type="button" value="per month">

                        </div>
                        <input class="badget" type="number" min="0" placeholder="Enter your budget">
                        <div class="category">
                            <p>Category</p>
                            <form action="" method="post">
                                <div class="checkbox">
                                    <input type="checkbox" name="category" value="Longperiod" id="long">
                                    <label for="long">Long period</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="category" value="shortperiod" id="short">
                                    <label for="short">short period</label>
                                </div>
                                <div class="checkbox"><input type="checkbox" name="category" value="events" id="events">
                                    <label for="events">Events</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="category" value="holidays" id="holidays">
                                    <label for="holidays">holidays</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="category" value="collocation" id="col">
                                    <label for="col">Collocation</label>
                                </div>

                            </form>
                        </div>
                        <div class="Staar-rating">
                            <p>Star Rating</p>
                            <form action="" method="post">
                                <div class="checkbox">
                                    <input type="checkbox" name="star-rating" value="excellent" id="excellent">
                                    <label for="excellent">Excellent</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="star-rating" value="very-good" id="v-g">
                                    <label for="v-g">Very Good</label>
                                </div>
                                <div class="checkbox"><input type="checkbox" name="star-rating" value="good" id="good">
                                    <label for="good">Good</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="star-rating" value="not-bad" id="not-bad">
                                    <label for="not-bad">Not bad</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="star-rating" value="bad" id="bad">
                                    <label for="bad">Bad</label>
                                </div>

                            </form>
                        </div>
                        <div class="Bed-type">
                            <p>Bed type</p>
                            <form action="" method="post">
                                <div class="checkbox">
                                    <input type="checkbox" name="Bed-type" value="single/twin" id="single">
                                    <label for="single">single/twin</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="Bed-type" value="double" id="double">
                                    <label for="double">Double</label>
                                </div>
                                <div class="checkbox"><input type="checkbox" name="Bed-type" value="king" id="king">
                                    <label for="king">King</label>
                                </div>


                            </form>
                        </div>
                        <div class="Deals and discounts">
                            <p>Deals and discounts</p>
                            <form action="" method="post">
                                <div class="checkbox">
                                    <input type="checkbox" name="discounts" value=">50%" id="50%">
                                    <label for="50%">50% discount or more</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="discounts" value="cash payment" id="cash">
                                    <label for="cash">cash payment</label>
                                </div>
                                <div class="checkbox"><input type="checkbox" name="discounts" value="secret deal"
                                        id="secret">
                                    <label for="secret">Secret deals</label>
                                </div>


                            </form>
                        </div>
                        <div class="Room-amenities">
                            <p>Room amenities</p>
                            <form action="" method="post">
                                <div class="checkbox">
                                    <input type="checkbox" name="Room-amenities" value="heating" id="heat">
                                    <label for="heat">Heating</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="Room-amenities" value="balcony/terrace" id="balcony">
                                    <label for="balcony">Balcony/terrace</label>
                                </div>
                                <div class="checkbox"><input type="checkbox" name="Room-amenities"
                                        value="washing machine" id="wash-machine">
                                    <label for="wash-machine">Washing machine</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="Room-amenities" value="refrigerator" id="refrigerator">
                                    <label for="refrigerator">Refrigerator</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="Room-amenities" value="tv" id="tv">
                                    <label for="tv">TV</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="Room-amenities" value="coffe/tea" id="cofee/tea">
                                    <label for="coffe/tea">Cofee/tea maker</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="Room-amenities" value="pool" id="pool">
                                    <label for="pool">Private pool</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="Room-amenities" value="gym" id="gym">
                                    <label for="gym">Gym</label>
                                </div>
                            </form>
                        </div>
                        <div class="Property-facilities">
                            <p>Property facilities</p>
                            <form action="" method="post">
                                <div class="checkbox">
                                    <input type="checkbox" name="Property-facilities" value="internet" id="internet">
                                    <label for="internet">Internet</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="Property-facilities" value="park" id="park">
                                    <label for="park">Car park</label>
                                </div>
                                <div class="checkbox"><input type="checkbox" name="Property-facilities" value="family"
                                        id="family">
                                    <label for="family">Family/child friendly</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="Property-facilities" value="no smoke" id="no-smoke">
                                    <label for="no-smoke">Non smoking</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="Property-facilities" value="restau" id="restau">
                                    <label for="restau">Restaurants</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="Property-facilities" value="smoke" id="smoke">
                                    <label for="smoke">Smoking Area</label>
                                </div>

                            </form>
                        </div>
                        <div class="Number-bedrooms">
                            <p>Number of bedrooms</p>
                            <form action="" method="post">
                                <div class="checkbox">
                                    <input type="checkbox" name="Number-bedrooms" value="one" id="one">
                                    <label for="one">1 bedroom/studio</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="Number-bedrooms" value="two" id="two">
                                    <label for="two">2 bedrooms</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="Number-bedrooms" value="plusThree" id="three">
                                    <label for="three">3 bedrooms</label>
                                </div>


                            </form>
                        </div>







                    </div>

                </div>
                <div class="posts-content">

                <?php foreach ($properties as $property) : 
    $propID = $property['PROP_ID'];
?>
    <a href="propertysample.php?id=<?php echo $propID; ?>">
        <div class="box-two proerty-item">
            <div class="item-thumb">
                <?php 
                    $sql = "SELECT IMG_URL FROM images WHERE PROP_ID=:id;";
                    $st = $pdo->prepare($sql);
                    $st->bindParam(":id", $propID);
                    $st->execute();
                    
                    $result = $st->fetchAll(PDO::FETCH_ASSOC);
            
                    if ($result) {
                        foreach ($result as $row) {
                            echo '<img class="img-search" src="Uploads/' . htmlspecialchars($row['IMG_URL'], ENT_QUOTES, 'UTF-8') . '" alt="Image">';
                            break;
                        }
                    } else {
                        echo "No images found.";
                    }
                ?>                    
            </div>
            <div class="item-entry overflow">
                <h3><?php echo $property['PROP_NAME']; ?></h3>
                <div class="dot-hr"></div>
                <div class="price">
                    <span class="Area"><b> Area :</b> <?php echo $property['AREA']; ?>m </span>
                    <span class="Price"> $ <?php echo $property['PRICE']; ?></span>
                </div>
                <!-- Display other property details as needed -->
            </div>
        </div>
    </a>
<?php endforeach; ?>

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
        </div>
        <!--css in what client say-->
        <button class="scroll">up</button>
</body>

</html>