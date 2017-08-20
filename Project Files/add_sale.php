<?php
  	$page_title = 'Add Sale';
  	require_once('includes/load.php');
   	page_require_level(3);?>

<?php 
	$all_products = find_all('Product'); 
	$all_customers = find_all('Customer');
?>

<?php

  	if(isset($_POST['add_sale'])){
    	
    	$req_fields = array('orderID','ordQuant','total','ordDate','deliDate','Product_productID','Customer_custID' );
    	validate_fields($req_fields);
        
        	if(empty($errors)){
          		
          		$orderID   = $db->escape((int)$_POST['orderID']);
          		$productID = $db->escape((int)$_POST['Product_productID']);
          		$custID	   = $db->escape((int)$_POST['Customer_custID']);
          		$ordQuant  = $db->escape((int)$_POST['ordQuant']);
          		$total     = $db->escape($_POST['total']);
          		$ordDate      = $db->escape($_POST['ordDate']);
          		$deliDate      = $db->escape($_POST['deliDate']);

          		$sql  = "INSERT INTO Orders (";
          		$sql .= " orderID,ordQuant,total,ordDate,deliDate,Product_productID,Customer_custID";
          		$sql .= ") VALUES (";
          		$sql .= " '{$orderID}','{$ordQuant}','{$total}','{$ordDate}','{$deliDate}','{$productID}','{$custID}'";
          		$sql .= ")";

                if($db->query($sql)){
                  	
                  	update_product_qty($ordQuant,$productID);
                  	$session->msg('s',"Sale added. ");
                  	redirect('add_sale.php', false);
                } 
                else {
                  	$session->msg('d',' Sorry failed to add!');
                  	redirect('add_sale.php', false);
                }
        	} 
        	else {
           		$session->msg("d", $errors);
           		redirect('add_sale.php',false);
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
            		<span>Add New Sale</span>
         		</strong>
        	</div>
        	
        	<div class="panel-body">
         		
         		<div class="col-md-12">
          			<form method="post" action="add_sale.php" class="clearfix">
          			
          			<div class="form-group">
          				<label for="orderID">Order ID</label>
                		<div class="input-group">
                  			<span class="input-group-addon">
                   				<i class="glyphicon glyphicon-th-large"></i>
                  			</span>
                  			<input type="text" class="form-control" name="orderID" placeholder="Order ID">
               			</div>
              		</div>
              		
              		<div class="form-group">
                		<div class="row">
                  
                  			<div class="col-md-6">
                  				<label for="Product_productID">Product Name</label>
                    			<select class="form-control" name="Product_productID">
                      				<option value="">Select Product Name</option>
                    					<?php  foreach ($all_products as $product): ?>
                      				<option value="<?php echo (int)$product['productID'] ?>"><?php echo $product['Pname'] ?></option>
                    					<?php endforeach; ?>
                    			</select>
                  			</div>
                  
                  			<div class="col-md-6">
                  				<label for="Customer_custID">Customer Name</label>
                    			<select class="form-control" name="Customer_custID">
                      				<option value="">Select Customer Name</option>
                    					<?php  foreach ($all_customers as $customer): ?>
                      				<option value="<?php echo (int)$customer['custID'] ?>">
                        				<?php echo remove_junk(ucwords($customer['title'].' '.$customer['fname'].' '.$customer['lname']))?></option>
                    				<?php endforeach; ?>
                    			</select>
                  			</div>
                  
                		</div>
              		</div>
              
              		<div class="form-group">
               			<div class="row">
                 			
                 			<div class="col-md-6">
                 				<label for="ordQuant">Order Quantity</label>	
                   				<div class="input-group">
                     				<span class="input-group-addon">
                     					 <i class="glyphicon glyphicon-shopping-cart"></i>
                     				</span>
                     				<input type="number" class="form-control" name="ordQuant" placeholder="Order Quantity">
                  				</div>
                 			</div>
                 			
                 			<div class="col-md-6">
                 				<label for="total">Total Price</label>	
                   				<div class="input-group">
                     				<span class="input-group-addon">
                     					 <i class="glyphicon glyphicon-usd"></i>
                     				</span>
                     				<input type="number" class="form-control" name="total" placeholder="Total Price">
                  				</div>
                 			</div>
                 		
                 		</div>
                 	</div>
                 
            		<div class="form-group">
               			<div class="row">
                 
                 			<div class="col-md-6">
                 				<label for="ordDate">Order Date</label>
                   				<div class="input-group">
                     				<span class="input-group-addon">
                      					<i class="glyphicon glyphicon-calendar"></i>
                     				</span>
                     				<input type="date" class="form-control" name="ordDate" placeholder="DD-MM-YYYY">
                  				</div>
                			 </div>
                 			
                  			<div class="col-md-6">
                 				<label for="deliDate">Delivery Date</label>
                   				<div class="input-group">
                     				<span class="input-group-addon">
                      					<i class="glyphicon glyphicon-calendar"></i>
                     				</span>
                     				<input type="date" class="form-control" name="deliDate" placeholder="DD-MM-YYYY">
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
