<?php
require_once '../../config.php';

require_once BLA.'inc/header.php'; 
require_once BL.'functions/validate.php';

?>
<?php

if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
if( checkEmpty($name) AND checkEmpty($email) AND checkEmpty($password)){


    if (validEmail($email)){
        // $success_message="you entered";
        $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
        $sql="INSERT INTO  admins (`admin_name` ,`admin_email`,`admin_password`)VALUES('$name' ,'$email' , '$hashedPassword')";
    $success_message=db_insert($sql);
    }
    else {
        $error_message="please type correct email";
    }
}
else {
    $error_message="please fill all fields";
}

require  BL.'functions/messages.php';

}

?>
<div class="col-sm-6  offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-primary text-white">ADD NEW ADMIN</h3>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" >
  <div class="form-group">
    <label >NAME</label>
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
  <button type="submit" name="submit" class="btn btn-success">SAVE</button>
</form>
</div>

<?php 
require_once BLA.'inc/footer.php';
?>
