<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Need To do | <?php echo $title; ?></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" />
<!-- Latest compiled and minified JavaScript -->


<style type="text/css">
	#main{
		margin-top: 20px;
		margin-bottom: 20px;
	}
	.form-control{
		border-radius: 0px;
	}
	.btn{
		border-radius: 0px;
	}
</style>
</head>
<body>
	<section id="header">
		<div class="container">
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <p class="navbar-text navbar-left">Need to do Header</p>
			    </div>
			  </div>
			</nav>
		</div>
	</section>

	<section id="menu">
		<div class="container">
			<div class="row">
				<div class="btn-group btn-group-justified" role="group" aria-label="...">
				  <div class="btn-group" role="group">
				    <a href="<?php echo base_url(); ?>Home/SimpleCrud"><button type="button" class="btn btn-default">Simple Crud</button></a>
				  </div>
				  <div class="btn-group" role="group">
				     <a href="<?php echo base_url(); ?>Home2"><button type="button" class="btn btn-default">Crud Form validation</button></a>
				  </div>
				  <div class="btn-group" role="group">
				    <a href="<?php echo base_url(); ?>Home2/ImageUpload"><button type="button" class="btn btn-default">Image Upload CI</button></a>
				  </div>
				  <div class="btn-group" role="group">
				    <a href="<?php echo base_url(); ?>Home2/Login"><button type="button" class="btn btn-default">login</button></a>
				  </div>
				  <div class="btn-group" role="group">
				    <a href="<?php echo base_url(); ?>Home2/ImageResize"><button type="button" class="btn btn-default">Image Resize and Copy</button></a>
				  </div>
				  <div class="btn-group" role="group">
				    <a href="<?php echo base_url(); ?>Home2/MultipleInsert"><button type="button" class="btn btn-default">Multiple Insert Delete</button></a>
				  </div>
				</div>
			</div>
			<div class="row">
				<div class="btn-group" role="group">
			   <a class="btn btn-success" href="<?php base_url().'Home2/JqueryFormValidation' ?>">Jquery Form Vaidation</a>
			  </div>
				 
			</div>
		</div>

	</section>