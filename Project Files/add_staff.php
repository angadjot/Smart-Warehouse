<?php
	$page_title = 'Add Staff Member';
  	require_once('includes/load.php');
  	page_require_level(1);
  	$roles = find_all('Staff');
?>

<?php
	if(isset($_POST['add_staff'])){

   		$req_fields = array('staffID','roleID','title','fname','lname','username','password','roleName','gender','address','email','DOB','Phone' );
   		validate_fields($req_fields);

   		if(empty($errors)){
   	   
   	   		$staffID = remove_junk($db->escape($_POST['staffID']));
   	   		$roleID   = remove_junk($db->escape($_POST['roleID']));
   	   		$title   = remove_junk($db->escape($_POST['title']));
   	   		$fname   = remove_junk($db->escape($_POST['fname']));
   	   		$lname   = remove_junk($db->escape($_POST['lname']));
       		$username   = remove_junk($db->escape($_POST['username']));
       		$password   = remove_junk($db->escape($_POST['password']));
       		$roleName   = remove_junk($db->escape($_POST['roleName']));
       		$gender   = remove_junk($db->escape($_POST['gender']));
       		$address   = remove_junk($db->escape($_POST['address']));
       		$email   = remove_junk($db->escape($_POST['email']));
       		$DOB   = remove_junk($db->escape($_POST['DOB']));
       		$Phone   = remove_junk($db->escape($_POST['Phone']));
       		$roleID = (int)$db->escape($_POST['roleID']);
       		$password = sha1($password);
       		
    		$query = "INSERT INTO Staff (";
        	$query .="staffID,roleID,title,fname,lname,username,password,roleName,gender,address,email,DOB";
        	$query .=") VALUES (";
        	$query .=" '{$staffID}', '{$roleID}', '{$title}', '{$fname}', '{$lname}', '{$username}', '{$password}', '{$roleName}',";
        	$query .=" '{$gender}', '{$address}', '{$email}', '{$DOB}' ";
        	$query .=")";
        	$query = "INSERT INTO Staff_Phone (";
        	$query .="staffID,Phone";
        	$query .=") VALUES (";
        	$query .=" '{$staffID}', '{$Phone}' ";
        	$query .=")";
        
        	if($db->query($query)){
          		$session->msg('s',"User account has been creted! ");
          		redirect('add_staff.php', false);
        	}
        	
        	else {	
          		$session->msg('d',' Sorry failed to create account!');
          		redirect('add_staff.php', false);
        	}
   		} 
   		else {
     		$session->msg("d", $errors);
      		redirect('add_staff.php',false);
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
          			<span>Add New Staff Member</span>
       			</strong>
      		</div>
      
      		<div class="panel-body">
        		
        		<div class="col-md-8">
          			<form method="post" action="add_staff.php">
            	
            			<div class="form-staff">
            				<label for="staffID">Staff ID</label>
            				<input type="text" class="form-control" name="staffID" placeholder="Staff ID">
            			</div>
            		
            			<br>
            
            			<div class="form-staff">
            				<label for="roleID">Role ID</label>
            				<input type="text" class="form-control" name="roleID" placeholder="Role ID">
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
                			<label for="username">Username</label>
                			<input type="text" class="form-control" name="username" placeholder="Username">
            			</div>
            		
            			<br>
            			
            			<div class="form-staff">
                			<label for="password">Password</label>
                			<input type="password" class="form-control" name ="password"  placeholder="Password">
            			</div>
            			
            			<br>
            			
            			<div class="form-staff">
            	  			<label for="roleName">Staff Role</label>
                			<select class="form-control" name="roleName">
                  				<?php foreach ($roles as $role ):?>
                   					<option value="<?php echo $role['roleID'];?>"><?php echo ucwords($role['roleName']);?></option>
                				<?php endforeach;?>
                			</select>
            			</div>
            		
            			<br>
            		
            			<div class="form-staff">
                			<label for="gender">Gender</label><br>
                			<label class="radio-inline"><input type="radio" name="gender">Male</label>
                			<label class="radio-inline"><input type="radio" name="gender">Female</label>
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
                			<label for="DOB">Date Of Birth</label>
                			<input type="date" class="form-control" name ="DOB"  placeholder="DD-MM-YYYY">
            			</div>
            
            			<br>
        	
        				<div class="form-staff">
                			<label for="Phone">Phone Number</label>
                			<input type="phone" class="form-control" name ="Phone"  placeholder="Phone Number">
            			</div>
            	
            			<br>
            	
            			<div class="form-staff clearfix">
              				<button type="submit" name="add_staff" class="btn btn-primary">Add Staff Member</button>
            			</div>
        			
        			</form>
        		</div>

      		</div>

    	</div>
	</div>
</div>

<?php include_once('layouts/footer.php'); ?>