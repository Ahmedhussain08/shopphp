<?php
include("connect.php");
$error = '';
$success = false;

if(isset($_GET['deleteid'])){
    try {
        $del = $_GET['deleteid'];
        $delete = mysqli_query($con,"DELETE FROM category WHERE cid ='$del'");
        $success = true;
    }
    catch (mysqli_sql_exception $e) {
        // Display your custom error message
        $error= "<p>Unable to delete category: This category is currently being used by one or more products.</p>";
    }
}

if ($success) {
    header("location:index.php?viewcat");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <a href="index.php?addcat" class="btn btn-success my-2">ADD NEW</a>
    <p><?php echo $error; ?></p>
        <div class="row">
            <div class="col-lg-11 col-md-9 col-xl-3 col-sm-6 grid-margin mx-auto rounded">
                 <table class="table border border-white border-3 bg-dark text-white rounded">
                     <tr class="border border-white border-3 bg-dark ">
                         <thead class="border border-white border-3" >
                             <th>S.NO</th>
                             <th> CATEGORY NAME</th>
                             <th> ACTIONS</th>
                         </thead>
                     </tr>
                     <?php
                     $i=1;
                         $row = mysqli_query($con,"select * from category");
                         while($data = mysqli_fetch_array($row))
                         {
                             
                             echo 
                             '
                             <tr class="border border-primary border-2" >
                             <td class="border border-primary border-2 fw-bold fs-2" >'.$i++.'</td>
                             <td class="border border-primary border-2 fw-bold fs-3 text-uppercase">'.$data[1].'</td>
                             <td class="border border-primary border-2" ><a href="editcat.php?editcat='.$data[0].'" class="btn btn-primary" >
                             EDIT
                           </a>
                             <a href="viewcat.php?deleteid='.$data[0].'" class= "btn btn-danger"> delete <a/></td>
                             </tr>
                             
                             ';
                         
                         }
                         if(isset($_GET['editid'])){
                             
                             $ed = $_GET['editid'];
                             if(isset($_POST['editbtn'])){
                                $editname = $_POST['name'];
                                $edit = mysqli_query($con,"UPDATE `category` SET `cname` = '$editname' WHERE `category`.`cid` = '$ed'");
                                
                                // header("location:index.php?viewcat");
                            }
                        }
                        
                         
                         

                     ?>
                 </table>
               
            </div>
        </div>
</body>

    <script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>

</html>



