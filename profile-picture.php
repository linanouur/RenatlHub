<?php
session_start();
include_once "includes/dbh.inc.php";

if (isset($_POST['submit']) && isset($_FILES['prof-image'])) {
    $img_name = $_FILES['prof-image']['name'];
    $img_size = $_FILES['prof-image']['size'];
    $tmp_name = $_FILES['prof-image']['tmp_name'];
    $error = $_FILES['prof-image']['error'];

    if ($error === 0) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png");

        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = 'Uploads/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            // Updating user image using prepared statement
            $sql = "UPDATE user SET IMG_PRF = :new_img_name WHERE USER_ID = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":new_img_name", $new_img_name, PDO::PARAM_STR);
            $stmt->bindParam(":id", $_SESSION['id'], PDO::PARAM_INT);
            $stmt->execute();
            $_SESSION['IMG_PRF'] = $new_img_name;
            header("Location: newprofile.php?uploadsuccess");
        }
    }
}
?>
   