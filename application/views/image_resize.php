<?php include 'header.php'; ?>
	<section id="main">
		<div class="container">
			<div class="creat_form" style="max-width: 800px; margin: 0 auto;">
				<h3>Form Validation</h3>

				<?php echo form_open_multipart('home2/ResizeMethod'); ?>

				<h4>Username</h4>
				<?php echo form_error('username'); ?>
					<input type="file" name="images[]" value="" size="58" multiple="">
					<input type="submit" value="upload" name="upload" />
				<?php echo form_close(); ?>

			</div>
		</div>
	</section>


<?php include 'footer.php'; ?>