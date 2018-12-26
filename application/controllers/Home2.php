<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home2 extends CI_Controller {
        public function index(){
                $data = array();
                $data['title'] = 'Simple Crud2';
                $this->load->view('crud2',$data);
        }

        public function test2(){


        	$this->form_validation->set_rules('username','Username','trim|required', array('required'=>'Please Enter a username , Username Name must not be empty'));
        	$this->form_validation->set_rules('password', 'Password','trim|required|min_length[6]|max_length[12]',array(
        		'required'     =>'password Must not be empty',
        		'min_length'   =>'password Shuld be at least 6 Character',
        		'required'     =>'password Must not be upto 12 Character'
        	));
        	$this->form_validation->set_rules('passconf','Confrim password', 'trim|required|matches[password]',array(
        		'matches'      => 'Didnot Match Password' 
        	));
        	$this->form_validation->set_rules('email','Email','trim|required|valid_email',array(
        		'valid_email'=>'Enter a Valid Email like text@example.com'
        	));


        	if($this->form_validation->run() == FALSE){
        		$this->load->view('crud2');

        	}else{
        		$this->load->view('success');
        	}
        }
        public function ImageUpload(){
                $data['title'] = 'Image upload';
              $this->load->view('image_upload',$data);  
        }
        public function image_upload_mekanism(){
                $config['upload_path'] = 'images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 10000;
                $config['max_width'] = 20000;
                $config['max_height'] = 10000;

                $this->load->library('upload',$config);

                
                
                if(!$this->upload->do_upload('image')){
                        $data['error'] = $this->upload->display_errors();

                        $this->load->view('image_upload',$data); 
                }else{
                      $data['error'] = 'Success';
                      $data['name'] = $this->upload->data('file_name');
                      $data['file_type'] = $this->upload->data('file_type');
                      $data['file_path'] = $this->upload->data('file_path');
                      $data['raw_name'] = $this->upload->data('raw_name');
                      $data['orig_name'] = $this->upload->data('orig_name');
                      $data['client_name'] = $this->upload->data('client_name');
                      $data['file_ext'] = $this->upload->data('file_ext');
                      $data['file_size'] = $this->upload->data('file_size');
                      $data['is_image'] = $this->upload->data('is_image');
                      $data['image_width'] = $this->upload->data('image_width');
                      $data['image_height'] = $this->upload->data('image_height');
                      $data['image_type'] = $this->upload->data('file_name');
                      $data['image_size_str'] = $this->upload->data('image_size_str');
                      echo '<pre>';
                      print_r($data);
                      exit();
                      $this->load->view('image_upload',$data);   
                }

        }
        public function login(){
                $data['title'] = 'Login';
              $this->load->view('login',$data);  
        }
        public function registration(){
                $data['title'] = 'Registration';
              $this->load->view('reg',$data);  
        }
        public function RegInfo(){
                $data['title'] = 'Logged In';
              $this->load->view('reg-info',$data);  
        }

        public function reg_method(){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name','Name','trim|required');
                $this->form_validation->set_rules('email','Email','trim|required|valid_email');
                $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[15]');
                $this->form_validation->set_rules('pass','Password','trim|required|matches[passconf]|min_length[5]|max_length[15]');
                $this->form_validation->set_rules('passconf','Password Confrim','min_length[5]|max_length[15]');

                if($this->form_validation->run() === FALSE){
                         $this->session->set_flashdata('error',validation_errors()); 
                         redirect('home2/registration');
                }

                $username = $this->input->post('username');
                $result = $this->home_model->check_username($username);

                if(count($result) > 0){
                      $this->session->set_flashdata('error','Dulicate Username'); 
                      redirect('home2/registration');  
                }else{
                      $data['name'] = $this->input->post('name');
                      $data['email'] = $this->input->post('email');
                      $data['username'] = $this->input->post('username');
                      $data['password'] = md5($this->input->post('pass'));

                      $result = $this->home_model->SaveData($data);
                      if($result == true){
                           $this->session->set_flashdata('success','Succesfully Inserted'); 
                           redirect('home2/registration');      
                      }else{
                           $this->session->set_flashdata('error','Error Inserting'); 
                           redirect('home2/registration'); 
                      }
                }

        }
        public function login_method(){
              $this->load->library('form_validation');
              $this->form_validation->set_rules('username', 'Username', 'trim|required');
              $this->form_validation->set_rules('pass','Password','trim|required');  

              if($this->form_validation->run() === FALSE){
                         $this->session->set_flashdata('error',validation_errors()); 
                         redirect('home2/login');
                }

                $username = $this->input->post('username');
                $pass = md5($this->input->post('pass'));

                $result = $this->home_model->check_login($username, $pass);

                if(count($result) > 0){
                      $data['name'] = $result->name;
                      $data['email'] = $result->email;
                      $data['id'] = $result->id;
                      $this->session->set_userdata($data);
                      redirect('home2/RegInfo'); 
                }else{
                   $this->session->set_flashdata('error','Invalid Username Password'); 
                   redirect('home2/login'); 
              }
        }

        public function logout(){
                $this->session->unset_userdata('id');

                $this->session->set_flashdata('success', 'You are Logged out'); 
                redirect('home2/login');
        }



        public function ImageResize(){
            $data['title'] = 'Image Resize copy';
            $this->load->view('image_resize',$data);
        }
        public function ResizeMethod(){
              
          if($this->input->post('upload') && !empty($_FILES['images']['name'])){
              $files = count($_FILES['images']['name']);

              for($i = 0;$i<$files;$i++){
                $_FILES['image']['name'] = $_FILES['images']['name'][$i];
                $_FILES['image']['type'] = $_FILES['images']['type'][$i];
                $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                $_FILES['image']['size'] = $_FILES['images']['size'][$i];
                $_FILES['image']['error'] = $_FILES['images']['error'][$i];

                $config['upload_path'] = 'images/1/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_width'] = 100000000;
                $config['max_height'] = 50000;
                $config['max_size'] = 5000000;

                $this->load->library('upload', $config);
                $this->load->library('image_lib');
                $this->upload->initialize($config);

                if($this->upload->do_upload('image')){
                    $fdata = $this->upload->data();

                    $path1 = 'images/1/'.$fdata['file_name'];
                    $path2 = 'images/2/'.$fdata['file_name'];

                    $newpath = copy($path1, $path2);
                    $im_size['image_library'] = 'gd2';
                    $im_size['source_image'] = $path1;
                    $im_size['create_thumb'] = FALSE;
                    $im_size['maintain_ratio'] = FALSE;
                    $im_size['quility'] = '90%';
                    $im_size['width'] = 500;
                    $im_size['height'] = 400;
                    $im_size['new_image'] = 'images/2/'.$fdata['file_name'];

                    $this->image_lib->initialize($im_size);
                    $this->image_lib->resize();
                    $this->image_lib->clear();

                    $newpath = copy($path1, $path2);
                    $im_size['image_library'] = 'gd2';
                    $im_size['source_image'] = $path1;
                    $im_size['create_thumb'] = FALSE;
                    $im_size['maintain_ratio'] = FALSE;
                    $im_size['quility'] = '90%';
                    $im_size['width'] = 600;
                    $im_size['height'] = 400;
                    $im_size['new_image'] = 'images/3/'.$fdata['file_name'];

                    $this->image_lib->initialize($im_size);
                    $this->image_lib->resize();
                    $this->image_lib->clear();

                    $newpath = copy($path1, $path2);
                    $im_size['image_library'] = 'gd2';
                    $im_size['source_image'] = $path1;
                    $im_size['create_thumb'] = FALSE;
                    $im_size['maintain_ratio'] = FALSE;
                    $im_size['quility'] = '90%';
                    $im_size['width'] = 700;
                    $im_size['height'] = 500;
                    $im_size['new_image'] = 'images/4/'.$fdata['file_name'];

                    $this->image_lib->initialize($im_size);
                    $this->image_lib->resize();
                    $this->image_lib->clear();
                }
              }

              $edata['error'] = 'Success';
              redirect('home2/ImageResize',$edata);
          }
    }

    public function MultipleInsert(){
      $data = array();
      $data['title'] = 'Multiple insert';

        $this->load->library('pagination');
        $config['base_url'] = base_url().'home2/MultipleInsert';
        $config['total_rows'] = $this->db->get('student')->num_rows();
        $config['per_page'] = 1;
        $config['num_links'] = 1;
        $config['full_tag_open'] = '<ul class="pagination no-margin">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['next_link'] = 'Next >';
        $config['prev_link'] = '< Prev';
        $config['enable_query_strings'] = TRUE;
    $config['use_page_numbers'] = TRUE;
    $config['query_string_segment'] = 'page';
    $config['page_query_string'] = TRUE;

        if($this->input->get('page')){
          $sg = (int) trim($this->input->get('page'));
          $data['segment'] = $config['per_page'] * ($sg-1);
        }else{
          $data['segment'] = 0;
        }

        $this->pagination->initialize($config);

      $data['sdata'] = $this->home_model->GetMultipleStudent($config['per_page'], $data['segment']);
      $this->load->view('multiple_insert_delete',$data);
    }
    public function MultipleInsertMethod(){

      $name = $this->input->post('name');
      $student_id = $this->input->post('student_id');
      $dept = $this->input->post('dept');

      $n = count($name);
      for($i = 0;$i<$n;$i++){
        $data['name'] = $name[$i];
        $data['student_id'] = $student_id[$i];
        $data['dept'] = $dept[$i];
        $this->home_model->SaveMultuiple($data);
      }
      redirect('home2/MultipleInsert');
    }
    public function DeleteMultiple(){
      $id = $this->input->post('id');

      $n = count($id);
      for($i = 0;$i<$n;$i++){
        $this->home_model->DeleteMultuiple($id[$i]);
      }
      redirect('home2/MultipleInsert');
    }
}
