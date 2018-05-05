<?php
header('Refresh: 3;url=../admin');
include "connectiondb.php";
include 'header.php';
include 'sidebar.php';


if(mysqli_connect_errno())
{
    echo mysqli_connect_error;
}
else
{
    $idList = $_POST["list_id"];
    $contentList = htmlentities($_POST['list_content']);

    if ($_POST["submit_content"] == "Save changes") {

    $update = "UPDATE listservices_content SET listservice_context='$contentList' WHERE listservice_id = $idList";
    $conn->query($update);
    

}
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit
    <small>Form</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Edit</a></li>
    <li><a href="#">Service</a></li>
    <li class="active">Success</li>
  </ol>
</section>
  
  <section class="content">
    <div class="row">
    <div class="col-md-12">
        <div class="box box-default">
          <div class="box-header with-border">
            <i class="fa fa-warning"></i>

            <h3 class="box-title">Alerts</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Success!</h4>
              Your changes has been updated to the database.</br>
              <p>This page will redirect automatically to the home page&hellip;</p>
              <center><img src="dist/img/loading.gif" style="width:50px;" alt="Loading..."></center>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- row -->
  </section>
  </div>
  


  <?php
include 'footer.php';
}


?>