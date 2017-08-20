<?php
  	$page_title = 'My profile';
  	require_once('includes/load.php');
   	page_require_level(3);?>

<?php
  	$staffID = (int)$_GET['staffID'];
  	
  	if(empty($staffID)):
    	redirect('home.php',false);
  	else:
    	$staff_p = find_by_staffID('Staff',$staffID);
  	endif;
?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
	<div class="col-md-4">
       	<div class="panel profile">
         	<div class="jumbotron text-center bg-red">
            	<img class="img-circle img-size-2" src="uploads/staff/<?php echo $staff_p['image'];?>" alt="">
           		<h3><?php echo first_character($staff_p['fname']); ?></h3>
         	</div>
        
        	<?php if( $staff_p['staffID'] === $staff['staffID']):?>
         
         	<ul class="nav nav-pills nav-stacked">
          		<li><a href="edit_account.php"> <i class="glyphicon glyphicon-edit"></i> Edit Profile</a></li>
         	</ul>
       		<?php endif;?>
       	</div>
   	</div>
</div>

<?php include_once('layouts/footer.php'); ?>
