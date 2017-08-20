<?php $staff = current_user(); ?>

<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="UTF-8">
    	
    	<title>
    		<?php 
    			if (!empty($page_title))
        	   		echo remove_junk($page_title);
            	elseif(!empty($staff))
           			echo ucfirst($staff['fname']);
            	else 
            		echo "Indosaw Inventory System";
            ?>
    	</title>
    	
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    	<link rel="stylesheet" href="libs/css/main.css" />
    
  	</head>
  
  	<body>
  		<?php  if ($session->isUserLoggedIn(true)): ?>
    	
    	<header id="header">
      		<div class="logo pull-left"> Indosaw - Inventory </div>
      		<div class="header-content">
      		
      			<div class="header-date pull-left">
        			<strong><?php echo date("F j, Y, g:i a");?></strong>
      			</div>
      		
      			<div class="pull-right clearfix">
        			<ul class="info-menu list-inline list-unstyled">
          					
          				<li class="profile">
            				<a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
              					<img src="uploads/staff/<?php echo $staff['image'];?>" alt="staff-image" class="img-circle img-inline">
              					<span><?php echo remove_junk(ucfirst($staff['fname'])); ?> <i class="caret"></i></span>
            				</a>
            			
            				<ul class="dropdown-menu">
              						
              					<li>
                  					<a href="profile.php?staffID=<?php echo (int)$staff['staffID'];?>">
                      				<i class="glyphicon glyphicon-user"></i>
                      				Profile
                  					</a>
              					</li>
             						
             					<li>
                 					<a href="edit_account.php" title="edit account">
                     					<i class="glyphicon glyphicon-cog"></i>
                     					Settings
                 					</a>
             					</li>
             				
             					<li class="last">
                 					<a href="logout.php">
                     					<i class="glyphicon glyphicon-off"></i>
                     					Logout
                 					</a>
             					</li>
           					
           					</ul>
          				</li>
        		
        			</ul>
      			</div>
     	
     		</div>
    	</header>
    
    	<div class="sidebar">
      		<?php if($staff['roleID'] === '1'): ?>
        
      		<?php include_once('admin_menu.php');?>

      		<?php elseif($staff['roleID'] === '2'): ?>
       
      		<?php include_once('staff_menu.php');?>

      		<?php endif;?>
		</div>
		<?php endif;?>

		<div class="page">
			<div class="container-fluid">
