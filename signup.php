<?php
session_start();
include ("connect.php");
?>
<?php
$passerror = $usererror = $emailerror = false;
if(isset($_POST['btn'])){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];
    $contact = $_POST['contact'];
    $existusername  = mysqli_query($con,"select * from customer where cname = '$username' ");
    $existemail = mysqli_query($con,"select * from customer where cemail = '$email' ");
    $existuser = mysqli_num_rows($existusername);
    $existmail = mysqli_num_rows($existemail);
    if($password!==$cpassword){
        $passerror=true;
    }
    if($existuser){
        $usererror =true;

        // header("location:signup.php");
    }
    
    if($existmail){
        $emailerror =true;
        // echo "email already exist";
    }
    if(!$emailerror&&!$usererror && !$passerror){        
            
                $query = mysqli_query($con,"insert into customer (cname,cemail,cpassword,ccontact) values ('$username','$email','$password','$contact') ");
                // $num = mysqli_num_rows($query);
                if($query){
                    $_SESSION['username']=$username;
                    header("location:login.php");
                }
            
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
            /* color: !important; */
            border: 1px solid  #717fe0 !important;
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
       input[type=text],[type=email],[type=password],[type=number]
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
        button{
            background-color: #717fe0 !important;
        }
        h1,a{
            color: #717fe0 !important;
        }
    </style>
</head>
<body class="dark">
    
<div class="container mt-5 p-3">
        <h1 class="text-center  mt-3 fw-bold fs-1">SIGNUP TO CONTINUE</h1>
        <!-- <a href="read.php" class="btn btn-danger">View Category</a> -->
        <div id="row" class="row text-center mx-auto d-flex justify-content-center mx-auto text-center bg-drk">
            <div id="col" class="col-md-10 mx-auto text-center rounded">

      <form class="mx-auto rounded-5 dark d-flex flex-column justify-content-center mt-4 col-md-8" action="" method="POST" enctype="multipart/form-data">
      <div class="parentdiv mt-4 mx-auto col-md-10 rounded mb-3" >
        <div class=" icon col-md-1 d-flex justify-content-center " >  <i class="fa-solid fa-user-plus text-white"></i> </div>
        <div class="me-2 input-div col-md-10 p-2">  <input id="name" name="name" class=" input form-control form-control-lg " type="text" placeholder="ENTER USERNAME" required>  </div>
      </div>
      <?php if($usererror==true){
         echo'<span class="text-danger fs-3 text-center col-md-10 fw-bold">Username Already Exists</span>';
        }
          ?>
      <div class="parentdiv mx-auto d-flex flex-row col-md-10 rounded mb-3" >
        <div class=" icon col-md-1 d-flex justify-content-center" >  <i class="fa-solid fa-at text-white"></i> </div>
        <div class="me-2 input-div col-md-10 p-2">  <input name="email" class=" input form-control form-control-lg " type="email" placeholder="ENTER EMAIL" required>  </div>
      </div>
      <?php if($emailerror==true){
         echo'<span class="text-danger fs-3 text-center col-md-10 fw-bold">Email Already Exists</span>';
        }
          ?>
      <div class="parentdiv mx-auto d-flex flex-row col-md-10 rounded mb-3" >
        <div class=" icon col-md-1 d-flex justify-content-center" >  <i class="fa-solid fa-phone text-white"></i> </div>
        <div class="me-2 input-div col-md-10 p-2">  <input  maxlength="11" name="contact" class=" input form-control form-control-lg " type="number" placeholder=" Contact Number" required>  </div>
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
        <button class=" mx-1 btn  p-2 text-bold fs-3 fw-bold" name="btn" type="submit">SIGN UP</button>
</div>
    <div id="buttons" class="  mt-5 mx-auto col-md-8 fs-3 fw-bold">
        <a style="text-decoration: none;" class="fs-4 text-muted mx-4">Already a User </a>
        <a class=" col-md-" href="login.php">Login Here</a>
    </div>

</form>
</div>
</div>
</div>
</body>
</html>
