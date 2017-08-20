<?php
  require_once('includes/load.php');

	/*--------------------------------------------------------------*/
	/* Function for find all database table rows by table name
	/*--------------------------------------------------------------*/
	function find_all($table) {
   		global $db;
   		if(tableExists($table)){
     		return find_by_sql("SELECT * FROM ".$db->escape($table));
   		}
	}

	/*--------------------------------------------------------------*/
	/* Function for Perform queries
	/*--------------------------------------------------------------*/
	function find_by_sql($sql){
  		global $db;
  		$result = $db->query($sql);
  		$result_set = $db->while_loop($result);
 		return $result_set;
	}

	/*--------------------------------------------------------------*/
	/*  Function for Find Staff data from Staff table by staffID
	/*--------------------------------------------------------------*/
	function find_by_staffID($table,$id){
  		global $db;
  		$id = (int)$id;
    	if(tableExists($table)){
          	$sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE staffID='{$db->escape($id)}' LIMIT 1");
          	
          	if($result = $db->fetch_assoc($sql))
            	return $result;
          	else
            	return null;
     	}
	}

	/*--------------------------------------------------------------*/
	/*  Function for Find Customer data from Customer table by custID
	/*--------------------------------------------------------------*/
	function find_by_custID($table,$id){
  		global $db;
  		$id = (int)$id;
    
    	if(tableExists($table)){
			$sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE custID='{$db->escape($id)}' LIMIT 1");
          	if($result = $db->fetch_assoc($sql))
            	return $result;
          	else
            	return null;
     	}
	}

	/*--------------------------------------------------------------*/
	/*  Function for Find Supplier data from Supplier table by supplierID
	/*--------------------------------------------------------------*/
	function find_by_supplierID($table,$id){
  		global $db;
  		$id = (int)$id;
    
    	if(tableExists($table)){
          	$sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE supplierID='{$db->escape($id)}' LIMIT 1");
          	if($result = $db->fetch_assoc($sql))
            	return $result;
          	else
            	return null;
     	}
	}

