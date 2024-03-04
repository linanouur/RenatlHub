<?php
  include('set_conn.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="settings.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <title>Profile Settings</title>
</head>

<body>
    <div class="profile-container">
    <div class="profile-picture">
    <img id="profile-image" src="#" alt="Profile Picture">
    <form action="update_profile.php" method="post" enctype="multipart/form-data">
        <input type="file" id="profile-upload" name="profile_image" accept="image/*" onchange="previewImage()">
        <input type="submit" value="Upload">
    </form>
</div>

        <div class="profile-info">
            <label for="first-name">First Name:</label>
            <div class="info-row">
                <span id="first-name">
                    <?php echo $_SESSION['fname']; ?> 
                </span>
                <a href="#" class="edit-btn" onclick="editInfo('first-name')">Edit</a>
            </div>
            <div id="edit-first-name" style="display:none;">
                <input type="text" name="first_name" value="<?php echo $_SESSION['fname']; ?>">
                <button onclick="saveInfo('first-name')">Save</button>
            </div>

            <label for="last-name">Last Name:</label>
            <div class="info-row">
                <span id="last-name">
                    <?php echo $_SESSION['lname']; ?>
                </span>
                <a href="#" class="edit-btn" onclick="editInfo('last-name')">Edit</a>
            </div>
            <div id="edit-last-name" style="display:none;">
                <input type="text" name="last_name" value="<?php echo $_SESSION['lname']; ?>">
                <button onclick="saveInfo('last-name')">Save</button>
            </div>

            <label for="email">Email:</label>
            <div class="info-row">
                <span id="email">
                    <?php echo $_SESSION['EMAIL']; ?>
                </span>
                <a href="#" class="edit-btn" onclick="editInfo('email')">Edit</a>
            </div>
            <div id="edit-email" style="display:none;">
                <input type="text" name="email" value="<?php echo $_SESSION['EMAIL']; ?>">
                <button onclick="saveInfo('email')">Save</button>
            </div>

            <label for="password">Password:</label>
            <div class="info-row">
                <span id="password">
                    <h5>********</h5>
                </span>
                <a href="#" class="edit-btn" onclick="editInfo('password')">Edit</a>
            </div>
            <div id="edit-password" style="display:none;">
                <input type="password" name="password" value="<?php echo $_SESSION['pw']; ?>">
                <button onclick="saveInfo('password')">Save</button>
            </div>

            <label for="phone">Phone Number:</label>
            <div class="info-row">
                <span id="phone">
                    <?php echo "0".$_SESSION['phone'] ?>
                </span>
                <a href="#" class="edit-btn" onclick="editInfo('phone')">Edit</a>
            </div>
            <div id="edit-phone" style="display:none;">
                <input type="text" name="phone" value="<?php echo $_SESSION['phone']; ?>">
                <button onclick="saveInfo('phone')">Save</button>
            </div>


        </div>
    </div>

    <script src="settings.js"></script>
</body>

</html>