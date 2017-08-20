<?php
  	$page_title = 'Edit Payment';
  	require_once('includes/load.php');
   	page_require_level(3);?>

<?php
	$payment = find_by_billno('Payment',(int)$_GET['billno']);
	
	if(!$payment){
  		$session->msg("d","Missing Bill Number.");
  		redirect('payment.php');
	}
?>

<?php

  	if(isset($_POST['update_payment'])){
    	
    	$req_fields = array('paytype','CrdAmount','DrAmount','payDueDate','CrdDate','DrDate','Order_orderID');
    	validate_fields($req_fields);
    	
        	if(empty($errors)){
          		
          		$paytype 	= remove_junk($db->escape($_POST['paytype']));
          		$CrdAmount  = remove_junk($db->escape($_POST['CrdAmount']));
          		$DrAmount   = remove_junk($db->escape($_POST['DrAmount']));
          		$payDueDate = remove_junk($db->escape($_POST['payDueDate']));
          		$CrdDate    = remove_junk($db->escape($_POST['CrdDate']));
          		$DrDate    = remove_junk($db->escape($_POST['DrDate']));
          		$Order_orderID    = remove_junk($db->escape($_POST['Order_orderID']));

          		$query  = "UPDATE Payment SET";
          		$query .= " paytype ='{$paytype}',CrdAmount ='{$CrdAmount}',DrAmount ='{$DrAmount}'";
          		$query .= " ,payDueDate ='{$payDueDate}',CrdDate ='{$CrdDate}',DrDate ='{$DrDate}',Order_orderID ='{$Order_orderID}'";
          		$query .= " WHERE billno ='{$payment['billno']}'";
          		$result = $db->query($query);
          
          		if($result && $db->affected_rows() === 1){
                    $session->msg('s',"Sale updated.");
                    redirect('edit_payment.php?billno='.$payment['billno'], false);
                } 
                else {
                    $session->msg('d',' Sorry Failed to Update!');
                    redirect('payment.php', false);
                }
        	} 
        	else {
           		$session->msg("d", $errors);
           		redirect('edit_payment.php?billno='.(int)$payment['billno'],false);
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
            		<span>Edit Payment</span>
         		</strong>
         		
         		<div class="pull-right">
       				<a href="payment.php" class="btn btn-primary">Show All Payment</a>
     			</div>
     			
        	</div>
        
        	<div class="panel-body">
        
         		<div class="col-md-12">
           			<form method="post" action="edit_payment.php?billno=<?php echo (int)$payment['billno']; ?>">
              			
              			<div class="form-group">
                			<div class="row">
                  				
                  				<div class="col-md-6">
                 					<label for="Order_orderID">Order ID</label>
                   					<div class="input-group">
                     					<span class="input-group-addon">
                     					 	<i class="glyphicon glyphicon-th-large"></i>
                     					</span>
                     					<input type="text" class="form-control" name="Order_orderID" value="<?php echo $payment['Order_orderID']; ?>">
                  					</div>
                 				</div>
                  				
                  				<div class="col-md-6">
                 					<label for="paytype">Payment Type</label>
                   					<div class="input-group">
                     					<span class="input-group-addon">
                     					 	<i class="glyphicon glyphicon-th-large"></i>
                     					</span>
                     					<input type="text" class="form-control" name="paytype" value="<?php echo $payment['paytype']; ?>">
                  					</div>
                 				</div>
                 				
                 			</div>
                 		</div>
              			
              			<div class="form-group">
               				<div class="row">
                 			
                 				<div class="col-md-6">
                 					<label for="CrdAmount">Credit Amount</label>
                   					<div class="input-group">
                     					<span class="input-group-addon">
                     					 	<i class="glyphicon glyphicon-usd"></i>
                     					</span>
                     					<input type="number" class="form-control" name="CrdAmount" value="<?php echo (int)$payment['CrdAmount']; ?>">
                  					</div>
                 				</div>
                 
                 				<div class="col-md-6">
                 					<label for="DrAmount">Debit Amount</label>
                   					<div class="input-group">
                     					<span class="input-group-addon">
                      						<i class="glyphicon glyphicon-usd"></i>
                     					</span>
                     					<input type="number" class="form-control" name="DrAmount" value="<?php echo remove_junk($payment['DrAmount']); ?>">
                  					</div>
                			 	</div>
                 
                 			</div>
                 		</div>
              			
              			<div class="form-group">
               				<div class="row">
                 
                 				<div class="col-md-4">
                 					<label for="payDueDate">Payment Due Date</label>
									<div class="input-group">
										<span class="input-group-addon">
                       						<i class="glyphicon glyphicon-calendar"></i>
                     					</span>
                     					<input type="date" class="form-control" name="payDueDate" value="<?php echo remove_junk($payment['payDueDate']); ?>">
                  					</div>
                 				</div>
                 			
                  				<div class="col-md-4">
                  					<label for="CrdDate">Credit Date</label>
                    				<div class="input-group">
                      					<span class="input-group-addon">
                        					<i class="glyphicon glyphicon-calendar"></i>
                      					</span>
                     		 			<input type="date" class="form-control" name="CrdDate" value="<?php echo remove_junk($payment['CrdDate']); ?>">
                   					</div>
                  				</div>
                  			
                  			<div class="col-md-4">
                  					<label for="DrDate">Debit Date</label>
                    				<div class="input-group">
                      					<span class="input-group-addon">
                        					<i class="glyphicon glyphicon-calendar"></i>
                      					</span>
                     		 			<input type="date" class="form-control" name="DrDate" value="<?php echo remove_junk($payment['DrDate']); ?>">
                   					</div>
                  				</div>
                  			
               				</div>
              			</div>

              			<button type="submit" name="update_payment" class="btn btn-primary">Update payment</button>
          
          			</form>
        	 	</div>
        	
        	</div>
        
        </div>
      
    </div>
  
</div>

<?php include_once('layouts/footer.php'); ?>
