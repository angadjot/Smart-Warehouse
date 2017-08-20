<?php
	$page_title = 'Edit product';
  	require_once('includes/load.php');
   	page_require_level(3);?>

<?php
	$product = find_by_productID('Product',(int)$_GET['productID']);
	$all_categories = find_all('Categories');
	$all_suppliers = find_all('Supplier');

	if(!$product){
  		$session->msg("d","Missing Product ID.");
  		redirect('product.php');
	}
	
?>

<?php
 	if(isset($_POST['Product'])){
 	
    	$req_fields = array('productID','Pname','uInStock','uPrice','USP','qPerUnit','uSize','uWeight','uInOrder','Supplier_supplierID','Category_catID' );
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
	 		$Supplier_supplierID   = remove_junk($db->escape($_POST['Supplier_supplierID']));
	 		$Category_catID   = remove_junk($db->escape($_POST['Category_catID']));
     
       		$query   = "UPDATE Product SET";
       		$query  .=" productID ='{$productID}',Pname ='{$Pname}',uInStock ='{$uInStock}',";
       		$query  .=" uPrice ='{$uPrice}',USP ='{$USP}',qPerUnit ='{$qPerUnit}',uSize ='{$uSize}',";
       		$query  .=" uWeight ='{$uWeight}',uInOrder ='{$uInOrder}',";
       		$query  .=" Supplier_supplierID ='{$Supplier_supplierID}',Category_catID ='{$Category_catID}'";
       		$query  .=" WHERE productID  ='{$product['productID']}'";
       
       		$result = $db->query($query);
               
               if($result && $db->affected_rows() === 1){
            		$session->msg('s',"Product Updated ");
                 	redirect('product.php', false);
               } 
               
               else {
                 	$session->msg('d',' Sorry failed to Update!');
                 	redirect('edit_product.php?productID='.$product['productID'], false);
               }

   		} 
   		else{
       		$session->msg("d", $errors);
       		redirect('edit_product.php?productID='.$product['productID'], false);
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
            		<span>Edit Product</span>
         		</strong>
        	</div>
        
        	<div class="panel-body">
        
         		<div class="col-md-12">
           			<form method="post" action="edit_product.php?productID=<?php echo (int)$product['productID'] ?>">
              			
              			<div class="form-group">
              				<label for="productID">Product ID</label>
                			<div class="input-group">
                  				<span class="input-group-addon">
                   					<i class="glyphicon glyphicon-th-large"></i>
                  				</span>
                  				<input type="text" class="form-control" name="productID" value="<?php echo remove_junk($product['productID']);?>">
               				</div>
              			</div>
              		
              			<div class="form-group">
              				<label for="Pname">Product Name</label>
                			<div class="input-group">
                  				<span class="input-group-addon">
                   					<i class="glyphicon glyphicon-th-large"></i>
                  				</span>
                  				<input type="text" class="form-control" name="Pname" value="<?php echo remove_junk($product['Pname']);?>">
               				</div>
              			</div>
              			
              			<div class="form-group">
               				<div class="row">
                 			
                 				<div class="col-md-6">
                 					<label for="uInStock">Product Units In Stock</label>
                   					<div class="input-group">
                     					<span class="input-group-addon">
                     					 	<i class="glyphicon glyphicon-shopping-cart"></i>
                     					</span>
                     					<input type="number" class="form-control" name="uInStock" value="<?php echo remove_junk($product['uInStock']);?>">
                  					</div>
                 				</div>
                 
                 				<div class="col-md-6">
                 					<label for="qPerUnit">Quantity Per Units</label>
                   					<div class="input-group">
                     					<span class="input-group-addon">
                      						<i class="glyphicon glyphicon-shopping-cart"></i>
                     					</span>
                     					<input type="number" class="form-control" name="qPerUnit" value="<?php echo remove_junk($product['qPerUnit']);?>">
                  					</div>
                			 	</div>
                 
                 			</div>
                 		</div>
              			
              			<div class="form-group">
               				<div class="row">
                 
                 				<div class="col-md-6">
                 					<label for="uPrice">Unit Buying Price</label>
									<div class="input-group">
										<span class="input-group-addon">
                       						<i class="glyphicon glyphicon-usd"></i>
                     					</span>
                     					<input type="text" class="form-control" name="uPrice" value="<?php echo $product['uPrice'];?>">
                     					<span class="input-group-addon">.00</span>
                  					</div>
                 				</div>
                 			
                  				<div class="col-md-6">
                  					<label for="USP">Unit Selling Price</label>
                    				<div class="input-group">
                      					<span class="input-group-addon">
                        					<i class="glyphicon glyphicon-usd"></i>
                      					</span>
                     		 			<input type="text" class="form-control" name="USP" value="<?php $product['USP'];?>">
                      					<span class="input-group-addon">.00</span>
                   					</div>
                  				</div>
                  			
               				</div>
              			</div>
              			
              			<div class="form-group">
               				<div class="row">
                 				
                 				<div class="col-md-4">
                 					<label for="uSize">Unit Size</label>
                   					<div class="input-group">
                     					<span class="input-group-addon">
                      						 <i class="glyphicon glyphicon-briefcase"></i>
                     					</span>
                     					<input type="text" class="form-control" name="uSize" value="<?php echo $product['uSize'];?>">
                  					</div>
                 				</div>
                 
                 				<div class="col-md-4">
                 					<label for="uWeight">Unit Weight (in Kgs)</label>
                   					<div class="input-group">
                     					<span class="input-group-addon">
                       						<i class="glyphicon glyphicon-scale"></i>
                     					</span>
                     					<input type="number" class="form-control" name="uWeight" value="<?php echo remove_junk($product['uWeight']);?>">
                  					</div>
                 				</div>
                 			
                 				<div class="col-md-4">
                 					<label for="uInOrder">Units In Order</label>
                   					<div class="input-group">
                     					<span class="input-group-addon">
                       						<i class="glyphicon glyphicon-shopping-cart"></i>
                     					</span>
                     					<input type="number" class="form-control" name="uInOrder" value="<?php echo remove_junk($product['uInOrder']);?>">
                  					</div>
                 				</div>
                 
                 			</div>
                 	 	</div>
              			
              			<div class="form-group">
                			<div class="row">
                  
                  				<div class="col-md-6">
                  					<label for="Category_catID">Category Name</label>
                    				<select class="form-control" name="Category_catID">
                      					<option value="">Select Product Category</option>
                    						<?php  foreach ($all_categories as $cat): ?>
                      					<option value="<?php echo (int)$cat['catID']; ?>" <?php if($product['Category_catID'] === $cat['catID']): echo "selected"; endif; ?> >
                      					<?php echo $cat['catName'] ?></option>
                    						<?php endforeach; ?>
                    				</select>
                  				</div>
                  
                  				<div class="col-md-6">
                  					<label for="Supplier_supplierID">Supplier Name</label>
                    				<select class="form-control" name="Supplier_supplierID">
                      					<option value="">Select Supplier</option>
                    						<?php  foreach ($all_suppliers as $a_supplier): ?>
                      					<option value="<?php echo (int)$a_supplier['supplierID'] ?>" <?php if($product['Supplier_supplierID'] === $a_supplier['supplierID']): echo "selected"; endif; ?> >
                        					<?php echo remove_junk(ucwords($a_supplier['title'].' '.$a_supplier['fname'].' '.$a_supplier['lname']))?></option>
                    					<?php endforeach; ?>
                    				</select>
                  				</div>
                  
                			</div>
              			</div>

              			<button type="submit" name="Product" class="btn btn-danger">Update</button>
          
          			</form>
        	 	</div>
        	
        	</div>
        
        </div>
      
    </div>
  
</div>

<?php include_once('layouts/footer.php'); ?>