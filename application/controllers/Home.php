<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		$data = array();
		$data['title'] = "Main Page";
		$this->load->view('index',$data);
	}
	public function SimpleCrud(){
		$data = array();
		$data['title'] = 'Simple Crud';
		$data['student'] = $this->home_model->GetStudents();
		$this->load->view('crud1',$data);
	}
	public function SaveStudentData(){
		$name = $this->input->post('name');
		$dept = $this->input->post('dept');
		$batch = $this->input->post('batch');
		$student_id = $this->input->post('student_id');

		$name = trim($name);
		$dept = trim($dept);
		$batch = trim($batch);
		$student_id = trim($student_id);

		if($name == '' or $dept == '' or $batch == '' or $student_id == ''){
			$sdata['error'] = 'Field Must Not Be empty';
			$this->session->set_userdata($sdata);
			redirect('home/SimpleCrud');
		}else{
			$data['name'] = $name;
			$data['dept'] = $dept;
			$data['batch'] = $batch;
			$data['student_id'] = $student_id;
			$insert = $this->home_model->SaveStudentData($data);
			if($insert == 1){
				$sdata['success'] = 'Data Save Successfully';
				$this->session->set_userdata($sdata);
				redirect('home/SimpleCrud');
			}else{
				$sdata['error'] = 'Error inserting';
				$this->session->set_userdata($sdata);
				redirect('home/SimpleCrud');
			}
			
		}

	}
	public function EditStudent($id){
		$data = array();
		$data['title'] = 'Edit Student';
		$data['Singlestudent'] = $this->home_model->GetSingleStudent($id);
		$data['student'] = $this->home_model->GetStudents();
		$this->load->view('crud1',$data);
	}
	public function UpdateStudentData(){
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$dept = $this->input->post('dept');
		$batch = $this->input->post('batch');
		$student_id = $this->input->post('student_id');

		$name = trim($name);
		$dept = trim($dept);
		$batch = trim($batch);
		$student_id = trim($student_id);

		if($name == '' or $dept == '' or $batch == '' or $student_id == ''){
			$sdata['error'] = 'Field Must Not Be empty';
			$this->session->set_userdata($sdata);
			redirect('home/EditStudent/'.$id);
		}else{
			$data['name'] = $name;
			$data['dept'] = $dept;
			$data['batch'] = $batch;
			$data['student_id'] = $student_id;
			$update = $this->home_model->UpdateStudentData($id,$data);
			if($update == 1){
				$sdata['success'] = 'Data Edit Successfully';
				$this->session->set_userdata($sdata);
				redirect('home/SimpleCrud');
			}else{
				$sdata['error'] = 'Error Updating';
				$this->session->set_userdata($sdata);
				redirect('home/SimpleCrud');
			}
			
		}
	}
	public function DeleteStudent($id){
		$delete = $this->home_model->DeleteStudentdata($id);
		if($delete == 1){
				$sdata['success'] = 'Data Delete Successfull';
				$this->session->set_userdata($sdata);
				redirect('home/SimpleCrud');
			}else{
				$sdata['error'] = 'Error Deleting';
				$this->session->set_userdata($sdata);
				redirect('home/SimpleCrud');
			}
	}
}
