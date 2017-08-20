<?php
  $page_title = 'All Suppliers';
  require_once('includes/load.php');
?>
<?php
 page_require_level(3);
 $all_suppliers = find_all_supplier();
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
          <span>Suppliers</span>
       </strong>
         <a href="add_supplier.php" class="btn btn-info pull-right">Add New Supplier</a>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center;" style="width: 50px;">#</th>
            <th class="text-center;">Name</th>
            <th class="text-center;">Address</th>
            <th class="text-center;">Email</th>
            <th class="text-center;">Phone No.</th>
            <th class="text-center;" style="width: 100px;">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_suppliers as $a_supplier): ?>
          <tr>
           <td class="text-center;"><?php echo remove_junk(ucwords($a_supplier['supplierID']))?></td>
           <td class="text-center;"><?php echo remove_junk(ucwords($a_supplier['title'].' '.$a_supplier['fname'].' '.$a_supplier['lname']))?></td>
           <td class="text-center;"><?php echo remove_junk(ucwords($a_supplier['address']))?></td>
           <td class="text-center;"><?php echo remove_junk(ucwords($a_supplier['email']))?></td>
           <td class="text-center;"><?php echo remove_junk(ucwords($a_supplier['Phone']))?></td>
           <td class="text-center;">
             <div class="btn-group">
                <a href="edit_supplier.php?supplierID=<?php echo (int)$a_supplier['supplierID'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="delete_supplier.php?supplierID=<?php echo (int)$a_supplier['supplierID'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                  <i class="glyphicon glyphicon-remove"></i>
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
