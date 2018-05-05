<?php
session_start();
include "connectiondb.php";
$username = $_SESSION['username'];
$oldPassword = $_POST['old_password'];
$newPassword = $_POST['new_password'];

if ($_POST["submit_password"] == "Save changes") {
$oldpass_match = "SELECT admin_password from admin_user 
where admin_username = '$username'";
$oldPassword_check = $conn->query($oldpass_match);
$rowPass = $oldPassword_check->fetch_assoc();
$oldpass = $rowPass['admin_password'];

if($oldPassword == $oldpass) {
    $updatepass = "UPDATE admin_user SET admin_password = '$newPassword' WHERE admin_username = '$username'";
    $conn->query($updatepass);
    session_destroy(); //destroy the session
    ?>
    
    <script type="text/javascript">
        alert("Password change succeed! Login again with your new credentials");
        window.location.href = "login.php";
    </script>
    <?php
} else {
    ?>
    <script type="text/javascript">
        alert("Your old password is incorrect!");
        window.location.href = "editPassword.php";
    </script>
    <?php
    exit();
}

}
?>