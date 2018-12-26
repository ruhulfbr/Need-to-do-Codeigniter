<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function SaveStudentData($data){
		$this->db->insert('student',$data);
		return 1;
	}
	public function GetStudents(){
		$this->db->select('*');
		$this->db->from('student');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	public function GetSingleStudent($id){
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	public function UpdateStudentData($id,$data){
		$this->db->where('id',$id);
		$this->db->update('student',$data);
		return 1;
	}
	public function DeleteStudentdata($id){
		$this->db->where('id',$id);
		$this->db->delete('student');
		return 1;
	}
	public function check_username($username){
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username',$username);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	public function check_login($username, $pass){
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username',$username);
		$this->db->where('password',$pass);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	public function SaveData($data){
		$this->db->insert('tbl_user',$data);
		return true;
	}
	public function SaveMultuiple($data){
		$this->db->insert('student',$data);
	}
	public function GetMultipleStudent($limit1,$limit2){
		$this->db->select('*');
		$this->db->from('student');
		$this->db->limit($limit1,$limit2);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	public function DeleteMultuiple($id){
		$this->db->where('id',$id);
		$this->db->delete('student');
	}
}
