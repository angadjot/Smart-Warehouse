<?php
  	require_once('includes/load.php');
   	page_require_level(3);?>

<?php
  
  	$delete_id = delete_by_supplierID('Supplier',(int)$_GET['supplierID']);
  	if($delete_id){
      	$session->msg("s","Supplier Deleted.");
      	redirect('supplier.php');
  	} 
  	else {
      	$session->msg("d","Supplier Deletion Failed.");
      	redirect('supplier.php');
  	}
?>
