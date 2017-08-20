<?php
	$page_title = 'Add Product';
  	require_once('includes/load.php');
  	page_require_level(3);  	$all_categories = find_all('Categories');
  	$all_suppliers = find_all('Supplier');
?>

<?php
	if(isset($_POST['add_product'])){
   
   		$req_fields = array('productID','Pname','uInStock','uPrice','USP','qPerUnit','uSize','uWeight','uInOrder','Discount','Supplier_supplierID','Category_catID' );
   		validate_fields($req_fields);
   
   		if(empty($errors)){
     
     		$productID  = remove_junk($db->escape($_POST['productID']));
     		$Pname   	 = remove_junk($db->escape($_POST['Pname']));
     		$uInStock   = remove_junk($db->escape($_POST['uInStock']));
     		$uPrice   	 = remove_junk($db->escape($_POST['uPrice']));
     		$USP  		 = remove_junk($db->escape($_POST['USP']));
     		$qPerUnit   = remove_junk($db->escape($_POST['qPerUnit']));
     		$uSize   = remove_junk($db->escape($_POST['uSize']));
     		$uWeight   = remove_junk($db->escape($_POST['uWeight']));
     		$uInOrder   = remove_junk($db->escape($_POST['uInOrder']));
     		$Discount   = remove_junk($db->escape($_POST['Discount']));
	 		$Supplier_supplierID   = remove_junk($db->escape($_POST['Supplier_supplierID']));
	 		$Category_catID   = remove_junk($db->escape($_POST['Category_catID']));
     
     		$query  = "INSERT INTO Product (";
     		$query .=" productID,Pname,uInStock,uPrice,USP,qPerUnit,uSize,uWeight,uInOrder,Discount,Supplier_supplierID,Category_catID";
     		$query .=") VALUES (";
     		$query .=" '{$productID}','{$Pname}','{$uInStock}','{$uPrice}','{$USP}','{$qPerUnit}','{$uSize}','{$uWeight}','{$uInOrder}','{$Discount}','{$Supplier_supplierID}','{$Category_catID}'";
     		$query .=")";
     		$query .=" ON DUPLICATE KEY UPDATE Pname='{$Pname}'";
     
     		if($db->query($query)){
       			$session->msg('s',"Product Added ");
       			redirect('add_product.php', false);
     		} 
     		
     		else {
       			$session->msg('d',' Sorry failed to Add!');
       			redirect('product.php', false);
     		}

   		}
   		 
   		else{
     		$session->msg("d", $errors);
     		redirect('add_product.php',false);
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
            		<span>Add New Product</span>
         		</strong>
        	</div>
        	
        	<div class="panel-body">
         		
         		<div class="col-md-12">
          			<form method="post" action="add_product.php" class="clearfix">
          			
          			<div class="form-group">
                		<div class="input-group">
                  			<span class="input-group-addon">
                   				<i class="glyphicon glyphicon-th-large"></i>
                  			</span>
                  			<input type="text" class="form-control" name="productID" placeholder="Product ID">
               			</div>
              		</div>
              
              		<div class="form-group">
                		<div class="input-group">
                  			<span class="input-group-addon">
                   				<i class="glyphicon glyphicon-th-large"></i>
                  			</span>
                  			<input type="text" class="form-control" name="Pname" placeholder="Product Title">
               			</div>
              		</div>
              
              		<div class="form-group">
               			<div class="row">
                 			
                 			<div class="col-md-6">	
                   				<div class="input-group">
                     				<span class="input-group-addon">
                     					 <i class="glyphicon glyphicon-shopping-cart"></i>
                     				</span>
                     				<input type="number" class="form-control" name="uInStock" placeholder="Product Units In Stock">
                  				</div>
                 			</div>
                 
                 			<div class="col-md-6">
                   				<div class="input-group">
                     				<span class="input-group-addon">
                      					<i class="glyphicon glyphicon-shopping-cart"></i>
                     				</span>
                     				<input type="number" class="form-control" name="qPerUnit" placeholder="Quantity Per Units">
                  				</div>
                			 </div>
                 
                 		</div>
                 	</div>
                 
            		<div class="form-group">
               			<div class="row">
                 
                 			<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon">
                       					<i class="glyphicon glyphicon-usd"></i>
                     				</span>
                     				<input type="number" class="form-control" name="uPrice" placeholder="Unit Buying Price">
                     				<span class="input-group-addon">.00</span>
                  				</div>
                 			</div>
                 			
                  			<div class="col-md-6">
                    			<div class="input-group">
                      				<span class="input-group-addon">
                        				<i class="glyphicon glyphicon-usd"></i>
                      				</span>
                     		 		<input type="number" class="form-control" name="USP" placeholder="Unit Selling Price">
                      				<span class="input-group-addon">.00</span>
                   				</div>
                  			</div>
                  			
               			</div>
              		</div>
                 
            		<div class="form-group">
               			<div class="row">
                 	
                 			<div class="col-md-4">
                   				<div class="input-group">
                     				<span class="input-group-addon">
                      					 <i class="glyphicon glyphicon-briefcase"></i>
                     				</span>
                     				<input type="text" class="form-control" name="uSize" placeholder="Unit Size (S,M,L)">
                  				</div>
                 			</div>
                 
                 			<div class="col-md-4">
                   				<div class="input-group">
                     				<span class="input-group-addon">
                       					<i class="glyphicon glyphicon-scale"></i>
                     				</span>
                     				<input type="number" class="form-control" name="uWeight" placeholder="Unit Weight (in Kgs)">
                  				</div>
                 			</div>
                 			
                 			<div class="col-md-4">
                   				<div class="input-group">
                     				<span class="input-group-addon">
                       					<i class="glyphicon glyphicon-shopping-cart"></i>
                     				</span>
                     				<input type="number" class="form-control" name="uInOrder" placeholder="Units In Order">
                  				</div>
                 			</div>
                 
                 		</div>
                 	 </div>
                 
              		<div class="form-group">
                		<div class="row">
                  
                  			<div class="col-md-6">
                    			<select class="form-control" name="Category_catID">
                      				<option value="">Select Product Category</option>
                    					<?php  foreach ($all_categories as $cat): ?>
                      				<option value="<?php echo (int)$cat['catID'] ?>"><?php echo $cat['catName'] ?></option>
                    					<?php endforeach; ?>
                    			</select>
                  			</div>
                  
                  			<div class="col-md-6">
                    			<select class="form-control" name="Supplier_supplierID">
                      				<option value="">Select Supplier</option>
                    					<?php  foreach ($all_suppliers as $a_supplier): ?>
                      				<option value="<?php echo (int)$a_supplier['supplierID'] ?>">
                        				<?php echo remove_junk(ucwords($a_supplier['title'].' '.$a_supplier['fname'].' '.$a_supplier['lname']))?></option>
                    				<?php endforeach; ?>
                    			</select>
                  			</div>
                  
                		</div>
              		</div>

                 
              		<button type="submit" name="add_product" class="btn btn-danger">Add product</button>
          		</form>
         		</div>
        
        	</div>
      	</div>
    
    </div>
  
</div>

<?php include_once('layouts/footer.php'); ?>
