<?php
include "admin/connectiondb.php";
?>

<!DOCTYPE html>
<html lang="en">

  <head>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
  <script>

    function validateEmail(email) {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }

    function submitContact() {
      var userEmailField = document.getElementById("userEmail").value;

      if(userEmailField === "") {
        swal("Error!", "You need to fill your email!", "error");
      } else if (validateEmail(userEmailField)){
        $.ajax({
            type: "POST",
            url: "insert.php",
            data: "email=" + userEmailField,
            success: function(data) {
              swal("Success!", "Your email has been saved!", "success");
              document.getElementById("contactUsForm").reset();
            }
        });
      } else {
        swal("Error!", "Please fill with valid email address!", "warning");
      }
    }

  </script>
  <style>
      #map {
        height: 400px;
        width: 100%;
       }
       #mainNav .navbar-nav .nav-item .nav-link.active, #mainNav .navbar-nav .nav-item .nav-link:hover {
         color: dodgerblue !important;
       }
       .email-bluemarine {
         color:#212529;
       }
       .email-bluemarine:hover {
         color:dodgerblue;
       }

       .service-bluemarine {
         color:dodgerblue;
       }

       ul.social-buttons li a:active, ul.social-buttons li a:focus, ul.social-buttons li a:hover {
         background-color:dodgerblue !important;
       }

    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blue Marine</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img style="height:80px;" class="img-responsive" src="img/LOGO.png"  alt="Blue Marine"></a>
        <button style="background-color:dodgerblue;" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Find Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contactUs">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead" style="padding:90px; background-image: url(img/cargo.jpg);">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome To Blue Marine!</div>
        </div>
      </div>
    </header>
    <!-- Services -->
    <section id="services" style="padding: 50px 0;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Our Services</h2>
            <?php
              $sql = "SELECT home_text FROM home_content";
              $result = $conn->query($sql);
              $row = $result->fetch_assoc();
            ?>
            <h3 class="section-subheading text-muted"><?php echo $row['home_text'];?></h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x service-bluemarine"></i>
              <i class="fa fa-plus-square fa-stack-1x fa-inverse"></i>
            </span>
            <?php
              $service1 = "SELECT service_name FROM services_content WHERE service_id = 1";
              $service2 = "SELECT service_name FROM services_content WHERE service_id = 2";
              $service3 = "SELECT service_name FROM services_content WHERE service_id = 3";
              $resultService1 = $conn->query($service1);
              $resultService2 = $conn->query($service2);
              $resultService3 = $conn->query($service3);
              $rowService1 = $resultService1->fetch_assoc();
              $rowService2 = $resultService2->fetch_assoc();
              $rowService3 = $resultService3->fetch_assoc();
              $listService1 = "SELECT listservice_context FROM listservices_content WHERE service_id = 1";
              $listService2 = "SELECT listservice_context FROM listservices_content WHERE service_id = 2";
              $listService3 = "SELECT listservice_context FROM listservices_content WHERE service_id = 3";
              $resultList1 = $conn->query($listService1);
              $resultList2 = $conn->query($listService2);
              $resultList3 = $conn->query($listService3);
            ?>
            <h4 class="service-heading"><?php echo $rowService1['service_name'];?></h4>
            <?php
              if ($resultList1->num_rows > 0) {
                  echo "<ul class='text-left'>";
                while($rowList1 = $resultList1->fetch_assoc()) {
                  echo "<li class='text-muted'>".$rowList1['listservice_context']."</li>";
                } 
              }else {
                  echo "0 results";
                }
            ?>
            </ul>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x service-bluemarine"></i>
              <i class="fa fa-ship fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading"><?php echo $rowService2['service_name'];?></h4>
            <?php
              if ($resultList2->num_rows > 0) {
                  echo "<ul class='text-left'>";
                while($rowList2 = $resultList2->fetch_assoc()) {
                  echo "<li class='text-muted'>".$rowList2['listservice_context']."</li>";
                } 
              }else {
                  echo "0 results";
                }
            ?>
            </ul>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x service-bluemarine"></i>
              <i class="fa fa-industry fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading"><?php echo $rowService3['service_name'];?></h4>
            <?php
              if ($resultList3->num_rows > 0) {
                  echo "<ul class='text-left'>";
                while($rowList3 = $resultList3->fetch_assoc()) {
                  echo "<li class='text-muted'>".$rowList3['listservice_context']."</li>";
                } 
              }else {
                  echo "0 results";
                }
            ?>
          </div>
        </div>
      </div>
    </section>
    <!-- Find Us -->
    <section id="contact" style="padding:50px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Find Us</h2>
            <h3 class="section-subheading text-muted">
            Wisma Citra Bethesda #2nd Floor</br>
            Gading Griya Lestari blok G1 No.14-15</br>
            Jakarta Utara 14140</br>
            </h3>
          </div>
        </div>
        <div class="row">
          <div id="map" class="col-lg-12">
            <script>
                function initMap() {
                  var uluru = {lat: -6.1412485, lng: 106.9190784};
                  var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 18,
                    center: uluru
                  });
                  var marker = new google.maps.Marker({
                    position: uluru,
                    map: map
                  });
                }
              </script>
              <script async defer
              src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI5EYRVvOhYbsx3psaNatc4NpwoOHbrz4&callback=initMap">
            </script>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Us -->
    <section id="contactUs" class="py-5">
      <div class="container">
        <div class="row">
        <div class="col-md-12 text-center">
            <h3 class="section-heading text-uppercase">Contact Us</h3>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-6 col-md-offset-6">
            <form id="contactUsForm" method="post">
              <div class="input-group mb-3">
                <input id="userEmail" name="emailUser" type="text" class="form-control" placeholder="Email Address" aria-label="Email Address" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button name="submitEmail" class="btn btn-outline-secondary" onclick="submitContact()" type="button">Submit</button>
                </div>
              </div>
            <form>
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Blue Marine <?php echo date("Y"); ?></span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <!--
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
              -->
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
              <a class="email-bluemarine" href="mailto:bluemarineinternasional@gmail.com"><u>bluemarineinternasional@gmail.com</a</u>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

  </body>

</html>
