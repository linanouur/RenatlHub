<?php
session_start();
?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="postt.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

</head>

<body>
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





    <form action="property.php" method="post" id="property-form" enctype="multipart/form-data">
        <fieldset class="Address-form" title="Property Information">
            <div>
                <label for="name"> Name of property </label>
                <input type="text" placeholder="apartment f3 " name="name" class="fill" id="name">
                <small id="name-error" class="error"></small>

                <div class="wb">
                    <label for="wilaya"> Wilaya </label>
                    <input type="text" class="fill" id="wilaya" name="wilaya">
                    <small id="name-error" class="error"></small>

                    <label for="baladiya">Baladiya</label>
                    <input type="text" class="fill" id="baladiya" name="baladiya">
                    <small id="state-error" class="error"></small>
                </div>


                <label for="address"> Address </label>
                <input type="text" class="fill" id="address" name="address">
                <small id="address-error" class="error"></small>

                <div class="pc">
                    <label for="price"> Price </label>
                    <input type="number" class="fill" id="price" name="price">
                    <small id="price-error" class="error"></small>

                    <label for="category"> Category </label>
                    <select name="category" class="fill" id="category" required>


                        <option value="1">Long term</option>
                        <option value="2">short term</option>
                        <option value="3">Collocation</option>
                        <option value="4">Events</option>
                    </select>
                    <small id="category-error" class="error"></small>
                </div>
            </div>
            <input type="submit" name="submit" id="submit" value="Next">
        </fieldset>



        <fieldset class="details-form" title="Property Details" id="property-details">
            <div>
                <div class="avs">
                    <label for="area">Area </label>
                    <input type="text" placeholder="put area in m2 " class="fill" id="area" name="area">
                    <small id="area-error" class="error"></small>

                    <label for="view"> View </label>
                    <input type="text" class="fill" id="view" name="view">
                    <small id="view-error" class="error"></small>

                    <label for="security"> Security </label>
                    <input type="text" class="fill" id="security" name="security">
                    <small id="security-error" class="error"></small>
                </div>
                <div class="frp">
                    <div class="flors">
                        <label for="floors"> Floors </label>
                        <input type="number" class="fill" id="floors" name="floors">
                        <small id="floors-error" class="error"></small>
                    </div>
                    <div class="rooms-row">
                        <label for="rooms">Number of Rooms</label>
                        <input type="number" name="rooms" id="rooms"></input>

                    </div>
                    <div class="pay">
                        <label for="payment-by"> Payment By</label>
                        <select class="fill" id="payment-by" name="payment-by" required>

                            <option value="Months">Months</option>
                            <option value="Days">Days</option>
                            <option value="Years">Years</option>

                        </select>
                        <small id="payment-error" class="error"></small>
                    </div>
                </div>

            </div>


            <label for="description">Description</label>
            <textarea cols="6" rows="6" class="desc" id="description" name="description" required></textarea>

            <div class="upload_img">
                <label for="images"> Upload Property Images</label>
                <input type="file" id="images" name="images[]" multiple accept="images/*">
                <label> Upload Ownership Contract </label>
                <input type="file" name="contract-image" id="contract-image" accept=".jpg,.jpeg,.png">
            </div>

            <div class="posting-procedure" id="posting-procedure">
                <div class="agenda-location">
                    <div class="agendaa">
                        <h3><b class="headlines"> Availability </b> </h3>
                        <div id="form2">
                            <div class="from1">
                                <p> From </p>
                                <input type="date" id="from" name="from">
                            </div>

                            <div class="to1">
                                <p> to</p>
                                <input type="date" id="to" name="to">
                            </div>
                        </div>
                    </div>
                    <div class="location">
                        <b class="headlines"> Location </b>
                        <div class="location">

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3199.367851513773!2d2.8533943747631665!3d36.689697472278816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fa3bb62c1df43%3A0x4963bf2eb486c3ce!2sSidi%20Abdellah!5e0!3m2!1sen!2sdz!4v1699272485257!5m2!1sen!2sdz"
                                width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>

                        </div>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" name="submit" id="submit" value="Next">
                <small id="payment-error" class="error"></small>
            </div>

        </fieldset>
    </form>
    <form action="components.php" method="post" id="component-form">
        <fieldset class="component-id" title="Components">
            <div class="kitchen">
                <input type="checkbox" name="components[]" id="kitchen" value="1"></input>
                <label for="kitchen">Kitchen</label>
            </div>
            <div class="parking-spot-row">
                <input type="checkbox" name="components[]" id="parking-spot" value="2"></input>

                <label for="parking-spot">Parking Spot </label>
            </div>
            <div class="rooftop-row">
                <input type="checkbox" name="components[]" id="rooftop" value="4"></input>

                <label for="rooftop">Rooftop</label>

            </div>
            <div class="garden-row">
                <input type="checkbox" name="components[]" id="garden" value="5"></input>
                <label for="garden">Garden</label>
            </div>

            <div class="swimming-pool-row">
                <input type="checkbox" name="components[]" id="swimming-pool" value="3"></input>
                <label for="swimming-pool">Swimming Pool</label>
            </div>

            <input type="submit" name="submit" id="submit" value="Next">

        </fieldset>
    </form>
    <form action="paymentMethod.php" method="post" id="pay_method">
        <fieldset class="payment-methods" title="Payment">
            <h3> Payment Mehtods </h3>

            <input type="checkbox" name="PaymentsMehtods[]" id="baridimob" value="2"></input>
            <label for="baridimob">BaridiMob </label>
            <input type="checkbox" name="PaymentsMehtods[]" id="cib" value="3"></input>
            <label for="cib">CIB </label>
            <input type="checkbox" name="PaymentsMehtods[]" id="cash" value="1"></input>
            <label for="cash">Cash</label>
            <input type="submit" name="submit" id="submit" value="Next">
        </fieldset>

    </form>

    <form action="equipment.php" method="post" id="equipment-form">
        <fieldset title="Equipements">
            <div class="wifi-row">
                <input type="checkbox" name="equipments[]" value="1" id="wifi"></input>
                <img alt="" src="./imagess/wifi.png" />
                <label for="wifi">Wifi</label>
            </div>
            <div class="tv-row">
                <input type="checkbox" name="equipments[]" value="4" id="tv"></input>
                <img alt="" src="./imagess/tv.png" />
                <label for="tv">TV</label>
            </div>
            <div>
                <input type="checkbox" name="equipments[]" value="7" id="cooking"></input>
                <img alt="" src="imagess/chef.png" />
                <label for="cooking">Cooking Utencils</label>
            </div>
            <div>
                <input type="checkbox" name="equipments[]" value="9" id="flex-stay"></input>
                <img alt="" src="./imagess/long stay.png" />
                <label for="flex-stay">flexible stay</label>
            </div>
            <div class="additional">
                <input type="checkbox" name="equipments[]" value="10" id="sofa"></input>
                <img alt="" src="./imagess/sofa.png" />
                <label for="sofa">Sofa</label>
            </div>
            <div class="machine">
                <input type="checkbox" name="equipments[]" value="2" id="machine"></input>
                <img alt="" src="./imagess/washing-machine.png" />
                <label for="machine">washing Machine</label>
            </div>
            <div class="airconditioning-row">
                <input type="checkbox" name="equipments[]" value="5" id="airconditioning"></input>
                <img alt="" src="./imagess/ac.png" />
                <label for="airconditioning ">Air conditioning</label>
            </div>
            <div>
                <input type="checkbox" name="equipments[]" value="3" id="heating"></input>
                <img alt="" src="./imagess/heater.png" />
                <label for="heating">Heating</label>
            </div>
            <div>
                <input type="checkbox" name="equipments[]" value="8" id="Beds"></input>
                <img alt="" src="./imagess/sleeping (1).png" />
                <label for="Beds">Beds</label>
            </div>
            <div class="additional">
                <input type="checkbox" name="equipments[]" value="6" id="Stove"></input>
                <img alt="" src="./imagess/gas-stove.png" />
                <label for="Stove ">Stove</label>

            </div>
            <input type="submit" name="submit" id="submit" value="Post">
        </fieldset>
    </form>
</body>

</html>