<?php
  	$page_title = 'Edit Staff Members';
  	require_once('includes/load.php');
   	page_require_level(1);
?>

<?php
  
  	$e_staff = find_by_staffID('Staff',(int)$_GET['staffID']);
  	$roles  = find_all('Staff');
  
  	if(!$e_staff){
    	$session->msg("d","Missing Staff id.");
    	redirect('staff.php');
  	}
  	$e_staff_phone = find_by_staffID('Staff_Phone',(int)$_GET['staffID']);
  
  	if(!$e_staff_phone){
    	$session->msg("d","Missing Staff ID.");
    	redirect('staff.php');
  	}
?>

<?php

  	if(isset($_POST['update'])) {
    	
    	$req_fields = array('roleID','title','fname','lname','username','roleName','address','email');
    	validate_fields($req_fields);
    	
    	if(empty($errors)){
            
            $id = (int)$e_staff['staffID'];
            $roleID = (int)$db->escape($_POST['roleID']);
            $title = remove_junk($db->escape($_POST['title']));
            $fname = remove_junk($db->escape($_POST['fname']));
            $lname = remove_junk($db->escape($_POST['lname']));
       		$username = remove_junk($db->escape($_POST['username']));
            $roleName = remove_junk($db->escape($_POST['roleName']));
            $address = remove_junk($db->escape($_POST['address']));
            $email = remove_junk($db->escape($_POST['email']));
            
            $sql = "UPDATE Staff SET roleID='{$roleID}',title='{$title}',fname ='{$fname}',lname ='{$lname}'";
            $sql .=",username ='{$username}',roleName='{$roleName}',address='{$address}',email='{$email}'";
            $sql .=" WHERE staffID='{$db->escape($id)}'";
         	$result = $db->query($sql);
          
          	if($result && $db->affected_rows() === 1){
            	$session->msg('s',"Acount Updated ");
            	redirect('edit_staff.php?staffID='.(int)$e_staff['staffID'], false);
          	} 
          	else {
            	$session->msg('d',' Sorry failed to updated!');
            	redirect('edit_staff.php?staffID='.(int)$e_staff['staffID'], false);
          	}
    	} 
    	else {
      		$session->msg("d", $errors);
      		redirect('edit_staff.php?staffID='.(int)$e_staff['staffID'],false);
    	}
  	}
?>

<?php

	if(isset($_POST['update-phone'])) {
  
  		$req_fields = array('Phone');
  		validate_fields($req_fields);
  
  		if(empty($errors)){
        
        	$id = (int)$e_staff['staffID'];
     		$Phone = remove_junk($db->escape($_POST['Phone']));
          
          	$sql = "UPDATE Staff_Phone SET Phone='{$Phone}' WHERE staffID='{$db->escape($id)}'";
       		$result = $db->query($sql);
        	
        	if($result && $db->affected_rows() === 1){
          		$session->msg('s',"Staff Phone Number has been updated ");
          		redirect('edit_staff.php?staffID='.(int)$e_staff['staffID'], false);
        	} 
        	else {
          		$session->msg('d',' Sorry failed to updated Staff Phone Number!');
          		redirect('edit_staff.php?staffID='.(int)$e_staff['staffID'], false);
        	}
  		} 
  		else {
    		$session->msg("d", $errors);
    		redirect('edit_staff.php?staffID='.(int)$e_staff['staffID'],false);
  		}
	}

?>

