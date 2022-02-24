<?php
require '../../config.php'; 
require_once BLA.'inc/header.php'; 
?>


<div class="col-sm-12 ">
<h3 class="text-center  mb-0 mt-5 p-3 bg-primary text-white">All Cities</h3>
<table class="table table-bordered  table-dark p-2">
<thead>
<tr class="text-center">

<th scope="col">#</th>
<th scope="col">Name</th>
<th scope="col">Actions</th>

</tr>
</thead>
<tbody>
<?php

$data=getRows('cities');?>
 <?php foreach($data as $row){ ?>
<tr class="text-center">
<td scope="row"> <?php echo $row['city_id'] ?></td>
<td class="text-center">
<?php echo $row['city_name'] ?>

</td>

<td class="text-center">

<a class="btn btn-primary" href=" <?php echo BURLA.'cities/edit.php?id='.$row['city_id']; ?>"   >Edit</a>
<a  href="#" class="btn btn-danger delete " data-field="city_id" data-id="<?php echo $row['city_id'] ?>" data-table="cities">Delete</a>
</td>
</tr>

<?php } ?>



</tbody>

</table>



</div>




<?php 
require_once BLA.'inc/footer.php';
?>
