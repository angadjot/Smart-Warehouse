<?php
  	require_once('includes/load.php');
  	page_require_level(3);?>

<?php
  
  	$categorie = find_by_catID('Categories',(int)$_GET['catID']);
  	if(!$categorie){
    	$session->msg("d","Missing Categorie ID.");
    	redirect('categorie.php');
  	}
?>

<?php
  	
  	$delete_id = delete_by_catID('Categories',(int)$categorie['catID']);
  	if($delete_id){
      	$session->msg("s","Categorie Deleted.");
      	redirect('categorie.php');
  	} 
  	else {
      	$session->msg("d","Categorie Deletion failed.");
      	redirect('categorie.php');
  	}
?>
