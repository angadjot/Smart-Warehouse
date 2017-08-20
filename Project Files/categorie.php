<?php
	$page_title = 'All Categories';
  	require_once('includes/load.php');
  	page_require_level(3);  
  	$all_categories = find_all('Categories')
?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
	<div class="col-md-12">
		<?php echo display_msg($msg); ?>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-default">
			
			<div class="panel-heading clearfix">
				<strong>
					<span class="glyphicon glyphicon-th"></span>
					<span>All Categories</span>
				</strong>
				<a href="add_categorie.php" class="btn btn-info pull-right">Add New Categorie</a>
			</div>
			
			<div class="panel-body">
          		<table class="table table-bordered table-striped table-hover">
            		
            		<thead>
                		<tr>
                    		<th class="text-center" style="width: 50px;">#</th>
                    		<th class="text-center;">Categories</th>
                    		<th class="text-center" style="width: 60%;">Description</th>
                    		<th class="text-center" style="width: 100px;">Actions</th>
                		</tr>
            		</thead>
            		
            		<tbody>
              
              			<?php foreach ($all_categories as $cat):?>
                		
                		<tr>
                    		<td class="text-center"><?php echo remove_junk(ucfirst($cat['catID'])); ?></td>
                    		<td><?php echo remove_junk(ucfirst($cat['catName'])); ?></td>
                    		<td><?php echo remove_junk(ucfirst($cat['Description'])); ?></td>
                    		<td class="text-center">
                      			<div class="btn-group">
                        			<a href="edit_categorie.php?catID=<?php echo (int)$cat['catID'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                          				<span class="glyphicon glyphicon-edit"></span>
                        			</a>
                        		
                        			<a href="delete_categorie.php?catID=<?php echo (int)$cat['catID'];?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                          				<span class="glyphicon glyphicon-trash"></span>
                        			</a>
                     			</div>
                    		</td>
                		</tr>
                		
              			<?php endforeach; ?>
              			
            		</tbody>
            		
          		</table>
       		</div>
    
    	</div>
    
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>