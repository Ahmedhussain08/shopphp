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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
      <div class="container p-3 mt-4">
      <h1 class="text-center">INSERT NEW CATEGORY</h1>
      <div class="row">
          <div class="col-11 mx-auto">

              <form method="POST" class="mt-3 p-3">
              <div class="form-group mt-4">
                    </div>
                  <div class="form-group mt-4">
                      <label for="exampleInputEmail1 mb-1">Enter Category Name</label>
                      <input name="name" type="name" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                    </div>
                  
                    <button name="btn" type="submit" class="btn btn-primary mt-2 text-center">ADD</button>
                </form>
            </div>
</div>
      </div>    
    <script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
     
</body>
</html>
