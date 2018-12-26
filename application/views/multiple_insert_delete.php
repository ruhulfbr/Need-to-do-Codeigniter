<?php
	$admin_id = $this->session->userdata('id');
		if ($admin_id != NULL) {
			redirect('home2/RegInfo');
		}
?>
<?php include 'header.php'; ?>
	<section id="main">
		<div class="container">
			<div class="creat_form" style="max-width: 1000px; margin: 0 auto;">
				<h3>Multiple Insert Delete Data</h3>
			
				<?php echo form_open('home2/MultipleInsertMethod'); ?><br/>
					
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
						
					<div class="form-group col-md-4">
						<label for="name">Full Name</label>
						<input type="text" id="name" name="name[]" class="form-control" placeholder="Enter your Full Name" required="">
					</div>
					<div class="form-group col-md-4">
						<label for="student_id">Student Id</label>
						<input type="text" id="student_id" name="student_id[]" class="form-control" placeholder="Enter Student ID" required="">
					</div>
					<div class="form-group col-md-4">
						<label for="dept">Dept</label>
						<input type="text" id="dept" name="dept[]" class="form-control" placeholder="Enter your Dept" required="">
					</div>
					<hr>
					<div class="form-group col-md-4">
						<label for="name">Full Name</label>
						<input type="text" id="name" name="name[]" class="form-control" placeholder="Enter your Full Name" required="">
					</div>
					<div class="form-group col-md-4">
						<label for="student_id">Student Id</label>
						<input type="text" id="student_id" name="student_id[]" class="form-control" placeholder="Enter Student ID" required="">
					</div>
					<div class="form-group col-md-4">
						<label for="dept">Dept</label>
						<input type="text" id="dept" name="dept[]" class="form-control" placeholder="Enter your Dept" required="">
					</div>
					<hr>
					<div class="form-group col-md-4">
						<label for="name">Full Name</label>
						<input type="text" id="name" name="name[]" class="form-control" placeholder="Enter your Full Name" required="">
					</div>
					<div class="form-group col-md-4">
						<label for="student_id">Student Id</label>
						<input type="text" id="student_id" name="student_id[]" class="form-control" placeholder="Enter Student ID" required="">
					</div>
					<div class="form-group col-md-4">
						<label for="dept">Dept</label>
						<input type="text" id="dept" name="dept[]" class="form-control" placeholder="Enter your Dept" required="">
					</div>
					<div class="form-group col-md-4">
						<input type="submit" name="submit" class="btn btn-info" value="Insert Data">
					</div>
				<?php echo form_close(); ?>

			</div>
		</div>
	</section>
	<section id="stable">
		<div class="container">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Check</th>
						<th>Name</th>
						<th>Student ID</th>
						<th>Dept</th>
					</tr>
				</thead>
				<tbody> 
					<form action="<?php echo base_url(); ?>home2/DeleteMultiple" method="post">
					<?php foreach($sdata as $data) { $segment++; ?>
					<tr>
						<td><input type="checkbox" name="id[]" value="<?php echo $data->id; ?>"></td>
						<td><?php echo $data->name; ?></td>
						<td><?php echo $data->student_id; ?></td>
						<td><?php echo $data->dept; ?></td>
					</tr>
					<?php } ?>
					<input type="submit" name="submit" value="Delete" onclick="confirm('Are you sure about Delete')">
					</form>
				</tbody>
			</table>
			<?php echo $this->pagination->create_links();?>   
		</div>
	</section>
	

<?php include 'footer.php'; ?>
