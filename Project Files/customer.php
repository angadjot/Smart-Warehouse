<?php
  	$page_title = 'All Customers';
  	require_once('includes/load.php');
?>

<?php

 	page_require_level(3); 	
 	$all_customers = find_all_customer();
 	$all_cust_staff = find_all_customer_registered_by_staff();
?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
   	<div class="col-md-10">
     	<?php echo display_msg($msg); ?>
   	</div>
</div>

<div class="row">
	<div class="col-md-12">
    	
    	<div class="panel panel-default">
      		
      		<div class="panel-heading clearfix">
        		<strong>
          			<span class="glyphicon glyphicon-th"></span>
          			<span>Customers</span>
       			</strong>
         		<a href="add_customer.php" class="btn btn-info pull-right">Add New Customer</a>
      		</div>
     
     		<div class="panel-body">
      
      			<table class="table table-bordered table-striped">
        			<thead>
          				<tr>
            				<th class="text-center;" style="width: 50px;">#</th>
            				<th class="text-center;">Name</th>
            				<th class="text-center;">Address</th>
            				<th class="text-center;">Email</th>
            				<th class="text-center;">Phone No.</th>
            				<th class="text-center;" style="width: 100px;">Actions</th>
          				</tr>
        			</thead>
        
        			<tbody>
        				<?php foreach($all_customers as $a_customer): ?>
          				<tr>
           					<td class="text-center;"><?php echo remove_junk(ucwords($a_customer['custID']))?></td>
           					<td class="text-center;">
           						<?php echo remove_junk(ucwords($a_customer['title'].' '.$a_customer['fname'].' '.$a_customer['lname']))?>
           					</td>
           					<td class="text-center;"><?php echo remove_junk(ucwords($a_customer['address']))?></td>
           					<td class="text-center;"><?php echo remove_junk(ucwords($a_customer['email']))?></td>
           					<td class="text-center;"><?php echo remove_junk(ucwords($a_customer['Phone']))?></td>
           					<td class="text-center;">
             					<div class="btn-group">
                					<a href="edit_customer.php?custID=<?php echo (int)$a_customer['custID'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                  						<i class="glyphicon glyphicon-pencil"></i>
               						</a>
                					<a href="delete_customer.php?custID=<?php echo (int)$a_customer['custID'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
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

<div class="row">
	<div class="col-md-12">
    	
    	<div class="panel panel-default">
      		
      		<div class="panel-heading clearfix">
        		<strong>
          			<span class="glyphicon glyphicon-th"></span>
          			<span>Customers Registered By Staff</span>
       			</strong>
      		</div>
     
     		<div class="panel-body">
      
      			<table class="table table-bordered table-striped">
        			
        			<thead>
          				<tr>
            				<th class="text-center;" style="width: 50px;">#</th>
           					<th class="text-center;">Name</th>
         				  	<th class="text-center;">Relation</th>
            				<th class="text-center;">#Staff ID</th>
            				<th class="text-center;">Name</th>
            				<th class="text-center;">#Role ID</th>
            				<th class="text-center;">Role Name</th>
          				</tr>
        			</thead>
        
        			<tbody>
        				<?php foreach($all_cust_staff as $a_customer): ?>
          				<tr>
           					<td class="text-center;"><?php echo remove_junk(ucwords($a_customer['custID']))?></td>
           					<td  class="text-center;"><?php echo remove_junk(ucwords($a_customer['title'].' '.$a_customer['fname'].' '.$a_customer['lname']))?></td>
           					<td class="text-center;"><?php echo "Registered By" ?></td>
           					<td class="text-center;"><?php echo remove_junk(ucwords($a_customer['staffID']))?></td>
           					<td class="text-center;"><?php echo remove_junk(ucwords($a_customer['title'].' '.$a_customer['fname'].' '.$a_customer['lname']))?></td>
           					<td class="text-center;"><?php echo remove_junk(ucwords($a_customer['roleID']))?></td>
           					<td class="text-center;"><?php echo remove_junk(ucwords($a_customer['roleName']))?></td>
          				</tr>
        				<?php endforeach;?>
       				</tbody>
     
     			</table>
     
     		</div>
    
    	</div>
  
  	</div>
</div>

<?php include_once('layouts/footer.php'); ?>
