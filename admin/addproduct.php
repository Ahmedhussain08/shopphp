<?php
include ('connect.php');
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $imagename = $_FILES['filename']['name'];
    $imagelocation = $_FILES['filename']['tmp_name'];
    $catid  = $_POST['catid'];
    $brandid  = $_POST['brandid'];
    move_uploaded_file($imagelocation,'productimages/'.$imagename);
    $sql = mysqli_query($con,"INSERT INTO `product` ( `pname`, `pprice`, `pdesc`, `pimage`, `catID`, `BrandID`) VALUES ( '$name', '$price', '$desc', '$imagename', '$catid', '$brandid')");
    if($sql){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        NEW PRODUCT ADDED!.
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
   <!-- plugins:css -->
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
<h1 class="text-center">INSERT NEW PRODUCT</h1>
<form method="POST" class="mt-3 p-3" enctype="multipart/form-data">
    <div class="form-group row">
        <div class="col-md-6 my-4  text-white">
            <label for="name">Enter PRODUCT Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Enter name" required>
        </div>
        <div class="col-md-6 my-4  text-white">
            <label for="price">Enter PRODUCT PRICE</label>
            <input name="price" type="number" class="form-control" id="price" placeholder="Enter price" required>
        </div>
        <div class="col-md-6 my-4  text-white">
            <label for="desc">Enter PRODUCT DESCRIPTIONS</label>
            <input name="desc" type="text" class="form-control" id="desc" placeholder="Enter description" required>
        </div>

        <div class="col-md-6 my-4  text-white">
            <label for="filename">SELECT IMAGE</label>
            <input name="filename" type="file" class="form-control-file" required >
        </div>
        <div class="col-md-6 my-4  text-white">
            <label for="catid">SELECT CATEGORY</label>
            <select class="form-control text-white" name="catid" id="catid" required>
                <option selected  value="">SELECT CATEGORY</option>
                <?php
                    $c = mysqli_query($con,"select * from category");
                    while($row = mysqli_fetch_array($c))
                    {
                        echo '<option value="'.$row[0].'">' .$row[1].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-md-6 my-4">
            <label for="brandid">SELECT BRAND</label>
            <select class="form-control text-white" name="brandid" id="brandid" required>
                <option selected  value="">SELECT BRAND</option>
                <?php
                    $c = mysqli_query($con,"select * from brand");
                    while($row = mysqli_fetch_array($c))
                    {
                        echo '<option value="'.$row[0].'">' .$row[1].'</option>';
                    }
                ?>
            </select>
        </div>
    </div>
    <button name="btn" type="submit" class="btn btn-primary mt-1 text-center col-md-12 p-2 mx-auto">ADD PRODUCt</button>
</form>


    <script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
     
</body>
</html>
