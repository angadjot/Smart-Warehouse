<?php
  	$page_title = 'Edit Categorie';
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
	if(isset($_POST['edit_cat'])){
		
		$req_field = array('catName','Description');
		validate_fields($req_field);
	
		$catName = remove_junk($db->escape($_POST['catName']));
		$Description = remove_junk($db->escape($_POST['Description']));
  
  		if(empty($errors)){
    	
    		$sql = "UPDATE categories SET catName='{$catName}',Description='{$Description}'";
			$sql .= " WHERE catID='{$categorie['catID']}'";
     		$result = $db->query($sql);
     
    		if($result && $db->affected_rows() === 1) {
       			$session->msg("s", "Successfully updated Categorie");
       			redirect('categorie.php',false);
     		} 
     	
     		else {
       			$session->msg("d", "Sorry! Failed to Update");
       			redirect('categorie.php',false);
     		}
  		} 
  	
  		else {
    		$session->msg("d", $errors);
    		redirect('categorie.php',false);
  		}
	}
?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-10">
     <?php echo display_msg($msg); ?>
   </div>
</div>

<div class="row">
	<div class="col-md-10">
	
		<div class="panel panel-default">
			
			<div class="panel-heading">
				<strong>
					<span class="glyphicon glyphicon-th"></span>
        			<span>Editing Categorie</span>
				</strong>
       		</div>
       	
       
       		<div class="panel-body">
       			<div class="col-md-8">
       			
       				<form method="post" action="edit_categorie.php?catID=<?php echo (int)$categorie['catID'];?>">
           			
           				<div class="form-group">
           					<label for="catID" class="control-label">Categorie ID</label>
               				<input type="text" class="form-control" name="catID" value="<?php echo remove_junk(ucfirst($categorie['catID']));?>">
           				</div>
           			
           				<br>
           			
           				<div class="form-group">
            				<label for="catName">Categorie Name</label>
                			<input type="text" class="form-control" name="catName" value="<?php echo remove_junk(ucfirst($categorie['catName']));?>">
            			</div>
            		
            			<br>
            		
            			<div class="form-group">
            				<label for="Description">Description</label>
            				<textarea class="form-control" rows="7" name="Description" placeholder="Categorie Description"><?php echo remove_junk(ucfirst($categorie['Description']));?></textarea>
            			</div>
        		
        				<br>
           			
           				<button type="submit" name="edit_cat" class="btn btn-primary">Update categorie</button>
       				
       				</form>
       		
       			</div>
     
    		</div>
    	
		</div>
	
	</div>
</div>


<?php include_once('layouts/footer.php'); ?>
