<?php
	$page_title = 'All User';
	require_once('includes/load.php');
?>

<?php
	page_require_level(1);
 	$all_users = find_all_staff();
?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
	<div class="col-md-12">
    	<?php echo display_msg($msg); ?>
   	</div>
</div>

<div class="row">
	
	<div class="col-md-12">
		<div class="panel panel-default">
    		
    		<div class="panel-heading clearfix">
        		<strong>
          			<span class="glyphicon glyphicon-th"></span>
          			<span>Staff Members</span>
       			</strong>
         		<a href="add_staff.php" class="btn btn-info pull-right">Add New Staff Member</a>
      		</div>
     
     		<div class="panel-body">
      
      			<table class="table table-bordered table-striped">
        			
        			<thead>
          				
          				<tr>
            				<th class="text-center" style="width: 50px;">#</th>
            				<th class="text-center" style="width: 20%;">Name </th>
            				<th class="text-center" style="width: 10%;">Username</th>
            				<th class="text-center" style="width: 10%;">User Role</th>
            				<th class="text-center" style="width: 50px;">Gender</th>
            				<th class="text-center" style="width: 10%;">Address</th>
            				<th class="text-center" style="width: 10%;">Email</th>
            				<th class="text-center" style="width: 10%;">Date Of Birth</th>
            				<th class="text-center" style="width: 10%;">Phone No.</th>
            				<th class="text-center" style="width: 10%;">Last Login</th>
            				<th class="text-center" style="width: 100px;">Actions</th>
          				</tr>
        
        			</thead>
        		
        		<tbody>
        
        		<?php foreach($all_users as $a_user): ?>
          		
          			<tr>
           				<td class="text-center"><?php echo remove_junk(ucwords($a_user['staffID']))?></td>
           				<td  class="text-center"><?php echo remove_junk(ucwords($a_user['title'].' '.$a_user['fname'].' '.$a_user['lname']))?></td>
           				<td  class="text-center"><?php echo remove_junk(ucwords($a_user['username']))?></td>
           				<td class="text-center"><?php echo remove_junk(ucwords($a_user['roleName']))?></td>
           				<td class="text-center"><?php echo remove_junk(ucwords($a_user['gender']))?></td>
           				<td class="text-center"><?php echo remove_junk(ucwords($a_user['address']))?></td>
           				<td class="text-center"><?php echo remove_junk(ucwords($a_user['email']))?></td>
           				<td class="text-center"><?php echo remove_junk(ucwords($a_user['DOB']))?></td>
           				<td class="text-center"><?php echo remove_junk(ucwords($a_user['Phone']))?></td>
           				<td  class="text-center"><?php echo remove_junk(ucwords($a_user['last_login']))?></td>
           				<td class="text-center">
             				<div class="btn-group">
                				<a href="edit_staff.php?staffID=<?php echo (int)$a_user['staffID'];?>" onclick="return confirm('Are You Sure You Want to Edit??'); " class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                  					<i class="glyphicon glyphicon-pencil"></i>
               					</a>
                				<a href="delete_staff.php?staffID=<?php echo (int)$a_user['staffID'];?>" onclick="return confirm('Are You Sure You Want to Delete??'); " class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                  					<i class="glyphicon glyphicon-remove"></i>
                				</a>
                			</div>
           				</td>
          			</tr>
        		
        		<?php endforeach;?>
       			
       			</tbody>
     
     		</table>
			
			</div>
	
		</div>
	</div>

</div>

<?php include_once('layouts/footer.php'); ?>