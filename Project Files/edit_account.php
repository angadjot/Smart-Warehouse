<?php
  	$page_title = 'Edit Account';
  	require_once('includes/load.php');
   	page_require_level(3);?>

<?php

  	if(isset($_POST['submit'])) {
  	
  	$photo = new Media();
  	$staffID = (int)$_POST['staffID'];
  	$photo->upload($_FILES['file_upload']);
  
  		if($photo->process_user($staffID)){
    		$session->msg('s','Photo has been Uploaded.');
    		redirect('edit_account.php');
    	} 
    	else{
      		$session->msg('d',join($photo->errors));
      		redirect('edit_account.php');
    	}
  	}
?>

<?php

  	if(isset($_POST['update'])){
    	
    	$req_fields = array('fname','username' );
    	validate_fields($req_fields);
    
    	if(empty($errors)){
        	
        	$staffID = (int)$_SESSION['staffID'];
           	$fname = remove_junk($db->escape($_POST['fname']));
       		$username = remove_junk($db->escape($_POST['username']));
            
            $sql = "UPDATE Staff SET fname ='{$fname}', username ='{$username}' WHERE staffID='{$staffID}'";
    		$result = $db->query($sql);
          
          	if($result && $db->affected_rows() === 1){
            	$session->msg('s',"Acount updated ");
            	redirect('edit_account.php', false);
          	} 
          	else {
            	$session->msg('d',' Sorry failed to updated!');
            	redirect('edit_account.php', false);
          	}
    	} 
    	else {
      		$session->msg("d", $errors);
      		redirect('edit_account.php',false);
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
          
          		<div class="panel-heading clearfix">
            		<span class="glyphicon glyphicon-camera"></span>
            		<span>Change My photo</span>
          		</div>
        	</div>
        
        	<div class="panel-body">
          
          		<div class="row">
            		<div class="col-md-4">
                		<img class="img-circle img-size-2" src="uploads/staff/<?php echo $staff['image'];?>" alt="">
            		</div>
            
            		<div class="col-md-8">
              			<form class="form" action="edit_account.php" method="POST" enctype="multipart/form-data">
              				
              				<div class="form-group">
                				<input type="file" name="file_upload" multiple="multiple" class="btn btn-default btn-file"/>
              				</div>
              
              				<div class="form-group">
                				<input type="hidden" name="staffID" value="<?php echo $staff['staffID'];?>">
                 				<button type="submit" name="submit" class="btn btn-warning">Change</button>
              				</div>
             
             			</form>
            		</div>
          	</div>
        
        	</div>
      
      </div>
  	</div>
  
  	<div class="col-md-6">
    	
    	<div class="panel panel-default">
      		
      		<div class="panel-heading clearfix">
        		<span class="glyphicon glyphicon-edit"></span>
        		<span>Edit My Account</span>
      		</div>
      
      		<div class="panel-body">
          		<form method="post" action="edit_account.php?staffID=<?php echo (int)$staff['staffID'];?>" class="clearfix">
            		
            		<div class="form-group">
                	  <label for="fname" class="control-label">First Name</label>
                	  <input type="fname" class="form-control" name="fname" value="<?php echo remove_junk(ucwords($staff['fname'])); ?>">
            		</div>
            
            		<div class="form-group">
                  		<label for="username" class="control-label">Username</label>
                  		<input type="text" class="form-control" name="username" value="<?php echo remove_junk(ucwords($staff['username'])); ?>">
            		</div>
            
            		<div class="form-group clearfix">
                    	<a href="change_password.php" title="change password" class="btn btn-danger pull-right">Change Password</a>
                    	<button type="submit" name="update" class="btn btn-info">Update</button>
            		</div>
        		
        		</form>
      </div>
    	
    	</div>
  
  	</div>

</div>


<?php include_once('layouts/footer.php'); ?>
