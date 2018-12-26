<?php include 'header.php'; ?>
	<section id="main">
		<div class="container">
			<div class="creat_form" style="max-width: 800px; margin: 0 auto;">
				<div class="alert alert-success">
					<?php
						$msg = $this->session->userdata('error');
						$msg2 = $this->session->userdata('success');
						if($msg){
							echo $msg;
							$this->session->unset_userdata('error');
						}elseif($msg2){
							echo $msg2;
							$this->session->unset_userdata('success');
						}
					?>
				</div>
				<h3>Form Validation</h3>


				<?php echo form_open('home2/test2'); ?>

				<h4>Username</h4>
				<?php echo form_error('username'); ?>
				<input type="text" name="username" value="" size="58">

				<h4>Email</h4>
				<?php echo form_error('email'); ?>
				<input type="text" name="email" value="" size="58">

				<h4>Password</h4>
				<?php echo form_error('password'); ?>
				<input type="text" name="password" value="" size="58">

				<h4>Password Confirm</h4>
				<?php echo form_error('passconf'); ?>
				<input type="text" name="passconf" value="" size="58">
				<br>
				<input type="submit" name="submit" value="Submit"> <input type="reset" name="reset" value="Reset"> 
				<?php echo form_close(); ?>

			</div>
		</div>
	</section>


<?php include 'footer.php'; ?>