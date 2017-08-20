<?php
	$page_title = 'Add Customer';
	require_once('includes/load.php');
  	page_require_level(3);?>

<?php
  
	if(isset($_POST['add_customer'])){

		$req_fields = array('custID','title','fname','lname','address','email','Phone' );
   		validate_fields($req_fields);

   		if(empty($errors)){
       		
       		$custID = remove_junk($db->escape($_POST['custID']));
   	   		$title   = remove_junk($db->escape($_POST['title']));
   	   		$fname   = remove_junk($db->escape($_POST['fname']));
   	   		$lname   = remove_junk($db->escape($_POST['lname']));
       		$address   = remove_junk($db->escape($_POST['address']));
       		$email   = remove_junk($db->escape($_POST['email']));
       		$Phone   = remove_junk($db->escape($_POST['Phone']));
       		
        	$query = "INSERT INTO Customer (";
        	$query .="custID,title,fname,lname,address,email";
        	$query .=") VALUES (";
        	$query .=" '{$custID}', '{$title}', '{$fname}', '{$lname}', '{$address}', '{$email}' ";
        	$query .=")";
        	$query = "INSERT INTO Customer_Phone (";
        	$query .="custID,Phone";
        	$query .=") VALUES (";
        	$query .=" '{$custID}', '{$Phone}' ";
        	$query .=")";
        
        	if($db->query($query)){

          		$session->msg('s',"Customer account has been creted! ");
          		redirect('add_customer.php', false);
        	} 
        	
        	else {
          
          		$session->msg('d',' Sorry failed to create account!');
          		redirect('add_customer.php', false);
        	}
   		} 
   		
   		else {
			$session->msg("d", $errors);
			redirect('add_customer.php',false);
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
          			<span>Add New Customer</span>
       			</strong>
			</div>
		
    	  	<div class="panel-body">
        		
        		<div class="col-md-8">
        	  		<form method="post" action="add_customer.php">
        	    		
            			<div class="form-staff">
            				<label for="custID">Customer ID</label>
            				<input type="text" class="form-control" name="custID" placeholder="Customer ID">
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
                			<input type="Phone" class="form-control" name ="Phone"  placeholder="Phone Number">
            			</div>
            		
            			<br>
            		
            			<div class="form-staff clearfix">
              				<button type="submit" name="add_customer" class="btn btn-primary">Add Customer</button>
            			</div>
        
        			</form>
        		</div>

      		</div>

   	 	</div>

	</div>
</div>

<?php include_once('layouts/footer.php'); ?>
