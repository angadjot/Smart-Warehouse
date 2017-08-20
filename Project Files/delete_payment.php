<?php
  	require_once('includes/load.php');
  	page_require_level(3);?>

<?php
  	$d_sale = find_by_billno('Payment',(int)$_GET['billno']);
  	if(!$d_sale){
    	$session->msg("d","Missing Bill Number.");
    	redirect('payment.php');
  	}
?>

<?php
  	$delete_id = delete_by_billno('Payment',(int)$d_sale['billno']);
  	if($delete_id){
      	$session->msg("s","Payment Detail Deleted.");
      	redirect('payment.php');
  	} 
  	else {
		$session->msg("d","Payment Detail Deletion Failed.");
      	redirect('payment.php');
  	}
?>
