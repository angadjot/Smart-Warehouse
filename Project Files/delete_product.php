<?php
  	require_once('includes/load.php');
  	page_require_level(3);?>

<?php
  
  	$product = find_by_productID('Product',(int)$_GET['productID']);
  	if(!$product){
    	$session->msg("d","Missing Product ID.");
    	redirect('product.php');
  	}
?>

<?php
  
  	$delete_id = delete_by_productID('Product',(int)$product['productID']);
  	if($delete_id){
      	$session->msg("s","Products Deleted.");
      	redirect('product.php');
  	} 
  	else {
      	$session->msg("d","Products Deletion failed.");
      	redirect('product.php');
  	}
?>
