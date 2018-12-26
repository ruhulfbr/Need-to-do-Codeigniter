<?php
	$admin_id = $this->session->userdata('id');
		if ($admin_id == NULL) {
			redirect('home2/login');
		}
?>
<?php include 'header.php'; ?>

	<section id="main">
		<div class="container">
			<div class="creat_form" style="max-width: 500px; margin: 0 auto;">
				<h3>Hello !! <strong><?php echo $this->session->userdata('name'); ?> </strong>You are Successfully Logged in</h3>
			
				<a class="btn btn-success" href="<?php echo site_url('home2/logout'); ?>">Logout</a><br/>
			</div>
		</div>
	</section>

<?php include 'footer.php'; ?>


