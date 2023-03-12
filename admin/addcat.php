<?php
include ('connect.php');
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $sql = mysqli_query($con,"INSERT INTO `category` ( `cname`) VALUES ( '$name')");
    if($sql){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        A simple success alert—check it out!
      </div>';
    }
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <link href="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />

    <title>Document</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>
      <h1 class="text-center">INSERT NEW CATEGORY</h1>
      <div class="row">
      <div class="col-lg-11 col-xl-3 col-sm-6 grid-margin stretch-card mx-auto rounded">


              <form method="POST" class="mt-3 p-3 col-lg-11 col-xl-3 col-sm-6">
              
                  <div class="form-group mt-4">
                      <label for="exampleInputEmail1 mb-1">Enter Category Name</label>
                      <input name="name" type="name" class="form-control mt-2 " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                    </div>
                  <div class="form-group mt-4">
                      <button name="btn" type="submit" class="btn btn-primary mt-2 p-2 text-center w-100 ">ADD CATEGORY</button>
                    </div>
                  
                </form>
            </div>
</div>
    <script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
     
</body>
</html>
