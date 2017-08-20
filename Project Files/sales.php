<?php
  	$page_title = 'All sale';
  	require_once('includes/load.php');
   	page_require_level(3);?>

<?php
	$sales = find_all_sale();
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
            		<span>All Sales</span>
          		</strong>
          		
          		<div class="pull-right">
            		<a href="add_sale.php" class="btn btn-primary">Add New Sale</a>
          		</div>
          		
        	</div>
        	
        	<div class="panel-body">
          		
          		<table class="table table-bordered table-striped">
            		
            		<thead>
              			<tr>
                			<th class="text-center" style="width: 50x;"> # </th>
                			<th class="text-center"> Product Name </th>
                			<th class="text-center"> Customer Name </th>
                			<th class="text-center" style="width: 10%;"> Quantity </th>
                			<th class="text-center" style="width: 10%;"> Total Price </th>
                			<th class="text-center" style="width: 10%;"> Order Date </th>
                			<th class="text-center" style="width: 10%;"> Delivery Date </th>
                			<th class="text-center" style="width: 100px;"> Actions </th>
             			</tr>
            		</thead>
           
           			<tbody>
             			<?php foreach ($sales as $sale):?>
             				<tr>
               					<td class="text-center"><?php echo (int)$sale['orderID']; ?></td>
               					<td><?php echo remove_junk($sale['Pname']); ?></td>
               					<td><?php echo remove_junk(ucwords($sale['title'].' '.$sale['fname'].' '.$sale['lname']))?></td>
               					<td class="text-center"><?php echo (int)$sale['ordQuant']; ?></td>
               					<td class="text-center">₹<?php echo remove_junk(ucwords($sale['total'])); ?></td>
               					<td class="text-center"><?php echo $sale['ordDate']; ?></td>
               					<td class="text-center"><?php echo $sale['deliDate']; ?></td>
               					
               					<td class="text-center">
                  					<div class="btn-group">
                     					<a href="edit_sale.php?orderID=<?php echo (int)$sale['orderID'];?>" class="btn btn-warning btn-xs"  title="Edit" data-toggle="tooltip">
                       						<span class="glyphicon glyphicon-edit"></span>
                     					</a>
                     					<a href="delete_sale.php?orderID=<?php echo (int)$sale['orderID'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
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
