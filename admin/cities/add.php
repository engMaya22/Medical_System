<?php
require '../../config.php'; 
require_once BLA.'inc/header.php'; 
require BL.'functions/validate.php';



?>

<?php

if(isset($_POST['submit']))
{
    $name=$_POST['name'];

    if(checkEmpty($name) && checkLess($name,3)){
          $sql= "INSERT INTO  cities (`city_name`)VALUES  ('$name')";
        $success_message=db_insert($sql);
    }

    else{
        $error_message="please fill all fields";
    }


    require  BL.'functions/messages.php';
}

?>


<div class="col-sm-6 offset-sm-3 border p-5 text-center">

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"  >

  <div class="form-group" >
      <div  class="text-center  mb-0 mt-3 p-2 bg-primary text-white">
  <label > Name Of City</label>
</div>
    <input type="text" class="form-control"  name="name"/>
  </div>
  <button type="submit" name="submit" class="btn btn-success form-control">SAVE</button>
</form>

</div>


<?php 
require_once BLA.'inc/footer.php';
?>
