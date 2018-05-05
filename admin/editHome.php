<?php
$homeId = $_GET['id'];
include 'header.php';
include 'sidebar.php';
include 'connectiondb.php';
$sql = "SELECT home_text FROM home_content WHERE home_id = $homeId";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit
        <small>Form</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Edit</a></li>
        <li class="active">Text</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Home Text</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="updateText.php" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="textId" class="col-sm-2 control-label">ID</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="textId" name="text_id" value="<?php echo $homeId; ?>" style="width:35px;" readonly="true">
                  </div>
                </div>
                <div class="form-group">
                  <label for="textContent" class="col-sm-2 control-label">Text</label>

                  <div class="col-sm-10">
                    <textarea id="textContent" name="text_content" class="form-control" rows="3" ><?php echo $row['home_text']; ?></textarea>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="location.href = '../admin';" class="btn btn-default">Cancel</button>
                <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-info">
                Submit
              </button>
              </div>
              <!-- /.box-footer -->

              <!-- MODAL -->
        <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Alerts</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure want to change the content ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <input type="submit" name="submit_text" class="btn btn-outline" value="Save changes">
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

            </form>
          </div>
        </div>
    </div>
</section>
</div>
<?php
include 'footer.php';
?>
