<?php include 'header.php'; ?>
	<section id="main">
		<div class="container">
			<div class="creat_form" style="max-width: 800px; margin: 0 auto;">
				<h3>Form Validation</h3>

				<?php echo form_open_multipart('home2/image_upload_mekanism'); ?>

				<h4>Username</h4>
				<?php echo form_error('username'); ?>
					<input type="file" name="image" value="" size="58">
					<input type="submit" value="upload" />
				<?php echo form_close(); ?>

			</div>
		</div>
	</section>
	<section id="imageshowing">
		<div class="container">
			<?php  

				if(isset($error)){
					echo $error;
				}
			?>
			<?php if(isset($name)){ ?>
			<img src="<?php echo base_url().'images/'.$name; ?>">
			<?php } ?>
		</div>
	</section>


<?php include 'footer.php'; ?>