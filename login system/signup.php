<?php
include ("connection.php");
?>
<?php
$passerror = false;
if(isset($_POST['btn'])){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];
    $gender = $_POST['gender'];
    $existusername  = mysqli_query($con,"select * from phptab where name = '$username' ");
    $existemail = mysqli_query($con,"select * from phptab where email = '$email' ");
    $existuser = mysqli_num_rows($existusername);
    $existmail = mysqli_num_rows($existemail);
    if($existuser>0){
        echo"username allready exists";
        // header("location:signup.php");
    }
    
    if($existmail>0){
       echo 'email already exists';
    }
    if($password===$cpassword){        
            
                $query = mysqli_query($con,"insert into phptab (name,email,password,gender) values ('$username','$email','$password','$gender') ");
                // $num = mysqli_num_rows($query);
                if($query){
                    header("location:login.php");
                }
            
        }
        else {
            $passerror = true;
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
    <script src="https://kit.fontawesome.com/d5e39b568f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .parentdiv{
            border: 1px solid red;
            display: flex !important;
            justify-content:center !important;
            align-items: center !important;
             padding: 3px 15px; 
        }  
        ::placeholder{
            color: rgb(248, 242, 242) !important;
        }
        .gender{
            display: flex !important;
            justify-content:space-evenly !important;
            align-items: center !important;
        }
        
        #col{
            display: flex !important;
            justify-content: center !important;
        }
       #row{
        display: flex !important;
        justify-content: center !important;
       }
       input[type=radio] 
       {
         border:solid thin red; 
    }
       input[type=text],[type=email],[type=password]
       {
         border: none ;
         outline: none !important;
         color: white;
      /* border-bottom: 2px solid white; */
         border-radius: 0;
         background: transparent !important;
         transition: 0.1s ease;
    }
       .input:focus{
        border: none ;
         outline: none !important;
         color: white;
         border-bottom: 2px solid white !important;
         background: transparent !important;
    }
    .form-control:focus {
  border-color: inherit;
  -webkit-box-shadow: none;
  box-shadow: none;
}

    .dark{
        background-color: black;
    }
        .input-div{
        
            margin-right: 1px;
        }
        .input-div input{
            width: 100%;
        }
        .icon{
            display: inline-block;
        }
        .icon i{
            font-size: 2rem;
        }
         #buttons{
            display:flex !important;
            justify-content:end !important;
            align-items: center !important;
        }
        .btn{
            width:100%;
        }
        #or{
            display:inline-block !important;
            margin-right:15px;
            margin-left:15px;
            margin-top:5px;
        }
    </style>
</head>
<body class="dar">
    
<div class="container mt-5 p-3">
        <h1 class="text-center text-danger mt-3 fw-bold fs-1">SIGNUP TO CONTINUE</h1>
        <!-- <a href="read.php" class="btn btn-danger">View Category</a> -->
        <div id="row" class="row text-center mx-auto d-flex justify-content-center mx-auto text-center bg-drk">
            <div id="col" class="col-md-10 mx-auto text-center rounded">

      <form class="mx-auto rounded-5 dark d-flex flex-column justify-content-center mt-4 col-md-8" action="" method="POST" enctype="multipart/form-data">
      <div class="parentdiv mt-4 mx-auto col-md-10 rounded mb-3" >
        <div class=" icon col-md-1 d-flex justify-content-center " >  <i class="fa-solid fa-user-plus text-white"></i> </div>
        <div class="me-2 input-div col-md-10 p-2">  <input id="name" name="name" class=" input form-control form-control-lg " type="text" placeholder="ENTER NAME" required>  </div>
      </div>
      <div class="parentdiv mx-auto d-flex flex-row col-md-10 rounded mb-3" >
        <div class=" icon col-md-1 d-flex justify-content-center" >  <i class="fa-solid fa-at text-white"></i> </div>
        <div class="me-2 input-div col-md-10 p-2">  <input name="email" class=" input form-control form-control-lg " type="email" placeholder="ENTER EMAIL" required>  </div>
      </div>

      <div class="gender border border-danger mx-auto d-flex flex-row justify-content-space-evenly col-md-10 rounded mb-3" >
    
        <!-- <div class="d-md-flex justify-content-start align-items-center mb-4 py-2"> -->

            <h3 class="my-auto text-bold text-white">Gender: </h3>

            <div class="my-auto form-check form-check-inline  me-2 p-3">
              <input checked name="gender" value="male" class="form-check-input " type="radio"  id="femaleGender"
                 />
             <h5>

              <label class="form-check-label my-auto text-danger" for="femaleGender">Male</label>
            </h5> </div>

            <div class="form-check form-check-inline my-auto me-2 p-3">
                <input name="gender" value="female" class="form-check-input " type="radio"  id="femaleGender"
                   />
               <h5>
  
                <label class="form-check-label my-auto text-danger" for="femaleGender">Female</label>
              </h5> </div>

              <div class="form-check form-check-inline my-auto mb-0 me-2 p-3">
                <input name="gender" value="other"  class="form-check-input " type="radio"  id="femaleGender"
                  value="option1" />
               <h5>
  
                <label class="form-check-label my-auto text-danger" for="femaleGender">Other</label>
              </h5> </div>

          </div>
      <div class="parentdiv mx-auto d-flex flex-row col-md-10 rounded mb-3" >
        <div class=" icon col-md-1 d-flex justify-content-center" >  <i class="fa-solid fa-lock text-white"></i> </div>
        <div class="me-2 input-div col-md-10 p-2">  <input name="pass" class=" input form-control form-control-lg " type="password" placeholder=" PASSWORD" required>  </div>
      </div>
      <div class="parentdiv mx-auto d-flex flex-row col-md-10 rounded mb-3" >
        <div class=" icon col-md-1 d-flex justify-content-center" >  <i class="fa-solid fa-key text-white"></i> </div>
        <div class="me-2 input-div col-md-10 p-2">  <input class=" input  form-control form-control-lg " type="password" name="cpass" placeholder="RE-TYPE PASSWORD" required>  </div>
        </div>
      <?php if($passerror==true){
         echo'<span class="text-danger fs-3 text-center col-md-10 fw-bold">Password do not match</span>';
        }
          ?>
      <div class=" mx-auto d-flex flex-row col-md-11  rounded " >
        <button class=" mx-1 btn btn-danger p-2 text-bold fs-3 fw-bold" name="btn" type="submit">SIGN UP</button>
</div>
    <div id="buttons" class="  mt-5 mx-auto col-md-8 fs-3 fw-bold">
        <a style="text-decoration: none;" class="fs-4 text-muted mx-4">Already a User </a>
        <a class="text-danger col-md-" href="login.php">Login Here</a>
    </div>

</form>
</div>
</div>
</div>
</body>
</html>
