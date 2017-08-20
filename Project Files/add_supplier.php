<?php
	$page_title = 'Add Supplier';
  	require_once('includes/load.php');
  	page_require_level(3);?>

<?php
	if(isset($_POST['add_supplier'])){

   		$req_fields = array('supplierID','title','fname','lname','address','email','Phone' );
   		validate_fields($req_fields);

   		if(empty($errors)){
       
       		$supplierID = remove_junk($db->escape($_POST['supplierID']));
   	   		$title   = remove_junk($db->escape($_POST['title']));
   	   		$fname   = remove_junk($db->escape($_POST['fname']));
   	   		$lname   = remove_junk($db->escape($_POST['lname']));
       		$address   = remove_junk($db->escape($_POST['address']));
       		$email   = remove_junk($db->escape($_POST['email']));
       		$Phone   = remove_junk($db->escape($_POST['Phone']));
        
        	$query = "INSERT INTO Supplier (";
        	$query .="supplierID,title,fname,lname,address,email";
        	$query .=") VALUES (";
        	$query .=" '{$supplierID}', '{$title}', '{$fname}', '{$lname}', '{$address}', '{$email}' ";
        	$query .=")";
        	$query = "INSERT INTO Supplier_Phone (";
        	$query .="supplierID,Phone";
        	$query .=") VALUES (";
        	$query .=" '{$supplierID}', '{$Phone}' ";
        	$query .=")";
        	
        	if($db->query($query)){
        	
          		$session->msg('s',"Supplier account has been creted! ");
          		redirect('add_supplier.php', false);
    		} 
    		
    		else {
          		$session->msg('d',' Sorry failed to create account!');
          		redirect('add_supplier.php', false);
        	}
   		}
   		 
   		else {
     		$session->msg("d", $errors);
      		redirect('add_supplier.php',false);
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
          			<span>Add New Supplier</span>
       			</strong>
      		</div>
      	
      		<div class="panel-body">
        	
        		<div class="col-md-8">
          			<form method="post" action="add_supplier.php">
            	
            			<div class="form-staff">
            				<label for="supplierID">Supplier ID</label>
            				<input type="text" class="form-control" name="supplierID" placeholder="Supplier ID">
            			</div>
            
            			<br>
            
     		       		<div class="form-staff">
            				<label for="stitle">Title</label>
            				<input type="text" class="form-control" name="title" placeholder="Title">
            			</div>
            		
            			<br>
            		
            			<div class="form-staff">
               		 		<label for="fname">First Name</label>
             		   		<input type="text" class="form-control" name="fname" placeholder="First Name">
            			</div>
            
            			<br>
            
            			<div class="form-staff">
                			<label for="lname">Last Name</label>
                			<input type="text" class="form-control" name="lname" placeholder="Last Name">
            			</div>
            
            			<br>
            			
            			<div class="form-staff">
                			<label for="address">Address</label>
                			<input type="address" class="form-control" name ="address"  placeholder="Address">
            			</div>
            
            			<br>
            		
            			<div class="form-staff">
                			<label for="email">Email ID</label>
                			<input type="email" class="form-control" name ="email"  placeholder="username@domain.com">
            			</div>
            
            			<br>
        	
        				<div class="form-staff">
                			<label for="Phone">Phone Number</label>
                			<input type="phone" class="form-control" name ="Phone"  placeholder="Phone Number">
            			</div>
            
            			<br>
            
            			<div class="form-staff clearfix">
              				<button type="submit" name="add_supplier" class="btn btn-primary">Add Supplier</button>
            			</div>
        	
        			</form>
        		</div>

      	</div>
    </div>
	</div>
</div>

<?php include_once('layouts/footer.php'); ?>