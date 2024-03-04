<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./CssFiles/contactUs.css">
    <link rel="stylesheet" href="./CssFiles/whatClientSay.css">
    <link rel="stylesheet" href="./CssFiles/footer.css">
    <link rel="stylesheet" href="./CssFiles/why-choose-us.css">
    <link rel="stylesheet" href="./CssFiles/search-bar.css">
    <link rel="stylesheet" href="./CssFiles/hero-section.css">
    <link rel="stylesheet" href="./CssFiles/nav-bar.css">
    <meta charset="UTF-8">

    <script defer src="./jsFiles/scroll.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="./jsFiles/herosection.js"></script>
    <script defer src="./jsFiles/searchValidation.js"></script>

    <title>new home page
    </title>
</head>

<body>
    <div class="nav-bar ">
        <a href="" class="home"><img src="./images/logolightall.png" alt="" class="home-logo"></a>
        <div class="right-nav-bar">
            <ul class="nav-bar-list">
                <li><a href="index.php">HOME</a></li>
                <li><a href="about.html">ABOUT US</a></li>
                <li><a href="searchpage.php">CATEGORIES <span>^</span></a></li>
                <li><a href="index.php#contact">CONTACT</a></li>
                <?php
if (isset($_SESSION['id'])) {
    echo '<li><a href="newprofile.php" class="profile"><img src="images/person.png"  alt=""></a></li>';
} else {
    echo '<li><a href="Sign_Up.php" class="sign">SIGN UP</a></li>';
    echo '<li><a href="newlogin.php" class="log">LOG IN</a></li>';
}
?>

                

            </ul>


        </div>
        <a href="#" class="menu"><img src="./images/whitehambergermenu.png" alt=""></a>

    </div>
    <section class="hero-section">
        <button class="previous">
            <span>
                < </span>
        </button>
        <div class="post-info">
            <p class="title">DUPLEX , DORMED BY </p>
            <div class="locat">
                <img src="./images/location icon.png" alt="" class="location">
                <p class="location-text">Hydra alger</p>
            </div>
            <div class="characteristics">
                <span>3guests</span>
                <span>1bedroom</span>
                <span>1bed</span>
            </div>
            <p class="price"><span>10000 DA</span> PER NIGHT</p>
        </div>
        <button class="next">
            <span>></span>
        </button>

    </section>
    <section class="search-bar">
        <form action="">
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
    <section class="why-choose-us">
        <div class="img-div">
            <img src="./images/home2.png" alt="">

        </div>
        <div class="text">
            <p class="title">#1 place to find the perfect property</p>
            <ul>
                <li><span class="point">Accessibility:</span>Get rid of the traditional Methods.. . Find the perfect
                    space that fits
                    your
                    preferences
                    effortlessly and access to a variety of options at anytime and anywhere.</li>
                <li><span class="point"> Transparency:</span>Detailed information are provided to you. Real photos,
                    pricing, reviews and ratings will
                    help you to make informed decisions.</li>
                <li><span class="point"> Credibility:</span>RentalHub stays up to gain your trust through verified and
                    accurate listings, legal
                    compliance, rental agreements and contracts, privacy and data security</li>
                <li class="additional"><span class="point"> Convenience:</span>Listing a property on RentalHub is a
                    straightforward process. Owners can create and manage their listings easily, set their rental terms
                    and take control over how their properties will be rented.</li>
                <li class="additional"><span class="point"> Global reach: </span>Advertise your property without effort…
                    RentalHub has a large user base. Thus, you can reach a large number of tenants and increase your
                    estate’s exposure.</li>
                <li class="additional"><span class="point"> Direct connections:</span> Break down barriers with your
                    clients by connecting directly with them, saving both money and time without intermediaries.</li>


            </ul>
            <button>Discover more</button>
        </div>
    </section>
    <section class="what-client-say">
        <p class="title">What Client Say</p>
        <div class="content">
            <span class="previous">
                < </span>
                    <div class="profile-content">
                        <div class="profile">
                            <img class="profile-img" src="./images/channel-1.jpeg" alt="">
                            <p>John Doe</p>
                        </div>
                        <p class="description">
                            My experience renting through this agency was excellent. The staff was friendly and helpful,
                            and they were always quick to respond to my questions. The apartment I rented was clean and
                            well-maintained, and I had no problems during my time there.
                        </p>
                    </div>
                    <span class="next">></span>
        </div>
    </section>


    <section class="contact" id="contact">
        <h2>CONTACT US</h2>
        <h4>Ask an agent, We're here to help 24/7</h4>
        <form action="Contact.php" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>


            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>


            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject">


            <label for="message">Your Message</label>
            <textarea  id="message" name="message" class="message" placeholder="Enter your message here.." cols="45" rows="8"
                required></textarea>
            <div class="submit"><input type="submit" class="submitinside"> </div>
        </form>
    </section>



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
    <!--css in what client say-->
    <button class="scroll">up</button>
    <script src="./jsFiles/index.js"></script>


</body>

</html>