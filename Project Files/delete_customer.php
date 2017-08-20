<?php
  	require_once('includes/load.php');
   	page_require_level(3);?>

<?php
  
  	$delete_id = delete_by_custID('Customer',(int)$_GET['custID']);
  	if($delete_id){
      	$session->msg("s","Customer Deleted.");
      	redirect('customer.php');
  	} 
  	else {
      	$session->msg("d","Customer Deletion failed.");
      	redirect('customer.php');
  	}
?>
