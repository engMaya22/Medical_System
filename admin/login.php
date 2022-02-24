<?php
require '../config.php'; ?>
<?php
// for auth admin
if(isset($_SESSION['admin_name'])){
  header("location:".BURLA.'index.php');
}

?>

<?php
require BL.'functions/validate.php';



?>
<html>
    <head>
      
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>
    Dashboard Login 
</title>
</head>
<body>
   
   <?php



if(isset($_POST['submit']))
{

   $email=$_POST['email'];
   $password=$_POST['password'];

        if(checkEmpty($email) && checkEmpty($password)){
           if (validEmail($email)){

          $check=getRow('admins' ,'admin_email' , $email );
          
         
          $check_password= password_verify($password, $check['admin_password']);

  

              if($check_password){
           // create session for this admin
               $_SESSION['admin_name']=$check['admin_name'];
                $_SESSION['admin_email']=$check['admin_email'];
                $_SESSION['admin_id']=$check['admin_id'];
                 header ("Location:".BURLA.'index.php');
                                  }
  
else {
  $error_message="Data Aren't Correct ";
}          
                                  }
  
else {
    $error_message="please type correct email";
}
}
else {
$error_message="please fill all fields";


}
}

?>


<div class="col-sm-6  offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">Login</h3>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"  >

  <div class="form-group">
    <label > NAME</label>
    <input type="text" class="form-control"  name="name">
  </div>
  <div class="form-group">
    <label >EMAIL</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label >PASSWORD</label>
    <input type="password" class="form-control" name="password">
  </div>
  <button type="submit" name="submit" class="btn btn-success form-control">SUBMIT</button>
  <?php require  BL.'functions/messages.php'; ?>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>