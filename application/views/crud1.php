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
				<h3>Form for create Data</h3>
				<?php if($title == 'Edit Student'){ ?>
				<form action="<?php echo base_url(); ?>Home/UpdateStudentData" method="post">
					<div class="form-group col-md-6">
						<label for="name">Student Name : </label>
						<input type="text" id="name" name="name" value="<?php echo $Singlestudent->name; ?>" class="form-control"  required />
						<input type="hidden" name="id" value="<?php echo $Singlestudent->id; ?>">
					</div>
					<div class="form-group col-md-6">
						<label for="dept">Student Dept : </label>
						<input type="text" id="dept" name="dept" value="<?php echo $Singlestudent->dept; ?>" class="form-control" required/>
					</div>
					<div class="form-group col-md-6">
						<label for="batch">Student Batch : </label>
						<input type="text" id="batch" name="batch" value="<?php echo $Singlestudent->batch; ?>" class="form-control" required/>
					</div>
					<div class="form-group col-md-6">
						<label for="student_id">Student ID : </label>
						<input type="text" id="student_id" name="student_id" value="<?php echo $Singlestudent->student_id; ?>" class="form-control" required/>
					</div>
					<div class="form-group col-md-6">
						<input type="submit" name="Update" value="Update Student Info" class="btn btn-info" />
					</div>
				</form>
				<?php }else{ ?>
				<form action="<?php echo base_url(); ?>Home/SaveStudentData" method="post">
					<div class="form-group col-md-6">
						<label for="name">Student Name : </label>
						<input type="text" id="name" name="name" placeholder="Enter Student Name" class="form-control"  required />
					</div>
					<div class="form-group col-md-6">
						<label for="dept">Student Dept : </label>
						<input type="text" id="dept" name="dept" placeholder="Enter Student Dept" class="form-control" required/>
					</div>
					<div class="form-group col-md-6">
						<label for="batch">Student Batch : </label>
						<input type="text" id="batch" name="batch" placeholder="Enter Student batch" class="form-control" required/>
					</div>
					<div class="form-group col-md-6">
						<label for="student_id">Student ID : </label>
						<input type="text" id="student_id" name="student_id" placeholder="Enter Student ID" class="form-control" required/>
					</div>
					<div class="form-group col-md-6">
						<input type="submit" name="save" value="Save Student Info" class="btn btn-success" />
					</div>
				</form>
				<?php } ?>
			</div>
		</div>
	</section>

	<section class="studentTable">
		<div class="container">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
		        <thead>
		            <tr>
		            	<th>SL No</th>
		                <th>Student Name</th>
		                <th>Student Dept</th>
		                <th>Student Batch</th>
		                <th>Student ID</th>
		                <th>Action</th>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php $i = 0; foreach($student as $value){ $i++; ?>
		            <tr>
		            	<td><?php echo $i; ?></td>
		                <td><?php echo $value->name; ?></td>
		                <td><?php echo $value->dept; ?></td>
		                <td><?php echo $value->batch; ?></td>
		                <td><?php echo $value->student_id; ?></td>
		                <td>
		                	<a class="btn btn-xs btn-warning" href="<?php echo base_url(); ?>home/EditStudent/<?php echo $value->id; ?>">Edit</a> <a class="btn btn-xs btn-warning" href="<?php echo base_url(); ?>home/DeleteStudent/<?php echo $value->id; ?>" onclick = "confirm('Are You Sure about deleting???')"> Delete</a>
		                </td>
		            </tr>
		            <?php } ?>
		        </tbody>
		    </table>
		</div>
	</section>

<?php include 'footer.php'; ?>