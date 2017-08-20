<?php
  	$page_title = 'Add Payment';
  	require_once('includes/load.php');
   	page_require_level(3);?>

<?php
	$all_orders = find_all('Orders');
?>

<?php

  	if(isset($_POST['add_payment'])){
    	
    	$req_fields = array('billno','paytype','CrdAmount','DrAmount','payDueDate','CrdDate','DrDate','Order_orderID');
    	validate_fields($req_fields);
        
        	if(empty($errors)){
          		
          		$billno     	  = $db->escape((int)$_POST['billno']);
          		$paytype 		  = remove_junk($db->escape($_POST['paytype']));
          		$CrdAmount  	  = remove_junk($db->escape($_POST['CrdAmount']));
          		$DrAmount   	  = remove_junk($db->escape($_POST['DrAmount']));
          		$payDueDate 	  = remove_junk($db->escape($_POST['payDueDate']));
          		$CrdDate    	  = remove_junk($db->escape($_POST['CrdDate']));
          		$DrDate     	  = remove_junk($db->escape($_POST['DrDate']));
          		$Order_orderID    = remove_junk($db->escape($_POST['Order_orderID']));

          		$sql  = "INSERT INTO Payment (";
          		$sql .= " billno,paytype,CrdAmount,DrAmount,payDueDate,CrdDate,DrDate,Order_orderID";
          		$sql .= ") VALUES (";
          		$sql .= " '{$billno}','{$paytype}','{$CrdAmount}','{$DrAmount}','{$payDueDate}','{$CrdDate}','{$DrDate}','{$Order_orderID}'";
          		$sql .= ")";

                if($db->query($sql)){
                  	
                  	$session->msg('s',"Payment Detail Added. ");
                  	redirect('add_payment.php', false);
                } 
                else {
                  	$session->msg('d',' Sorry Failed to add!');
                  	redirect('add_payment.php', false);
                }
        	} 
        	else {
           		$session->msg("d", $errors);
           		redirect('add_payment.php',false);
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
            		<span>Add New Payment</span>
         		</strong>
        	</div>
        	
        	<div class="panel-body">
         		
         		<div class="col-md-12">
          			<form method="post" action="add_payment.php" class="clearfix">
          			
              		<div class="form-group">
                		<div class="row">
                  
                  			<div class="col-md-6">
                  				<label for="billno">Bill Number</label>
                				<div class="input-group">
                  					<span class="input-group-addon">
                   						<i class="glyphicon glyphicon-th-large"></i>
                  					</span>
                  					<input type="text" class="form-control" name="billno" placeholder="Bill Number">
               					</div>
              				</div>
                  
                  			<div class="col-md-6">
                  				<label for="Order_orderID">Order ID</label>
                    			<select class="form-control" name="Order_orderID">
                      				<option value="">Select Order ID</option>
                    				<?php  foreach ($all_orders as $order): ?>
                      					<option value="<?php echo $order['orderID'] ?>">
                        					<?php echo $order['orderID'] ?>
                        				</option>
                    				<?php endforeach; ?>
                    			</select>
                  			</div>
                  
                		</div>
              		</div>
              		
              		<div class="form-group">
              			<div class="row">
                 			
                 			<div class="col-md-6">
                 				<label for="paytype">Payment Type</label>	
                   				<div class="input-group">
                     				<span class="input-group-addon">
                     					 <i class="glyphicon glyphicon-th-large"></i>
                     				</span>
                     				<input type="text" class="form-control" name="paytype" placeholder="Payment Type">
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
                     					<input type="number" class="form-control" name="CrdAmount" placeholder="Credit Amount">
                  					</div>
                 				</div>
                 
                 				<div class="col-md-6">
                 					<label for="DrAmount">Debit Amount</label>
                   					<div class="input-group">
                     					<span class="input-group-addon">
                      						<i class="glyphicon glyphicon-usd"></i>
                     					</span>
                     					<input type="number" class="form-control" name="DrAmount" placeholder="Debit Amount">
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
                  					<input type="date" class="form-control" name="payDueDate" placeholder="DD-MM-YYYY">
              					</div>
             				</div>
                 			
                  			<div class="col-md-4">
                  				<label for="CrdDate">Credit Date</label>
                				<div class="input-group">
                  					<span class="input-group-addon">
                    					<i class="glyphicon glyphicon-calendar"></i>
                  					</span>
                 		 			<input type="date" class="form-control" name="CrdDate" placeholder="DD-MM-YYYY">                   					</div>
                  				</div>
                  			
                  			<div class="col-md-4">
                  					<label for="DrDate">Debit Date</label>
                    				<div class="input-group">
                      					<span class="input-group-addon">
                        					<i class="glyphicon glyphicon-calendar"></i>
                      					</span>
                     		 			<input type="date" class="form-control" name="DrDate" placeholder="DD-MM-YYYY">
                   					</div>
                  				</div>
                  			
               			</div>
              		</div>
              		
              		<button type="submit" name="add_sale" class="btn btn-danger">Add Sale</button>
          		
          			</form>
         		</div>
        
        	</div>
      	
      	</div>
    
    </div>
  
</div>

<?php include_once('layouts/footer.php'); ?>
