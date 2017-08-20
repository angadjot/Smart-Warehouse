<?php
  	$page_title = 'Admin Home Page';
  	require_once('includes/load.php');
   	page_require_level(1);
?>

<?php
	$c_categorie     = count_by_catID('Categories');
 	$c_product       = count_by_productID('Product');
 	$c_sale          = count_by_orderID('Orders');
 	$c_staff         = count_by_staffID('Staff');
 	$c_supplier      = count_by_supplierID('Supplier');
 	$c_customer	  	 = count_by_custID('Customer');
 	$products_sold   = find_higest_saleing_product('10');
 	$recent_products = find_recent_product_added('5');
 	$recent_sales    = find_recent_sale_added('5')
?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
   	<div class="col-md-6">
    	 <?php echo display_msg($msg); ?>
   	</div>
</div>

<div class="row">
	
	<div class="col-md-4">
       
		<div class="panel panel-box clearfix">
         	
         	<div class="panel-icon pull-left bg-green">
          		<i class="glyphicon glyphicon-user"></i>
        	</div>
        
        	<div class="panel-value pull-right">
          		<h2 class="margin-top"> <?php  echo $c_staff['total']; ?> </h2>
          		<p class="text-muted">Staff Members</p>
        	</div>
       
    	</div>
    
    </div>
    
    <div class="col-md-4">
       
		<div class="panel panel-box clearfix">
         	
         	<div class="panel-icon pull-left bg-green">
          		<i class="glyphicon glyphicon-user"></i>
        	</div>
        	
        	<div class="panel-value pull-right">
          		<h2 class="margin-top"> <?php  echo $c_customer['total']; ?> </h2>
          		<p class="text-muted">Customers</p>
        	</div>
       
       	</div>
    
    </div>
    
    <div class="col-md-4">
       <div class="panel panel-box clearfix">
         	
         	<div class="panel-icon pull-left bg-green">
          		<i class="glyphicon glyphicon-user"></i>
        	</div>
        
        	<div class="panel-value pull-right">
          		<h2 class="margin-top"> <?php  echo $c_supplier['total']; ?> </h2>
          		<p class="text-muted">Suppliers</p>
        	</div>
       
       </div>
    </div>
    
    <div class="col-md-4">
		<div class="panel panel-box clearfix">
			
			<div class="panel-icon pull-left bg-red">
          		<i class="glyphicon glyphicon-list"></i>
        	</div>
        	
        	<div class="panel-value pull-right">
          		<h2 class="margin-top"> <?php  echo $c_categorie['total']; ?> </h2>
          		<p class="text-muted">Categories</p>
        	</div>
       
       	</div>
    </div>
    
    <div class="col-md-4">
    	<div class="panel panel-box clearfix">
         	
         	<div class="panel-icon pull-left bg-blue">
         		<i class="glyphicon glyphicon-shopping-cart"></i>
        	</div>
        	
        	<div class="panel-value pull-right">
          		<h2 class="margin-top"> <?php  echo $c_product['total']; ?> </h2>
          		<p class="text-muted">Products</p>
        	</div>
       
       	</div>
    </div>
    
    <div class="col-md-4">
       	<div class="panel panel-box clearfix">
         	
         	<div class="panel-icon pull-left bg-yellow">
          		<i class="glyphicon glyphicon-usd"></i>
        	</div>
        	
        	<div class="panel-value pull-right">
          		<h2 class="margin-top"> <?php  echo $c_sale['total']; ?></h2>
          		<p class="text-muted">Sales</p>
        	</div>
       
       	</div>
    </div>
    
</div>
  
<div class="row">
	
	<div class="col-md-6">
    	
    	<div class="panel panel-default">
			
			<div class="panel-heading">
         		<strong>
           			<span class="glyphicon glyphicon-th"></span>
           			<span>Highest Saleing Products</span>
         		</strong>
       		</div>
       
       		<div class="panel-body">
         		<table class="table table-striped table-bordered table-condensed">
          			
          			<thead>
           				<tr>
             				<th>Title</th>
             				<th>Total Sold</th>
             				<th>Total Quantity</th>
           				</tr>
          			</thead>
          			
          			<tbody>
            			<?php foreach ($products_sold as  $product_sold): ?>
              			
              			<tr>
                			<td><?php echo remove_junk(first_character($product_sold['Pname'])); ?></td>
                			<td><?php echo (int)$product_sold['totalSold']; ?></td>
                			<td><?php echo (int)$product_sold['totalQty']; ?></td>
              			</tr>
            			
            			<?php endforeach; ?>
          			</tbody>
          			
         		</table>
       		</div>
       		
     	</div>
     	
   	</div>
   	
   	<div class="col-md-6">
      	<div class="panel panel-default">
        	
        	<div class="panel-heading">
          		<strong>
            		<span class="glyphicon glyphicon-th"></span>
            		<span>LATEST SALES</span>
          		</strong>
        	</div>
        
        	<div class="panel-body">
          		<table class="table table-striped table-bordered table-condensed">
       				<thead>
        				<tr>
           					<th class="text-center" style="width: 50px;">#</th>
           					<th>Product Name</th>
           					<th>Date</th>
    						<th>Total Sale</th>
         				</tr>
       				</thead>
       
       				<tbody>
         				<?php foreach ($recent_sales as  $recent_sale): ?>
         					<tr>
           						<td class="text-center"><?php echo count_id();?></td>
           						<td>
            						<a href="edit_sale.php?orderID=<?php echo (int)$recent_sale['orderID']; ?>">
             							<?php echo remove_junk(first_character($recent_sale['Pname'])); ?>
           							</a>
           						</td>
           						<td><?php echo remove_junk(ucfirst($recent_sale['ordDate'])); ?></td>
           						<td>₹<?php echo remove_junk(first_character($recent_sale['total'])); ?></td>
        					</tr>

       					<?php endforeach; ?>
       				</tbody>
     
     			</table>
    		</div>
   
   		</div>
  	</div>

</div>

<div class="row">
	<div class="col-md-6">
    	<div class="panel panel-default">
      
      		<div class="panel-heading">
        		<strong>
          			<span class="glyphicon glyphicon-th"></span>
          			<span>Recently Added Products</span>
        		</strong>
      		</div>
      
      		<div class="panel-body">

        		<div class="list-group">
      			
      				<?php foreach ($recent_products as  $recent_product): ?>
            		<a class="list-group-item clearfix" href="edit_product.php?productID=<?php echo    (int)$recent_product['productID'];?>">
                		<h4 class="list-group-item-heading">
                			<?php echo remove_junk(first_character($recent_product['Pname']));?>
                			<br>
                  			<span class="label label-warning pull-right">
                 			₹<?php echo $recent_product['USP']; ?>
                  			</span>
                		</h4>
                	
                		<br>
                		<span class="list-group-item-text pull-right">
                			<?php echo remove_junk(first_character($recent_product['categorie'])); ?>
              			</span>
          			</a>
      				<?php endforeach; ?>
    
    			</div>
  			</div>
 
 		</div>
	</div>
</div>

<?php include_once('layouts/footer.php'); ?>