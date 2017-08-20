<?php
  	$page_title = 'All Payment';
  	require_once('includes/load.php');
   	page_require_level(3);?>

<?php
	$payments = find_all_payment();
	$all_customers = find_all('Customer');
?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
  	<div class="col-md-6">
    	<?php echo display_msg($msg); ?>
  	</div>
</div>

<div class="row">
	<div class="col-md-12">
      
		<div class="panel panel-default">
			
			<div class="panel-heading clearfix">
          		
          		<strong>
            		<span class="glyphicon glyphicon-th"></span>
            		<span>All Payment</span>
          		</strong>
          		
          		<div class="pull-right">
            		<a href="add_payment.php" class="btn btn-primary">Add New Payment</a>
          		</div>
          		
        	</div>
        	
        	<div class="panel-body">
          		
          		<table class="table table-bordered table-striped">
            		
            		<thead>
              			<tr>
                			<th class="text-center" style="width: 50px;"> # </th>
                			<th class="text-center" style="width: 5%;"> Order ID </th>
                			<th class="text-center" style="width: 15%;"> Customer Name </th>
                			<th class="text-center" style="width: 10%;"> Payment Type </th>
                			<th class="text-center" style="width: 100px;"> Credit Amount </th>
                			<th class="text-center" style="width: 100px;"> Debit Amount </th>
                			<th class="text-center" style="width: 100px;"> Balance </th>
                			<th class="text-center" style="width: 150px;"> Payment Due Date </th>
                			<th class="text-center" style="width: 150px;"> Credit Date </th>
                			<th class="text-center" style="width: 150px;"> Debit Date </th>
                			<th class="text-center" style="width: 100px;"> Actions </th>
             			</tr>
            		</thead>
           
           			<tbody>
             			<?php foreach ($payments as $payment):?>
             				<tr>
               					<td class="text-center"><?php echo (int)$payment['billno']; ?></td>
               					<td class="text-center"><?php echo remove_junk($payment['Order_orderID']); ?></td>
               					<td>
               						<?php  foreach ($all_customers as $customer): ?>
                      				<?php if($payment['Customer_custID'] === $customer['custID']): echo remove_junk(ucwords($customer['title'].' '.$customer['fname'].' '.$customer['lname'])); endif; ?>
                      				<?php endforeach;?>
                      			</td>
                    			<td class="text-center"><?php echo remove_junk(ucwords($payment['paytype']))?></td>
               					<td class="text-center">₹<?php echo $payment['CrdAmount']; ?></td>
               					<td class="text-center">₹<?php echo $payment['DrAmount']; ?></td>
               					<td class="text-center">₹<?php echo ( $payment['CrdAmount'] - $payment['DrAmount'] ); ?></td>
               					<td class="text-center"><?php echo $payment['payDueDate']; ?></td>
               					<td class="text-center"><?php echo $payment['CrdDate']; ?></td>
               					<td class="text-center"><?php echo $payment['DrDate']; ?></td>
               					<td class="text-center">
                  					<div class="btn-group">
                     					<a href="edit_payment.php?billno=<?php echo (int)$payment['billno'];?>" class="btn btn-warning btn-xs"  title="Edit" data-toggle="tooltip">
                       						<span class="glyphicon glyphicon-edit"></span>
                     					</a>
                     					<a href="delete_payment.php?billno=<?php echo (int)$payment['billno'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                       						<span class="glyphicon glyphicon-trash"></span>
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