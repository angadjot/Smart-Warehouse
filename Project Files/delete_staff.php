<?php
  	require_once('includes/load.php');
   	page_require_level(1);
?>

<?php
  
  	$delete_id = delete_by_staffID('Staff',(int)$_GET['staffID']);
  	if($delete_id){
      	$session->msg("s","User Deleted.");
      	redirect('staff.php');
  	} 
  	else {
      	$session->msg("d","User Deletion Failed.");
      	redirect('staff.php');
  	}
?>
