<?php
  $page_title = 'All Product';
  require_once('includes/load.php');
  // Checkin What level Staff has permission to view this page
   page_require_level(3);  $products = join_product_table();
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Products</span>
       </strong>
         <div class="pull-right">
           <a href="add_product.php" class="btn btn-primary">Add New Product</a>
         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th class="text-center" style="width: 20%;"> Product Title </th>
                <th class="text-center" style="width: 20%;"> Categorie </th>
                <th class="text-center" style="width: 10%;"> Units Instock </th>
                <th class="text-center" style="width: 10%;"> Unit Buying Price </th>
                <th class="text-center" style="width: 10%;"> Unit Selling Price </th>
                <th class="text-center" style="width: 10%;"> Quantity Per Unit </th>
                <th class="text-center" style="width: 10%;"> Unit Size </th>
                <th class="text-center" style="width: 10%;"> Unit Weight </th>
                <th class="text-center" style="width: 10%;"> Unit Inorder </th>
                <th class="text-center" style="width: 100px;"> Actions </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product):?>
              <tr>
                <td class="text-center"><?php echo remove_junk($product['productID']);?></td>
                <td> <?php echo remove_junk($product['Pname']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['categorie']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['uInStock']); ?></td>
                <td class="text-center"> ₹<?php echo remove_junk($product['uPrice']); ?></td>
                <td class="text-center"> ₹<?php echo remove_junk($product['USP']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['qPerUnit']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['uSize']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['uWeight']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['uInOrder']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_product.php?productID=<?php echo (int)$product['productID'];?>" class="btn btn-info btn-xs"  title="Edit" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="delete_product.php?productID=<?php echo (int)$product['productID'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </tabel>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
