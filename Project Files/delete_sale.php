<?php
  	require_once('includes/load.php');
  	page_require_level(3);?>

<?php
  	$d_sale = find_by_orderID('Orders',(int)$_GET['orderID']);
  	if(!$d_sale){
    	$session->msg("d","Missing Order ID.");
    	redirect('sales.php');
  	}
?>

<?php
  	$delete_id = delete_by_orderID('Orders',(int)$d_sale['orderID']);
  	if($delete_id){
      	$session->msg("s","Order Deleted.");
      	redirect('sales.php');
  	} 
  	else {
		$session->msg("d","Order Deletion Failed.");
      	redirect('sales.php');
  	}
?>
