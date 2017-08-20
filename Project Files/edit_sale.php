<?php
  	$page_title = 'Edit sale';
  	require_once('includes/load.php');
   	page_require_level(3);?>

<?php
	$sale = find_by_orderID('Orders',(int)$_GET['orderID']);
	
	if(!$sale){
  		$session->msg("d","Missing Order ID.");
  		redirect('sales.php');
	}
?>

<?php 
	$all_products = find_all('Product'); 
	$all_customers = find_all('Customer');
?>

<?php

  	if(isset($_POST['update_sale'])){
    	
    	$req_fields = array('Product_productID','Customer_custID','ordQuant','total','ordDate','deliDate' );
    	validate_fields($req_fields);
    	
        	if(empty($errors)){
          		
          		$Product_productID 	= remove_junk($db->escape($_POST['Product_productID']));
          		$Customer_custID 	= remove_junk($db->escape($_POST['Customer_custID']));
          		$ordQuant     		= remove_junk($db->escape($_POST['ordQuant']));
          		$total   			= remove_junk($db->escape($_POST['total']));
          		$ordDate      		= remove_junk($db->escape($_POST['ordDate']));
          		$deliDate      		= remove_junk($db->escape($_POST['deliDate']));
          		

          		$query  = "UPDATE Orders SET";
          		$query .= " Product_productID ='{$Product_productID}',Customer_custID ='{$Customer_custID }',";
          		$query .= " ordQuant ='{$ordQuant}',total ='{$total}',ordDate ='{$ordDate}',deliDate ='{$deliDate}'";
          		$query .= " WHERE orderID ='{$sale['orderID']}'";
          		$result = $db->query($query);
          
          		if($result && $db->affected_rows() === 1){
                    update_product_qty($ordQuant,$Product_productID);
                    $session->msg('s',"Sale updated.");
                    redirect('edit_sale.php?orderID='.$sale['orderID'], false);
                } 
                else {
                    $session->msg('d',' Sorry Failed to Update!');
                    redirect('sales.php', false);
                }
        	} 
        	else {
           		$session->msg("d", $errors);
           		redirect('edit_sale.php?orderID='.(int)$sale['orderID'],false);
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
            		<span>Edit Sales</span>
         		</strong>
         		
         		<div class="pull-right">
       				<a href="sales.php" class="btn btn-primary">Show All Sales</a>
     			</div>
     			
        	</div>
        
        	<div class="panel-body">
        
         		<div class="col-md-12">
           			<form method="post" action="edit_sale.php?orderID=<?php echo (int)$sale['orderID']; ?>">
              			
              			<div class="form-group">
                			<div class="row">
                  
                  				<div class="col-md-6">
                  					<label for="Product_productID">Product Name</label>
                    				<select class="form-control" name="Product_productID">
                      					<option value="">Select Product Name</option>
                    						<?php  foreach ($all_products as $product): ?>
                      					<option value="<?php echo (int)$product['productID']; ?>" <?php if($sale['Product_productID'] === $product['productID']): echo "selected"; endif; ?> >
                      					<?php echo $product['Pname'] ?></option>
                    						<?php endforeach; ?>
                    				</select>
                  				</div>
                  
                  				<div class="col-md-6">
                  					<label for="Customer_custID">Customer Name</label>
                    				<select class="form-control" name="Customer_custID">
                      					<option value="">Select Customer</option>
                    						<?php  foreach ($all_customers as $customer): ?>
                      					<option value="<?php echo (int)$customer['custID'] ?>" <?php if($sale['Customer_custID'] === $customer['custID']): echo "selected"; endif; ?> >
                        					<?php echo remove_junk(ucwords($customer['title'].' '.$customer['fname'].' '.$customer['lname']))?></option>
                    					<?php endforeach; ?>
                    				</select>
                  				</div>
                  
                			</div>
              			</div>
              			
              			<div class="form-group">
               				<div class="row">
                 			
                 				<div class="col-md-6">
                 					<label for="ordQuant">Quantity</label>
                   					<div class="input-group">
                     					<span class="input-group-addon">
                     					 	<i class="glyphicon glyphicon-shopping-cart"></i>
                     					</span>
                     					<input type="number" class="form-control" name="ordQuant" value="<?php echo (int)$sale['ordQuant']; ?>">
                  					</div>
                 				</div>
                 
                 				<div class="col-md-6">
                 					<label for="total">Total Price</label>
                   					<div class="input-group">
                     					<span class="input-group-addon">
                      						<i class="glyphicon glyphicon-usd"></i>
                     					</span>
                     					<input type="number" class="form-control" name="total" value="<?php echo remove_junk($sale['total']); ?>">
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
                     					<input type="date" class="form-control" name="ordDate" value="<?php echo remove_junk($sale['ordDate']); ?>">
                  					</div>
                 				</div>
                 			
                  				<div class="col-md-6">
                  					<label for="deliDate">Delivery Date</label>
                    				<div class="input-group">
                      					<span class="input-group-addon">
                        					<i class="glyphicon glyphicon-calendar"></i>
                      					</span>
                     		 			<input type="date" class="form-control" name="deliDate" value="<?php echo remove_junk($sale['deliDate']); ?>">
                   					</div>
                  				</div>
                  			
               				</div>
              			</div>

              			<button type="submit" name="update_sale" class="btn btn-primary">Update sale</button>
          
          			</form>
        	 	</div>
        	
        	</div>
        
        </div>
      
    </div>
  
</div>

<?php include_once('layouts/footer.php'); ?>
