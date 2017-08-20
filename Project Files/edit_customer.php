<?php
  	$page_title = 'Edit Customer';
  	require_once('includes/load.php');
   page_require_level(3);?>

<?php
  	$e_Customer = find_by_custID('Customer',(int)$_GET['custID']);
  	if(!$e_Customer){
    	$session->msg("d","Missing Customer ID.");
    	redirect('Customers.php');
  	}
  	$e_Customer_Phone = find_by_custID('Customer_Phone',(int)$_GET['custID']);
  	if(!$e_Customer_Phone){
    	$session->msg("d","Missing Customer ID.");
    	redirect('Customers.php');
  	}
?>

<?php

  	if(isset($_POST['update'])) {
    	
    	$req_fields = array('title','fname','lname','address','email');
    	validate_fields($req_fields);
    	
    	if(empty($errors)){
        	
        	$id = (int)$e_Customer['custID'];
            $title = remove_junk($db->escape($_POST['title']));
            $fname = remove_junk($db->escape($_POST['fname']));
            $lname = remove_junk($db->escape($_POST['lname']));
            $address = remove_junk($db->escape($_POST['address']));
            $email = remove_junk($db->escape($_POST['email']));
            
            $sql = "UPDATE Customer SET title='{$title}', fname ='{$fname}',lname ='{$lname}' ,address='{$address}',email='{$email}' WHERE custID='{$db->escape($id)}'";
         	$result = $db->query($sql);
          
          	if($result && $db->affected_rows() === 1){
            	$session->msg('s',"Acount Updated ");
            	redirect('edit_Customer.php?custID='.(int)$e_Customer['custID'], false);
          	} 
          	else {
            	$session->msg('d',' Sorry failed to updated!');
            	redirect('edit_Customer.php?custID='.(int)$e_Customer['custID'], false);
          	}
    	} 
    	else {
      		$session->msg("d", $errors);
      		redirect('edit_Customer.php?custID='.(int)$e_Customer['custID'],false);
    	}
  	}
?>

<?php

	if(isset($_POST['update-phone'])) {
  		
  		$req_fields = array('Phone');
  		validate_fields($req_fields);
  		
  		if(empty($errors)){
           
           	$id = (int)$e_Customer['custID'];
     		$Phone = remove_junk($db->escape($_POST['Phone']));
          
          	$sql = "UPDATE Customer_Phone SET Phone='{$Phone}' WHERE custID='{$db->escape($id)}'";
       		$result = $db->query($sql);
        
        	if($result && $db->affected_rows() === 1){
          		$session->msg('s',"Customer Phone Number has been updated ");
          		redirect('edit_Customer.php?custID='.(int)$e_Customer['custID'], false);
        	} 
        	else {
          		$session->msg('d',' Sorry failed to updated Customer Phone Number!');
          		redirect('edit_Customer.php?custID='.(int)$e_Customer['custID'], false);
        	}
  		} 
  		else {
    		$session->msg("d", $errors);
    		redirect('edit_Customer.php?custID='.(int)$e_Customer['custID'],false);
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
          			Update Customer Details
        		</strong>
       		</div>
       
       		<div class="panel-body">
          		<form method="post" action="edit_customer.php?custID=<?php echo (int)$e_Customer['custID'];?>" class="clearfix">
            		
            		<div class="form-group">
                  		<label for="title" class="control-label">Title</label>
                  		<input type="text" class="form-control" name="title" value="<?php echo remove_junk(ucwords($e_Customer['title'])); ?>">
            		</div>
            		
            		<br>
            
            		<div class="form-group">
                  		<label for="fname" class="control-label">First Name</label>
                  		<input type="text" class="form-control" name="fname" value="<?php echo remove_junk(ucwords($e_Customer['fname'])); ?>">
            		</div>
            
            		<br>
            
            		<div class="form-group">
                  		<label for="lname" class="control-label">Last Name</label>
                  		<input type="text" class="form-control" name="lname" value="<?php echo remove_junk(ucwords($e_Customer['lname'])); ?>">
            		</div>
            
            		<br>
            	
            		<div class="form-group">
                  		<label for="address" class="control-label">Address</label>
                  		<input type="text" class="form-control" name="address" value="<?php echo remove_junk(ucwords($e_Customer['address'])); ?>">
            		</div>
            		
            		<br>
            		
            		<div class="form-group">
                  		<label for="email" class="control-label">Email ID</label>
                  		<input type="text" class="form-control" name="email" value="<?php echo remove_junk(ucwords($e_Customer['email'])); ?>">
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
        		<form action="edit_customer.php?custID=<?php echo (int)$e_Customer['custID'];?>" method="post" class="clearfix">
          
          			<div class="form-group">
                		<label for="Phone" class="control-label">Phone Number</label>
                		<input type="phone" class="form-control" name="Phone" value="<?php echo remove_junk(ucwords($e_Customer_Phone['phone'])); ?>">
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
