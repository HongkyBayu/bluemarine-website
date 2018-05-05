<?php
include "connectiondb.php";
$username = $_POST['username_content'];
$password = $_POST['password_content'];

if ($_POST["btn_login"] == "Sign In") {
$result = "SELECT admin_username ,admin_password from admin_user 
where admin_username = '$username' and admin_password ='$password' ";
$resultLogin = $conn->query($result);
$count = mysqli_num_rows($resultLogin);
if($count ==1)
{
    ob_start();
    session_start();
    $_SESSION['username'] = $username;
    header("Location:../admin");
} else {
    ?>
    <script type="text/javascript">
        alert("Username or Password is incorrect!");
        window.location.href = "login.php";
    </script>
    <?php
}

}





?>