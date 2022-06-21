<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql="Select * from `crud` where id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['Name'];
$email=$row['Email'];
$mobile=$row['Mobile'];
$password=$row['Password'];
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

$sql="update `crud` set id=$id,name='$name',email='$email',mobile='$mobile',password='$password' where id=$id";
$result=mysqli_query($conn,$sql);
if($result){
    //echo "Data updated successfully";
    header('location:display.php');
}else{
    die(mysqli_error($conn));
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <title> CRUD operation!</title>
  </head>
  <body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" value=<?php echo $name;?>>
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" autocomplete="off" value=<?php echo $email;?>>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile" autocomplete="off" value=<?php echo $mobile;?>>
            </div>      
            <div class="form-group">
                 <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" autocomplete="off" value=<?php echo $password;?>>
            </div>
  
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
   
  </body>
</html>