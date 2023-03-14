<?php 
include ("connect.php");
if(isset($_GET['editpro'])){
        $editpro = $_GET['editpro'];
        $sql = mysqli_query($con,"select * from product where pid = '$editpro'");
        $result = mysqli_fetch_array($sql);
}

if(isset($_POST['btn'])){
    $editname = $_POST['name'];
    $editprice = $_POST['price'];
    $editdesc = $_POST['desc'];
    $editcatid = $_POST['catid'];
    $editbrandid = $_POST['brandid'];
    $imagename = $_FILES['filename']['name'];
    $imagelocation = $_FILES['filename']['tmp_name'];

    // Move uploaded image to the uploads folder
    move_uploaded_file($imagelocation,'productimages/'.$imagename);


    $editsql = mysqli_query($con, "UPDATE `product` SET `pname` = '$editname', `pprice` = '$editprice', `pdesc` = '$editdesc', `catID` = '$editcatid', `BrandID` = '$editbrandid', `pimage` = '$imagename' WHERE `pid` = '$editpro'");

    if($editsql){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      </div>';
      header("location:index.php?viewproduct");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<h1 class="text-center mt-4">Update CATEGORY</h1>
<form method="POST" class="mt-3 p-3" enctype="multipart/form-data">
    <div class="form-group row">
        <div class="col-md-6 my-4  text-white">
            <label for="name">Enter PRODUCT Name</label>
            <input value="<?php echo $result[1] ?>" name="name" type="text" class="form-control" id="name" placeholder="Enter name" required>
        </div>
        <div class="col-md-6 my-4  text-white">
            <label for="price">Enter PRODUCT PRICE</label>
            <input value="<?php echo $result[2] ?>" name="price" type="number" class="form-control" id="price" placeholder="Enter price" required>
        </div>
        <div class="col-md-6 my-4  text-white">
            <label for="desc">Enter PRODUCT DESCRIPTIONS</label>
            <input value="<?php echo $result[3] ?>" name="desc" type="text" class="form-control" id="desc" placeholder="Enter description" required>
        </div>

        <div class="col-md-6 my-4  text-white">
            <label for="filename">SELECT IMAGE</label>
            <input value="<?php echo $result[5] ?>" name="filename" type="file" class="form-control-file" required >
        </div>
        <div class="col-md-6 my-4  text-white">
            <label for="catid">SELECT CATEGORY</label>
            <select class="form-control text-white" name="catid" id="catid" required>
    <option value="">SELECT CATEGORY</option>
    <?php
        $c = mysqli_query($con,"select * from category");
        while($row = mysqli_fetch_array($c))
        {
            if ($row[0] == $result[5]) {
                echo '<option value="'.$row[0].'" selected>' .$row[1].'</option>';
            } else {
                echo '<option value="'.$row[0].'">' .$row[1].'</option>';
            }
        }
    ?>
</select>

        </div>
        <div class="col-md-6 my-4">
            <label for="brandid">SELECT BRAND</label>
            <select class="form-control text-white" name="brandid" id="brandid" required>
    <option value="">SELECT BRAND</option>
    <?php
        $b = mysqli_query($con,"select * from brand");
        while($row = mysqli_fetch_array($b))
        {
            if ($row[0] == $result[6]) {
                echo '<option value="'.$row[0].'" selected>' .$row[1].'</option>';
            } else {
                echo '<option value="'.$row[0].'">' .$row[1].'</option>';
            }
        }
    ?>
</select>


        </div>
    </div>
    <button name="btn" type="submit" class="btn btn-primary mt-1 text-center col-md-12 p-2 mx-auto">ADD PRODUCt</button>
</form>
</body>
</html>