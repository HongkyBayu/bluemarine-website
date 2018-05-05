<?php
$contentId = $_GET['id'];
$serviceId = $_GET['serviceid'];
include 'header.php';
include 'sidebar.php';
include 'connectiondb.php';
$listService = "SELECT listservice_context FROM listservices_content WHERE listservice_id = $contentId";
$mainService = "SELECT service_name FROM services_content WHERE service_id = $serviceId";

$resultListService = $conn->query($listService);
$resultmainService = $conn->query($mainService);

$rowList = $resultListService->fetch_assoc();
$rowMain = $resultmainService->fetch_assoc();


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
        <li class="active">Services</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
      <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Services Content</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="updateService.php" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="listId" class="col-sm-2 control-label">ID</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="listId" name="list_id" value="<?php echo $contentId; ?>" style="width:40px;" readonly="true">
                  </div>
                </div>
                <div class="form-group">
                  <label for="serviceGroup" class="col-sm-2 control-label">Service Type</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="serviceGroup" name="service_group" value="<?php echo $rowMain['service_name']; ?>" readonly="true">
                  </div>
                </div>
                <div class="form-group">
                <label for="listContent" class="col-sm-2 control-label">Content</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="listContent" name="list_content" value="<?php echo $rowList['listservice_context'] ?>">
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
                <input type="submit" name="submit_content" class="btn btn-outline" value="Save changes">
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