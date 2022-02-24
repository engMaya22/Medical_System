<?php
require '../../config.php'; 
require_once BLA.'inc/header.php'; 

?>
<?php

// i passed the id which i select in header href 
if(isset($_GET['id'])&& is_numeric($_GET['id'])){
$row=getRow('cities','city_id',$_GET['id']);
if($row)
{

$city_id=$row['city_id'];
}
else{
    header('location:'.BURLA);
}

}

else {
    header('location:'.BURLA);
}

?>



<div class="col-sm-6 offset-sm-3 border p-5 text-center">

<form method="POST" action="<?php echo BURLA.'cities/update.php' ?>"  >

  <div class="form-group" >
      <div  class="text-center  mb-0 mt-3 p-2 bg-primary text-white">
  <label > Edit The City</label>
</div>
    <input type="text" class="form-control" value=" <?php echo  $row['city_name'] ?>"  name="name"/>
  </div>
  <input type="hidden" value="<?php echo $city_id ?>"  name="city_id"/>
  <button type="submit" name="submit" class="btn btn-success form-control">SAVE</button>
</form>

</div>


<?php 
require_once BLA.'inc/footer.php';
?>
