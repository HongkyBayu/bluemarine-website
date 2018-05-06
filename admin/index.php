<?php
include 'header.php';
include 'sidebar.php';
?>
<script type="text/javascript">
    document.getElementById("buttonHome").onclick = function () {
        location.href = "www.yoursite.com";
    };
</script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#contactTable').DataTable()
  })
</script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- /.col -->
    <section class="content">
    <div class="row">
    <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Home Content</h3>
            </div>
<?php
include 'connectiondb.php';
$sql = "SELECT home_id, home_text FROM home_content";
$result = $conn->query($sql);
?>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-bordered">
                <?php
                if ($result->num_rows > 0) {
                  echo "<tr>
                  <th style='width: 10px'>#</th>
                  <th>Text</th>
                  <th style='width: 10px'>Action</th>
                </tr>";
          
          while($row = $result->fetch_assoc()) {
                  echo "<tr><td>".$row["home_id"]."</td><td>".$row["home_text"]."</td>";
                  ?>
                  <td>
                    <button type="button" id="buttonHome" onclick="document.location.href='editHome.php?id=<?php echo $row["home_id"];?>';" 
                    class="btn btn-block btn-primary btn-xs">Edit</button></td></tr>
                    <?php
              }
          } else {
              echo "0 results";
          }
          $conn->close();
                ?>
              
        </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        </div>
        <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Marine Insurance Service</h3>
            </div>
<?php
include 'connectiondb.php';
$sql = "SELECT listservice_id, listservice_context FROM listservices_content WHERE service_id = 1";
$result = $conn->query($sql);
?>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-bordered">
                <?php
                if ($result->num_rows > 0) {
                  $number = 1;
                  echo "<tr>
                  <th style='width: 10px'>#</th>
                  <th>Content</th>
                  <th style='width: 10px'>Action</th>
                </tr>";
          
          while($row = $result->fetch_assoc()) {
                  echo "<tr>
                  <td>"; echo $number;
                  $number++; "</td>";
                  echo "<td>".$row["listservice_context"]."</td>";
                  ?>
                  <td><button type='button' class='btn btn-block btn-primary btn-xs' 
                  onclick="document.location.href='editService.php?id=<?php echo $row["listservice_id"];?>&serviceid=1'">Edit</button></td></tr>
                  <?php
              }
          } else {
              echo "0 results";
          }
          $conn->close();
                ?>
        </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        </div>
        <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Cargo and Containers Service</h3>
            </div>
<?php
include 'connectiondb.php';
$sql = "SELECT listservice_id, listservice_context FROM listservices_content WHERE service_id = 2";
$result = $conn->query($sql);
?>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-bordered">
                <?php
                if ($result->num_rows > 0) {
                  $number = 1;
                  echo "<tr>
                  <th style='width: 10px'>#</th>
                  <th>Content</th>
                  <th style='width: 10px'>Action</th>
                </tr>";
          
          while($row = $result->fetch_assoc()) {
                  echo "<tr>
                  <td>"; echo $number;
                  $number++; "</td>"; 
                  echo "<td>".$row["listservice_context"]."</td>";
                  ?>
                  <td><button type='button' class='btn btn-block btn-primary btn-xs'
                  onclick="document.location.href='editService.php?id=<?php echo $row["listservice_id"];?>&serviceid=2'">Edit</button></td></tr>
                  <?php
              }
          } else {
              echo "0 results";
          }
          $conn->close();
                ?>
        </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        </div>
        
        <!-- /.col -->
        <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Bunker Industry Service</h3>
            </div>
<?php
include 'connectiondb.php';
$sql = "SELECT listservice_id, listservice_context FROM listservices_content WHERE service_id = 3";
$result = $conn->query($sql);
?>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-bordered">
                <?php
                if ($result->num_rows > 0) {
                  $number = 1;
                  echo "<tr>
                  <th style='width: 10px'>#</th>
                  <th>Content</th>
                  <th style='width: 10px'>Action</th>
                </tr>";
          
          while($row = $result->fetch_assoc()) {
                  echo "<tr>
                  <td>"; echo $number;
                  $number++; "</td>"; 
                  echo "<td>".$row["listservice_context"]."</td>";
                  ?>
                  <td><button type='button' class='btn btn-block btn-primary btn-xs'
                  onclick="document.location.href='editService.php?id=<?php echo $row["listservice_id"];?>&serviceid=3'">Edit</button></td></tr>
                  <?php
              }
          } else {
              echo "0 results";
          }
          $conn->close();
                ?>
        </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        </div>

        <!-- /.col -->
        <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Contact List</h3>
            </div>
<?php
include 'connectiondb.php';
$sql = "SELECT subs_email FROM subscriber_content";
$result = $conn->query($sql);
?>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table id="contactTable" class="table table-bordered">
                <?php
                if ($result->num_rows > 0) {
                  $number = 1;
                  echo "<tr>
                  <th style='width: 10px'>#</th>
                  <th>Contact Email</th>
                </tr>";
          
          while($row = $result->fetch_assoc()) {
                  echo "<tr>
                  <td>"; echo $number;
                  $number++; "</td>"; 
                  echo "<td>".$row["subs_email"]."</td>";
                  ?>
                  </tr>
                  <?php
              }
          } else {
              echo "0 results";
          }
          $conn->close();
                ?>
        </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        </div>
    </section>
</div>
<?php
include 'footer.php';
?>
