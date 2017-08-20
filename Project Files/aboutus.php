<?php
	$page_title = 'About Us';
  	require_once('includes/load.php');
   	page_require_level(3);
?>

<?php include_once('layouts/header.php'); ?>

<div class="container">
  	
  	<div class="page-header">
    	<h1 class="text-center">Who are We?</h1>
  	</div>
  
  	<p class="lead text-center">We are a team of creative graphic designers focused on modern eye catching designs.</p>
  
  	<div class="container">
    	<div class="row stylish-panel">
      		
      		<div class="col-md-4">
        		<div>
          			<img src="https://fbcdn-sphotos-d-a.akamaihd.net/hphotos-ak-xap1/v/t1.0-9/12195790_747722468665769_8147426581062113274_n.jpg?oh=9db03663b4e729597c9b2da44f3424e8&oe=56E1640C&__gda__=1461677520_1026c22c62c64392b4cc443a6dcf5694" alt="Texto Alternativo" class="img-circle img-thumbnail" width="200" height="200">
          			<h2>Angadjot Singh Bhasin</h2>
          			<p><br>
          				Studies Computer Engineering at Thapar University,Patiala
          				<br>
          				Roll No.- 101403037
          				<br>
          				COE - 2
          				<br>
          			</p>
          			<a href="https://www.facebook.com/profile.php?id=100002840687250" class="btn btn-primary" title="Know More">Know More »</a>
        		</div>
      		</div>
      		
      		<div class="col-md-4">
        		<div>
          			<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xfp1/v/t1.0-1/p160x160/12196053_1670168766601649_5051152586556596752_n.jpg?oh=e8e01c8d76b449ba19adb83d786e018b&oe=56E5AF35&__gda__=1454365219_0081d99624129568e3c15f8516110c9b" alt="Texto Alternativo" class="img-circle img-thumbnail" width="200" height="200">
          			<h2>Ankit Khokhar</h2>
          			<p><br>
          				Studies Computer Engineering at Thapar University,Patiala
          				<br>
          				Roll No.- 101403039
          				<br>
          				COE - 2
          				<br>
          			</p>
          			<a href="https://www.facebook.com/ankit.khokhar.12" class="btn btn-primary" title="Know More">Know More »</a>
        		</div>
      		</div>
      		
      		<div class="col-md-4">
        		<div>
          			<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xtf1/v/t1.0-1/p160x160/12009642_954409801285697_2505082353513826317_n.jpg?oh=590597e7752638310cec235c9f22eeb4&oe=56EA55EC&__gda__=1458438809_b726e0949ad5d26a2182d6dd50a8319e" alt="Texto Alternativo" class="img-circle img-thumbnail" width="200" height="200">
          			<h2>Ankush Chawla</h2>
          			<p><br>
          				Studies Computer Engineering at Thapar University,Patiala
          				<br>
          				Roll No.- 101403040
          				<br>
          				COE - 2
          				<br>
          			</p>
          			<a href="https://www.facebook.com/ankush.chawala" class="btn btn-primary" title="Know More">Know More »</a>
        		</div>
      		</div>
    
    	</div>
    </div>
  
</div>

<style>
	.stylish-panel {
		padding: 20px 0;
		text-align: center;
	}
	.stylish-panel > div > div{
		padding: 10px;
		border: 1px solid transparent;
		border-radius: 4px;
		transition: 0.2s;
	}
	.stylish-panel > div:hover > div{
    	margin-top: -10px;
    	border: 1px solid rgb(200, 200, 200);
    	box-shadow: rgba(0, 0, 0, 0.1) 0px 5px 5px 2px;
    	background: rgba(200, 200, 200, 0.1);
    	transition: 0.5s;
	}
	.stylish-panel > div:hover img {
		border-radius: 50%;
		-webkit-transform: rotate(360deg);
		-moz-transform: rotate(360deg);
		-o-transform: rotate(360deg);
		-ms-transform: rotate(360deg);
		transform: rotate(360deg);
	}
</style>

<?php include_once('layouts/footer.php'); ?>