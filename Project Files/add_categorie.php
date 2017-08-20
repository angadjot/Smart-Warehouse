<?php
	$page_title = 'Add Categorie';
	require_once('includes/load.php');
	page_require_level(3);
  	$all_categories = find_all('categories')
?>

<?php
	if(isset($_POST['add_cat'])){
		$req_field = array('catID','catName','Description');
		
   		validate_fields($req_field);
   		
   		$catID = remove_junk($db->escape($_POST['catID']));
   		$catName = remove_junk($db->escape($_POST['catName']));
   		$Description = remove_junk($db->escape($_POST['Description']));
   		
   		if(empty($errors)){
   		
      		$sql  = "INSERT INTO Categories (";
      		$sql .="catID,catName,Description)";
      		$sql .= " VALUES ('{$catID}','{$catName}','{$Description}')";
      		
      		if($db->query($sql)){
        		$session->msg("s", "Successfully Added Categorie");
        		redirect('categorie.php',false);
      		} 
      		else {
        		$session->msg("d", "Sorry Failed to insert.");
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
            		<span>Add New Categorie</span>
         		</strong>
        	</div>
        	
        	<div class="panel-body">
        		<div class="row">
					<div class="col-md-8">
          				
          				<form method="post" action="add_categorie.php">
            				
            				<div class="form-group">
     			       			<label for="catID">Categorie ID</label>
                				<input type="text" class="form-control" name="catID" placeholder="Categorie ID">
            				</div>
            		
            				<div class="form-group">
            					<label for="catName">Categorie Name</label>
                				<input type="text" class="form-control" name="catName" placeholder="Categorie Name">
            				</div>
            		
            				<div class="form-group">
            					<label for="Description">Description</label>
                				<textarea class="form-control" rows="7" name="Description" placeholder="Categorie Description"></textarea>
            				</div>
            		
            				<button type="submit" name="add_cat" class="btn btn-primary">Add categorie</button>
        				
        				</form>
        		
        			</div>
      			</div>
      		</div>
      	
      	</div>
    
    </div>
    
</div>
   
<?php include_once('layouts/footer.php'); ?>
