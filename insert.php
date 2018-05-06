<?php
include "admin/connectiondb.php";

$subscriberEmail = $_POST['email'];

mysqli_query($conn,"INSERT INTO subscriber_content (subs_email) VALUES('".$subscriberEmail."')");
?>