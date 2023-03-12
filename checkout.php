<?php
session_start();
include("connect.php");
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

    <style>
      .color1{
		color: #717fe0 !important;
	}
        .gradient-custom {
/* fallback for old browsers */

/* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top left, #6674d1, rgb(133, 102, 226));


}
    </style>
</head>
<body>
  <h1 class="text-center color1 my-2">FINALIZE YOUR ORDER</h1>
<div class="container-fluid mt-2">
  <div class="row no-gutters">
  <div class="col-lg-7">
    <form method="POST" class="" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-5 col-lg-10 my-2">
                <label for="name">Enter  Name</label>
                <input name="name" type="text" class="form-control w-100" id="name" placeholder="Enter name" required>
            </div>
            <div class="col-md-5 col-lg-10  my-2">
                <label for="price">Enter Address </label>
                <input name="address" type="text" class="form-control w-100" id="price" placeholder="Enter price" required>
            </div>
            <div class="col-md-5 col-lg-10  my-2">
                <label for="desc">Enter Email </label>
                <input name="email" type="email" class="form-control w-100" id="desc" placeholder="Enter description" required>
            </div>
            <div class="col-md-5 col-lg-10  my-2">
                <label for="desc">Enter Ph: No </label>
                <input name="contact" type="number" class="form-control w-100" id="desc" placeholder="Enter description" required>
            </div>
            <div class="col-md-5 col-lg-10  my-2">
                <label for="desc">Enter date of birth </label>
                <input name="birthday" type="date" class="form-control w-100" id="desc" placeholder="Enter description" required>
            </div>
            <div class="col-md-5 col-lg-10  my-2">
            <label for="catid">SELECT CATEGORY</label>
            <select class="form-control " name="catid" id="catid" required>
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
            <div class="col-md-5 col-lg-10  my-2">
                <label for="desc">Remarks (Additional Information) </label>
                <input name="desc" type="text" class="form-control w-100" id="desc" placeholder="Enter description" required>
            </div>
            <div class="col-md-5 col-lg-10  my-2">
            <button class="w-100 p-2 btn btn-primary " >Place Order</button>

            </div>

        </div>
    </form>
</div>

    <div class="col-lg-5">

    <div class="card my-2" style="border-radius: 10px;">
              <div class="card-header px-4 py-5">
                <h5 class="text-muted mb-0">Thanks for your Order, <span class="color1">
                <?php $sql = mysqli_query($con,"select * from customer where cemail = '{$_SESSION["username"]}' or cname = '{$_SESSION["username"]}'");
                $row= mysqli_fetch_array($sql);
                echo $row[1];
              ?>
              </span>!</h5>
              </div>
              <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
                  <p class="small text-muted mb-0">Receipt Name : <span class="color1"><?php echo $row[1] ?></span></p>
                </div>
                <?php

if(isset($_SESSION['cart'])){
    $totalPrice = 0;
    foreach($_SESSION['cart'] as $key => $value) {
        $totalPrice += $value['price'] * $value['qty'];
?>
        <div class="card shadow-0 border mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="admin/productimages/<?php echo $value['image']; ?>" class="img-fluid" alt="Phone">
                    </div>
                    <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                        <p class="text-muted mb-0"><?php echo $value['name']; ?></p>
                    </div>
                    <!-- <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                        <p class="text-muted mb-0 small"><?php echo $value['color']; ?></p>
                    </div> -->
                    
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                        <p class="text-muted mb-0 small">Qty: <?php echo $value['qty']; ?></p>
                    </div>
                    <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Price: RS.  <?php echo $value['price'] * $value['qty']; ?></p>

                    </div>
                </div>
                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                <!-- Track Order section goes here -->
            </div>
        </div>
        <?php
    }
        }
        ?>
            <div class="d-flex justify-content-between pt-2">
              <p class="fw-bolder mb-2">Order Details</p>
              <p class="color1 mb-0 mt-4fw-bold fs-20"><span class="text-muted me-4">Total : RS. </span> <?php echo $totalPrice ?> </p>
            </div>

            <div class="d-flex justify-content-between pt-2">
            <p class="color1 fw-bold mb-0"><span class="text-muted me-4">Invoice Number : </span> <?php echo rand(); ?> </p>

            </div>

            <div class="d-flex justify-content-between">
            <p class="color1 fw-bold mb-0"><span class="text-muted me-4">Invoice Date : </span> <?php echo date('d,m,y.'); ?> </p>

            </div>

            <div class="d-flex justify-content-between mb-5">
              <p class="color1 fw-bold mb-0"><span class="text-muted me-4">Delivery Charges : </span> Free</p>
            </div>
          </div>
         
    </div>
  </div>
</div>

</body>
</html>