<?php

	if(isset($_POST['update-pass'])) {
  
  		$req_fields = array('password');
  		validate_fields($req_fields);
  		
  		if(empty($errors)){
           
        	$id = (int)$e_staff['staffID'];
     		$password = remove_junk($db->escape($_POST['password']));
     		$h_pass   = sha1($password);
          
          	$sql = "UPDATE Staff SET password='{$h_pass}' WHERE staffID='{$db->escape($id)}'";
       		$result = $db->query($sql);
        
        	if($result && $db->affected_rows() === 1){
          		$session->msg('s',"Staff Password has been updated ");
          		redirect('edit_staff.php?staffID='.(int)$e_staff['staffID'], false);
        	} 
        	else {
          		$session->msg('d',' Sorry failed to updated Staff Password!');
          		redirect('edit_staff.php?staffID='.(int)$e_staff['staffID'], false);
        	}
  		} 
  		else {
    		$session->msg("d", $errors);
    		redirect('edit_staff.php?staffID='.(int)$e_staff['staffID'],false);
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
          			Update <?php echo remove_junk(ucwords($e_staff['fname'])); ?> Account
        		</strong>
       		</div>
       
       		<div class="panel-body">
          		<form method="post" action="edit_staff.php?staffID=<?php echo (int)$e_staff['staffID'];?>" class="clearfix">
          	
          			<div class="form-group">
                  		<label for="roleID" class="control-label">Role ID</label>
                  		<input type="text" class="form-control" name="roleID" value="<?php echo remove_junk(ucwords($e_staff['roleID'])); ?>">
            		</div>
            
            		<br>
            	
            		<div class="form-group">
                  		<label for="title" class="control-label">Title</label>
                  		<input type="text" class="form-control" name="title" value="<?php echo remove_junk(ucwords($e_staff['title'])); ?>">
            		</div>
            
            		<br>
            
            		<div class="form-group">
                  		<label for="fname" class="control-label">First Name</label>
                  		<input type="text" class="form-control" name="fname" value="<?php echo remove_junk(ucwords($e_staff['fname'])); ?>">
            		</div>
            
            		<br>
            		
            		<div class="form-group">
                  		<label for="lname" class="control-label">Last Name</label>
                  		<input type="text" class="form-control" name="lname" value="<?php echo remove_junk(ucwords($e_staff['lname'])); ?>">
            		</div>
            
            		<br>
            		
            		<div class="form-group">
                  		<label for="username" class="control-label">Username</label>
                  		<input type="text" class="form-control" name="username" value="<?php echo remove_junk(ucwords($e_staff['username'])); ?>">
            		</div>
            
            		<br>
            
            		<div class="form-group">
              			<label for="roleName">Staff Role Name</label>
                		<select class="form-control" name="roleName">
                  			<?php foreach ($roles as $role ):?>
                   				<option <?php if($role['roleID'] === $e_staff['roleID']) echo 'selected="selected"';?> > <?php echo $role['roleName'];?> </option>
                			<?php endforeach;?>
                		</select>
            		</div>
            		
            		<br>
            		
            		<div class="form-group">
                  		<label for="address" class="control-label">Address</label>
                  		<input type="text" class="form-control" name="address" value="<?php echo remove_junk(ucwords($e_staff['address'])); ?>">
            		</div>
            
            		<br>
            		
            		<div class="form-group">
                  		<label for="email" class="control-label">Email ID</label>
                  		<input type="text" class="form-control" name="email" value="<?php echo remove_junk(ucwords($e_staff['email'])); ?>">
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
          			Change <?php echo remove_junk(ucwords($e_staff['fname'])); ?> Phone Number
        		</strong>
      		</div>
      
      		<div class="panel-body">
        		<form action="edit_staff.php?staffID=<?php echo (int)$e_staff['staffID'];?>" method="post" class="clearfix">
          
          			<div class="form-group">
                		<label for="Phone" class="control-label">Phone Number</label>
                		<input type="phone" class="form-control" name="Phone" value="<?php echo remove_junk(ucwords($e_staff_phone['Phone'])); ?>">
          			</div>
          			
          			<br>
          			
          			<div class="form-group clearfix">
                  		<button type="submit" name="update-phone" class="btn btn-danger pull-right">Change</button>
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
          			Change <?php echo remove_junk(ucwords($e_staff['fname'])); ?> Password
        		</strong>
      		</div>
      
      		<div class="panel-body">
        		<form action="edit_staff.php?staffID=<?php echo (int)$e_staff['staffID'];?>" method="post" class="clearfix">
          
          			<div class="form-group">
                		<label for="password" class="control-label">Password</label>
                		<input type="password" class="form-control" name="password" placeholder="Type user new password">
          			</div>
          
          			<br>
          
          			<div class="form-group clearfix">
                  		<button type="submit" name="update-pass" class="btn btn-danger pull-right">Change</button>
          			</div>
        
        		</form>
      		</div>
    
    	</div>
  	</div>

</div>

<?php include_once('layouts/footer.php'); ?>
