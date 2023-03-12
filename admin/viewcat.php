<?php
include ("connect.php");
$error = '';
if(isset($_GET['deleteid'])){
    try {
    $del = $_GET['deleteid'];
    $delete = mysqli_query($con,"DELETE FROM category WHERE cid ='$del'");
    header("location:index.php?viewcat");
}
catch (mysqli_sql_exception $e) {
// Display your custom error message
$error= "<p>Unable to delete category: This category is currently being used by one or more products.</p>";
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            <div class="col-lg-11 col-xl-3 col-sm-6 grid-margin stretch-card mx-auto rounded">
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
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
</html>



