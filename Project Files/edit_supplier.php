<?php
  	$page_title = 'Edit Supplier';
  	require_once('includes/load.php');
   	page_require_level(3);?>

<?php
  
  	$e_Supplier = find_by_supplierID('Supplier',(int)$_GET['supplierID']);
  
  	if(!$e_Supplier){
    	$session->msg("d","Missing Supplier ID.");
    	redirect('Supplier.php');
  	}
  	$e_Supplier_Phone = find_by_supplierID('Supplier_Phone',(int)$_GET['supplierID']);
  
  	if(!$e_Supplier){
    	$session->msg("d","Missing Supplier ID.");
    	redirect('Supplier.php');
  	}
?>

<?php

	if(isset($_POST['update'])) {
    
    	$req_fields = array('title','fname','lname','address','email');
    	validate_fields($req_fields);
    
    	if(empty($errors)){
            
            $id = (int)$e_Supplier['supplierID'];
            $title = remove_junk($db->escape($_POST['title']));
            $fname = remove_junk($db->escape($_POST['fname']));
            $lname = remove_junk($db->escape($_POST['lname']));
            $address = remove_junk($db->escape($_POST['address']));
            $email = remove_junk($db->escape($_POST['email']));
            
            $sql = "UPDATE Supplier SET title='{$title}',fname ='{$fname}',lname ='{$lname}'";
            $sql .= ",address='{$address}',email='{$email}' WHERE supplierID='{$db->escape($id)}'";
         	$result = $db->query($sql);
          	
          	if($result && $db->affected_rows() === 1){
            	$session->msg('s',"Acount Updated ");
            	redirect('edit_supplier.php?supplierID='.(int)$e_Supplier['supplierID'], false);
          	} 
          	else {
            	$session->msg('d',' Sorry failed to update!');
            	redirect('edit_supplier.php?supplierID='.(int)$e_Supplier['supplierID'], false);
          	}
    	} 
    	else {
      		$session->msg("d", $errors);
      		redirect('edit_supplier.php?supplierID='.(int)$e_Supplier['supplierID'],false);
    	}
  	}
?>

<?php

	if(isset($_POST['update-phone'])) {
  		
  		$req_fields = array('Phone');
  		validate_fields($req_fields);
  
  		if(empty($errors)){
           
        	$id = (int)$e_Supplier['supplierID'];
     		$Phone = remove_junk($db->escape($_POST['Phone']));
          
          	$sql = "UPDATE Supplier_Phone SET Phone='{$Phone}' WHERE supplierID='{$db->escape($id)}'";
       		$result = $db->query($sql);
        
        	if($result && $db->affected_rows() === 1){
          		$session->msg('s',"Supplier Phone Number has been updated ");
          		redirect('edit_supplier.php?supplierID='.(int)$e_Supplier['supplierID'], false);
        	} 
        	else {
          		$session->msg('d',' Sorry failed to updated Supplier Phone Number!');
          		redirect('edit_supplier.php?supplierID='.(int)$e_Supplier['supplierID'], false);
        	}
  		} 
  		else {
    		$session->msg("d", $errors);
    		redirect('edit_supplier.php?supplierID='.(int)$e_Supplier['supplierID'],false);
  		}
	}

?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
	<div class="col-md-12"> 
		<?php echo display_msg($msg); ?> 
	</div>
</div>

<div class="row">
  	
  	<div class="col-md-6">
     	<div class="panel panel-default">
       		
       		<div class="panel-heading">
        		<strong>
          			<span class="glyphicon glyphicon-th"></span>
          			Update Supplier Details
        		</strong>
       		</div>
       
       		<div class="panel-body">
          		<form method="post" action="edit_supplier.php?supplierID=<?php echo (int)$e_Supplier['supplierID'];?>" class="clearfix">
            
            		<div class="form-group">
                  		<label for="title" class="control-label">Title</label>
                  		<input type="title" class="form-control" name="title" value="<?php echo remove_junk(ucwords($e_Supplier['title'])); ?>">
            		</div>
            
            		<br>
            
            		<div class="form-group">
                  		<label for="fname" class="control-label">First Name</label>
                  		<input type="fname" class="form-control" name="fname" value="<?php echo remove_junk(ucwords($e_Supplier['fname'])); ?>">
            		</div>
            
            		<br>
            		
            		<div class="form-group">
                  		<label for="lname" class="control-label">Last Name</label>
                  		<input type="lname" class="form-control" name="lname" value="<?php echo remove_junk(ucwords($e_Supplier['lname'])); ?>">
            		</div>
            
            		<br>
            		
            		<div class="form-group">
                  		<label for="address" class="control-label">Address</label>
                  		<input type="text" class="form-control" name="address" value="<?php echo remove_junk(ucwords($e_Supplier['address'])); ?>">
            		</div>
            
            		<br>
            		
            		<div class="form-group">
                  		<label for="email" class="control-label">Email ID</label>
                  		<input type="text" class="form-control" name="email" value="<?php echo remove_junk(ucwords($e_Supplier['email'])); ?>">
            		</div>
            
            		<br>
            
            		<div class="form-group clearfix">
                    	<button type="submit" name="update" class="btn btn-info">Update</button>
            		</div>
        
        		</form>
       		</div>
     
     	</div>
  	</div>

  	<div class="col-md-6">
    	<div class="panel panel-default">
      
      		<div class="panel-heading">
        		<strong>
          			<span class="glyphicon glyphicon-th"></span>
          			Change Phone Number
        		</strong>
      		</div>
      
      		<div class="panel-body">
        		<form action="edit_supplier.php?supplierID=<?php echo (int)$e_Supplier['supplierID'];?>" method="post" class="clearfix">
          			
          			<div class="form-group">
                		<label for="Phone" class="control-label">Phone Number</label>
                		<input type="Phone" class="form-control" name="Phone" value="<?php echo remove_junk(ucwords($e_Supplier_Phone['phone'])); ?>">
          			</div>
          
          			<br>
          
          			<div class="form-group clearfix">
                  		<button type="submit" name="update-phone" class="btn btn-danger pull-right">Change</button>
          			</div>
        
        		</form>
      		</div>
    	
    	</div>
	</div>
	
</div>

<?php include_once('layouts/footer.php'); ?>