/*--------------------------------------------------------------*/
/*  Function for Find Categorie data from Categorie table by catID
/*--------------------------------------------------------------*/
function find_by_catID($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE catID='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

/*--------------------------------------------------------------*/
/*  Function for Find Product data from Product table by productID
/*--------------------------------------------------------------*/
function find_by_productID($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE productID='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/*  Function for Find Order data from Order table by orderID
/*--------------------------------------------------------------*/
function find_by_orderID($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE orderID='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}

/*--------------------------------------------------------------*/
/*  Function for Find Payment data from Payment table by billno
/*--------------------------------------------------------------*/
function find_by_billno($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE billno ='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/* Function for Delete Staff data from Staff table by staffID
/*--------------------------------------------------------------*/
function delete_by_staffID($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE staffID=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}

/*--------------------------------------------------------------*/
/* Function for Delete Customer data from Customer table by custID
/*--------------------------------------------------------------*/
function delete_by_custID($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE custID=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}

/*--------------------------------------------------------------*/
/* Function for Delete Supplier data from Supplier table by supplierID
/*--------------------------------------------------------------*/
function delete_by_supplierID($table,$id)
{
  global $db;
  if(tableExists($table))
   {
   	$sql  = "SET foreign_key_checks = 0;";
    $sql .= " DELETE FROM ".$db->escape($table);
    $sql .= " WHERE supplierID=". $db->escape($id);
    $sql .= " LIMIT 1;";
    $sql .= " SET foreign_key_checks = 1;";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}

/*--------------------------------------------------------------*/
/* Function for Delete Categorie data from Categorie table by catID
/*--------------------------------------------------------------*/
function delete_by_catID($table,$id)
{
  global $db;
  if(tableExists($table))
   {
   	$sql  = "SET foreign_key_checks = 0;";
    $sql .= " DELETE FROM ".$db->escape($table);
    $sql .= " WHERE catID=". $db->escape($id);
    $sql .= " LIMIT 1;";
    $sql .= " SET foreign_key_checks = 1;";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}


/*--------------------------------------------------------------*/
/* Function for Delete Product data from Product table by productID
/*--------------------------------------------------------------*/
function delete_by_productID($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql  = "SET foreign_key_checks = 0;";
    $sql .= " DELETE FROM ".$db->escape($table);
    $sql .= " WHERE productID=". $db->escape($id);
    $sql .= " LIMIT 1;";
    $sql .= " SET foreign_key_checks = 1;";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}

/*--------------------------------------------------------------*/
/* Function for Delete Order data from Orders table by orderID
/*--------------------------------------------------------------*/
function delete_by_orderID($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql  = "SET foreign_key_checks = 0;";
    $sql .= " DELETE FROM ".$db->escape($table);
    $sql .= " WHERE orderID=". $db->escape($id);
    $sql .= " LIMIT 1;";
    $sql .= " SET foreign_key_checks = 1;";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}

/*--------------------------------------------------------------*/
/* Function for Delete Payment data from Payment table by billno
/*--------------------------------------------------------------*/
function delete_by_billno($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql  = "SET foreign_key_checks = 0;";
    $sql .= " DELETE FROM ".$db->escape($table);
    $sql .= " WHERE billno=". $db->escape($id);
    $sql .= " LIMIT 1;";
    $sql .= " SET foreign_key_checks = 1;";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}

/*--------------------------------------------------------------*/
/* Function for Count staffID  By Staff table name
/*--------------------------------------------------------------*/

function count_by_staffID($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(staffID) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}

/*--------------------------------------------------------------*/
/* Function for Count supplierID  By Supplier table name
/*--------------------------------------------------------------*/

function count_by_supplierID($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(supplierID) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}

/*--------------------------------------------------------------*/
/* Function for Count custID  By Customer table name
/*--------------------------------------------------------------*/

function count_by_custID($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(custID) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}

/*--------------------------------------------------------------*/
/* Function for Count orderID  By Orders table name
/*--------------------------------------------------------------*/

function count_by_orderID($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(orderID) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}

/*--------------------------------------------------------------*/
/* Function for Count productID  By product table name
/*--------------------------------------------------------------*/

function count_by_productID($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(productID) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}

/*--------------------------------------------------------------*/
/* Function for Count Categories id  By Categories table name
/*--------------------------------------------------------------*/

function count_by_catID($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(catID) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}

/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }
  
 /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
  function authenticate($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT staffID,username,password,roleID FROM Staff WHERE username ='%s' LIMIT 1", $username);
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['password'] ){
        return $user['staffID'];
      }
    }
   return false;
  }
  
  /*--------------------------------------------------------------*/
  /* Find current log in staff by session id
  /*--------------------------------------------------------------*/
  function current_user(){
      static $current_user;
      global $db;
      if(!$current_user){
         if(isset($_SESSION['staffID'])):
             $staffID = intval($_SESSION['staffID']);
             $current_user = find_by_staffID('Staff',$staffID);
        endif;
      }
    return $current_user;
  }
  
  /*--------------------------------------------------------------*/
  /* Find all staff by
  /* Joining Staff table and Staff_Phone table
  /*--------------------------------------------------------------*/
  function find_all_staff(){
      global $db;
      $results = array();
      $sql = "SELECT s.staffID,s.title,s.fname,s.lname,s.username,s.roleID,s.roleName,s.gender";
      $sql .=",s.address,s.email,DATE_FORMAT(s.DOB,'%d %M %Y') AS DOB,DATE_FORMAT(s.last_login,'%d %M %Y') AS last_login,";
      $sql .="sp.Phone ";
      $sql .="FROM Staff s ";
      $sql .="LEFT JOIN Staff_Phone sp ";
      $sql .="ON sp.staffID=s.staffID ORDER BY s.staffID ASC";
      $result = find_by_sql($sql);
      return $result;
  }
  
  /*--------------------------------------------------------------*/
  /* Find all Customers by
  /* Joining Customer table and Customer_Phone table
  /*--------------------------------------------------------------*/
  function find_all_customer(){
      global $db;
      $results = array();
      $sql = "SELECT c.custID,c.title,c.fname,c.lname,c.address,c.email,";
      $sql .="cp.Phone ";
      $sql .="FROM Customer c ";
      $sql .="LEFT JOIN Customer_Phone cp ";
      $sql .="ON cp.custID=c.custID ORDER BY c.custID ASC";
      $result = find_by_sql($sql);
      return $result;
  }
  
  /*--------------------------------------------------------------*/
  /* Find all Suppliers by
  /* Joining Supplier table and Supplier_Phone table
  /*--------------------------------------------------------------*/
  function find_all_supplier(){
      global $db;
      $results = array();
      $sql = "SELECT s.supplierID,s.title,s.fname,s.lname,s.address,s.email,";
      $sql .="sp.Phone ";
      $sql .="FROM Supplier s ";
      $sql .="LEFT JOIN Supplier_Phone sp ";
      $sql .="ON sp.supplierID=s.supplierID ORDER BY s.supplierID ASC";
      $result = find_by_sql($sql);
      return $result;
  }
  
  /*--------------------------------------------------------------*/
  /* Find all Suppliers by
  /* Joining Supplier table and Supplier_Phone table
  /*--------------------------------------------------------------*/
  function find_all_payment(){
      global $db;
      $results = array();
      $sql = "SELECT p.billno,p.paytype,FORMAT(p.CrdAmount,2) AS CrdAmount,FORMAT(p.DrAmount,2) AS DrAmount,";
      $sql .="DATE_FORMAT(p.payDueDate,'%d %M %Y') AS payDueDate,DATE_FORMAT(p.CrdDate,'%d %M %Y') AS CrdDate,";
      $sql .="DATE_FORMAT(p.DrDate,'%d %M %Y') AS DrDate,p.Order_orderID,FORMAT(o.total,2) AS total,o.Customer_custID ";
      $sql .="FROM Payment p ";
      $sql .="LEFT JOIN Orders o ";
      $sql .="ON o.orderID=p.Order_orderID ORDER BY p.billno ASC";
      $result = find_by_sql($sql);
      return $result;
  }
  
  /*--------------------------------------------------------------*/
  /* Find all Customers registers by staff by
  /* Joining Customer table and Staff table
  /*--------------------------------------------------------------*/
  function find_all_customer_registered_by_staff(){
      global $db;
      $results = array();
      $sql = "SELECT c.custID,c.title,c.fname,c.lname,s.staffID,s.title,s.fname,s.lname,s.roleID,s.roleName ";
      $sql .="FROM Customer c ";
      $sql .="LEFT JOIN Staff s ";
      $sql .="ON s.staffID=c.Staff_staffID ORDER BY c.custID ASC";
      $result = find_by_sql($sql);
      return $result;
  }
  
  /*--------------------------------------------------------------*/
  /* Function to update the last log in of a Staff Member
  /*--------------------------------------------------------------*/

 function updateLastLogIn($staffID)
	{
		global $db;
    $date = make_date();
    $sql = "UPDATE Staff SET last_login='{$date}' WHERE staffID ='{$staffID}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}
	
  /*--------------------------------------------------------------*/
  /* Find all staff role name
  /*--------------------------------------------------------------*/
  function find_by_roleName($val)
  {
    global $db;
    $sql = "SELECT roleName FROM Staff WHERE roleName = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  
  /*--------------------------------------------------------------*/
  /* Find staff roleID
  /*--------------------------------------------------------------*/
  function find_by_roleID($level)
  {
    global $db;
    $sql = "SELECT roleID FROM Staff WHERE staffID = '{$db->escape($level)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  
  /*--------------------------------------------------------------*/
  /* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
   function page_require_level($require_level){
     global $session;
     $current_user = current_user();
     $login_level = find_by_roleID($current_user['staffID']);
     //if user not login
     if (!$session->isUserLoggedIn(true)):
            $session->msg('d','Please login...');
            redirect('index.php', false);
      //if Group status Deactive
     elseif($login_level['roleID'] === '0'):
           $session->msg('d','This level user has been band!');
           redirect('home.php',false);
      //cheackin log in User level and Require level is Less than or equal to
     elseif($current_user['roleID'] <= (int)$require_level):
              return true;
      else:
            $session->msg("d", "Sorry! you dont have permission to view the page.");
            redirect('home.php', false);
        endif;

     }
   /*--------------------------------------------------------------*/
   /* Function for Finding all product name
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
  function join_product_table(){
     global $db;
     $sql  =" SELECT p.productID,p.Pname,p.uInStock,FORMAT(p.uPrice,2) AS uPrice,FORMAT(p.USP,2) AS USP";
     $sql .=",p.qPerUnit,p.uSize,p.uWeight,p.uInOrder,c.catName";
    $sql  .=" AS categorie";
    $sql  .=" FROM Product p";
    $sql  .=" LEFT JOIN Categories c ON c.catID = p.Category_catID";
    $sql  .=" ORDER BY p.productID ASC";
    return find_by_sql($sql);

   }
  /*--------------------------------------------------------------*/
  /* Function for Finding all product name
  /* Request coming from ajax.php for auto suggest
  /*--------------------------------------------------------------*/

   function find_product_by_title($product_name){
     global $db;
     $p_name = remove_junk($db->escape($product_name));
     $sql = "SELECT Pname FROM Product WHERE Pname like '%$Pname%' LIMIT 5";
     $result = find_by_sql($sql);
     return $result;
   }

  /*--------------------------------------------------------------*/
  /* Function for Finding all product info by product title
  /* Request coming from ajax.php
  /*--------------------------------------------------------------*/
  function find_all_product_info_by_title($title){
    global $db;
    $sql  = "SELECT * FROM Product ";
    $sql .= " WHERE Pname ='{$title}'";
    $sql .=" LIMIT 1";
    return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
  /* Function for Update product qPerUnit
  /*--------------------------------------------------------------*/
  function update_product_qty($qty,$p_id){
    global $db;
    $qty = (int) $qty;
    $id  = (int)$p_id;
    $sql = "UPDATE Product SET uInStock = uInStock -'{$qty}' WHERE productID = '{$id}'";
    $result = $db->query($sql);
    return($db->affected_rows() === 1 ? true : false);

  }
  /*--------------------------------------------------------------*/
  /* Function for Display Recent product Added
  /*--------------------------------------------------------------*/
 function find_recent_product_added($limit){
   global $db;
   $sql   = " SELECT p.productID,p.Pname,FORMAT(p.USP,2) AS USP,c.catName AS categorie";
   $sql  .= " FROM Product p";
   $sql  .= " LEFT JOIN Categories c ON c.catID = p.Category_catID";
   $sql  .= " ORDER BY p.productID DESC LIMIT ".$db->escape((int)$limit);
   return find_by_sql($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for Find Highest saleing Product
 /*--------------------------------------------------------------*/
 function find_higest_saleing_product($limit){
   global $db;
   $sql  = "SELECT p.Pname, COUNT(o.Product_productID) AS totalSold, SUM(o.ordQuant) AS totalQty";
   $sql .= " FROM Orders o";
   $sql .= " LEFT JOIN Product p ON p.productID = o.Product_productID ";
   $sql .= " GROUP BY o.Product_productID";
   $sql .= " ORDER BY SUM(o.ordQuant) DESC LIMIT ".$db->escape((int)$limit);
   return $db->query($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for find all sales
 /*--------------------------------------------------------------*/
 function find_all_sale(){
   global $db;
   $sql  = "SELECT o.orderID,o.ordQuant,FORMAT(o.total,2) AS total,";
   $sql .= " DATE_FORMAT(o.ordDate,'%d %M %Y') AS ordDate,DATE_FORMAT(o.deliDate,'%d %M %Y') AS deliDate,";
   $sql .= " o.Product_productID,o.Customer_custID,p.Pname,c.title,c.fname,c.lname";
   $sql .= " FROM Orders o";
   $sql .= " LEFT JOIN Product p ON o.Product_productID = p.productID";
   $sql .= " LEFT JOIN Customer c ON o.Customer_custID = c.custID";
   $sql .= " ORDER BY o.ordDate DESC";
   return find_by_sql($sql);
 }
 
 /*--------------------------------------------------------------*/
 /* Function for Display Recent sale
 /*--------------------------------------------------------------*/
function find_recent_sale_added($limit){
  global $db;
  $sql  = "SELECT o.orderID,o.ordQuant,FORMAT(o.total,2) AS total,DATE_FORMAT(o.ordDate,'%d %M %Y') AS ordDate,p.Pname";
  $sql .= " FROM Orders o";
  $sql .= " LEFT JOIN Product p ON o.Product_productID = p.productID";
  $sql .= " ORDER BY o.ordDate DESC LIMIT ".$db->escape((int)$limit);
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate sales report by two dates
/*--------------------------------------------------------------*/
function find_sale_by_dates($start_date,$end_date){
  global $db;
  $start_date  = date("Y-m-d", strtotime($start_date));
  $end_date    = date("Y-m-d", strtotime($end_date));
  $sql  = "SELECT DATE_FORMAT(o.ordDate,'%d %M %Y') AS ordDate, p.Pname,FORMAT(p.USP,2) AS USP,FORMAT(p.uPrice,2) AS uPrice,";
  $sql .= "COUNT(o.Product_productID) AS total_records,";
  $sql .= "SUM(o.ordQuant) AS total_sales,";
  $sql .= "FORMAT(SUM(p.USP * o.ordQuant),2) AS total_selling_price,";
  $sql .= "FORMAT(SUM(p.uPrice * o.ordQuant),2) AS total_buying_price ";
  $sql .= "FROM Orders o ";
  $sql .= "LEFT JOIN Product p ON o.Product_productID = p.productID";
  $sql .= " WHERE o.ordDate BETWEEN '{$start_date}' AND '{$end_date}'";
  $sql .= " GROUP BY DATE(o.ordDate),p.Pname";
  $sql .= " ORDER BY DATE(o.ordDate) DESC";
  return $db->query($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Daily sales report
/*--------------------------------------------------------------*/
function  dailySales($year,$month){
  global $db;
  $sql  = "SELECT o.ordQuant,";
  $sql .= " DATE_FORMAT(o.ordDate, '%d %M %Y') AS date,p.Pname,";
  $sql .= "FORMAT(SUM(p.USP * o.ordQuant),2) AS total_selling_price";
  $sql .= " FROM Orders o";
  $sql .= " LEFT JOIN Product p ON o.Product_productID = p.productID";
  $sql .= " WHERE DATE_FORMAT(o.ordDate, '%Y-%m' ) = '{$year}-{$month}'";
  $sql .= " GROUP BY DATE_FORMAT( o.ordDate,  '%e' ),o.Product_productID";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Monthly sales report
/*--------------------------------------------------------------*/
function  monthlySales($year){
  global $db;
  $sql  = "SELECT o.ordQuant,";
  $sql .= " DATE_FORMAT(o.ordDate, '%d %M %Y') AS date,p.Pname,";
  $sql .= "FORMAT(SUM(p.USP * o.ordQuant),2) AS total_selling_price";
  $sql .= " FROM Orders o";
  $sql .= " LEFT JOIN Product p ON o.Product_productID = p.productID";
  $sql .= " WHERE DATE_FORMAT(o.ordDate, '%Y' ) = '{$year}'";
  $sql .= " GROUP BY DATE_FORMAT( o.ordDate,  '%c' ),o.Product_productID";
  $sql .= " ORDER BY date_format(o.ordDate, '%c' ) ASC";
  return find_by_sql($sql);
}

?>
