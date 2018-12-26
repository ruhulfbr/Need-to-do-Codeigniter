<?php
	$admin_id = $this->session->userdata('id');
		if ($admin_id != NULL) {
			redirect('home2/RegInfo');
		}
?>
<?php include 'header.php'; ?>
	<section id="main">
		<div class="container">
			<div class="creat_form" style="max-width: 500px; margin: 0 auto;">
				<h3>Registration Form</h3>
				<a class="btn btn-success" href="<?php echo site_url('home2/login'); ?>">Login</a><br/>
				
				<?php echo form_open('home2/reg_method'); ?><br/>
					
						<?php
							$error = $this->session->flashdata('error');
							if($error){

						?>
						<div class="alert alert-danger"><?php echo $error; ?></div>
						<?php	
							}
							
						?>
						<?php
							$success = $this->session->flashdata('success');
							if($success){

						?>
						<div class="alert alert-success"><?php echo $success; ?></div>
						<?php	
							}
							
						?>
						
					<div class="form-group">
						<label for="name">Full Name</label>
						<input type="text" id="name" name="name" class="form-control" placeholder="Enter your Full Name" required="">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" id="email" name="email" class="form-control" placeholder="Enter your Email" required="">
					</div>
					<div class="form-group">
						<label for="username">UserName</label>
						<input type="text" id="username" name="username" class="form-control" placeholder="Enter your Username" required="">
					</div>
					<div class="form-group">
						<label for="pass">Password</label>
						<input type="password" id="pass" name="pass" class="form-control" placeholder="Enter your Password" required="">
					</div>
					<div class="form-group">
						<label for="passconf">Password Confirm</label>
						<input type="password" id="passconf" name="passconf" class="form-control" placeholder="Retype Password" required="">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-info" value="Register">
					</div>
				<?php echo form_close(); ?>

			</div>
		</div>
	</section>

<?php include 'footer.php'; ?>
