<?php
require '../../config.php'; 
require_once BLA.'inc/header.php'; 
require_once BL.'functions/validate.php';
require_once BL.'functions/db.php';
?>
<?php
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $city_id=$_POST['city_id'];

    if(checkEmpty($name) && checkLess($name,3)){

        $row=getRow('cities','city_id',$city_id);
        if($row)
        {
            $sql= "UPDATE cities  SET `city_name`='$name' WHERE `city_id` =  '$city_id ' ";
            $success_message=db_update($sql);
            header("refresh:2;url=".BURLA."cities");
            // wait for 2 secends after  refresh
        }
        
    else{
        $error_message="please Type Correct Data";
    }

         
    }

    else{
        $error_message="please fill all fields";
    }



}

?>




<?php 
require_once BLA.'inc/footer.php';
?>
