<?php
include ('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
</head>
<body>
    <div class="container mt-4 p-3">
        <div class="row">
            <div class="col-11 mx-auto">
                <a href="index.php?addcat" class="btn btn-success my-2">ADD NEW</a>
                 <table class="table border border-3 bg-dark text-white" border='1'>
                     <tr class=" bg-dark ">
                         <thead class="" >
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
                             <td class="border border-primary border-2" ><a href="viewcat.php?editid'.$data[0].'" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
   
                        
                         if(isset($_GET['deleteid'])){
                             $del = $_GET['deleteid'];
                             $delete = mysqli_query($con,"DELETE FROM category WHERE cid ='$del'");
                             header("location:index.php?viewcat");
                         }
                         

                     ?>
                 </table>
                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
        <div class="form-group mt-4">
                      <label for="exampleInputEmail1 mb-1">Enter Category Name</label>
                      <input name="name" type="text" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button name="editbtn" type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
        </div>
    </div>
</body>
</html>



