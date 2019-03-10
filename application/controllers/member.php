<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
		$this->load->model('membermodel');
		$this->load->model('usermodel');
	}

	public function index()
	{
		$data['member']=$this->membermodel->getAll();
		$user=$this->session->userdata('usertype');
		if($user=='admin'){
			$this->parser->parse('view_members',$data);
		}
		else if($user=='manager' || $user=='user'){
			$this->parser->parse('view_membercontact',$data);
		}
		else{
			$this->load->view('view_error');
		}
		
	}
	public function add()
	{
		if($this->session->userdata('usertype')=='admin'){
			if(!$this->input->post('buttonSubmit')){
				$data['message']="";
				$this->load->view('view_addmember',$data);
			}
			else{
				if(!$this->form_validation->run('memberInfo')){
					$data['message']=validation_errors();
					$this->load->view('view_addmember',$data);
				}
				else{
					global $picname;
					$id=$this->input->post('id');
					$name=$this->input->post('name');
					$phone=$this->input->post('phone');
					$email=$this->input->post('email');
					$gender=$this->input->post('gender');
					$profession=$this->input->post('profession');
					$nid=$this->input->post('nid');
					$address=$this->input->post('address');
					$photo="user.png";
					$password=$this->input->post('password');
					$this->usermodel->insert($id,$password);
					$this->membermodel->insert($id,$name,$phone,$email,$gender,$profession,$nid,$address,$photo);
					redirect( base_url()."member");
				}
			}
		}
		else{
			$this->load->view('view_error');
		}
	}
	public function edit($id='')
	{
		if($this->session->userdata('usertype')=='admin'){
			if(!$this->input->post('buttonSubmit')){
				$data['message']="";
				$data['member']=$this->membermodel->get($id);
				$this->parser->parse('view_editmember',$data);
			}
			else{
				if(!$this->form_validation->run('editmemberInfo')){
					$data['message']=validation_errors();
					$data['member']=$this->membermodel->get($id);
					$this->parser->parse('view_editmember',$data);
				}
				else{
					$id=$this->input->post('id');
					$name=$this->input->post('name');
					$phone=$this->input->post('phone');
					$email=$this->input->post('email');
					$gender=$this->input->post('gender');
					$profession=$this->input->post('profession');
					$nid=$this->input->post('nid');
					$address=$this->input->post('address');
					$this->membermodel->update($id,$name,$phone,$email,$gender,$profession,$nid,$address);
					redirect( base_url()."member");
				}
			}
		}
		else{
			$this->load->view('view_error');
		}
	}
	public function del($id='')
	{
		if($this->session->userdata('usertype')=='admin'){
			if(!$this->input->post('buttonSubmit')){
				$data=$this->membermodel->get($id);
				$this->parser->parse('view_deletemember',$data);
			}
			else{
				$this->load->model('mealmodel');
				$this->load->model('paymodel');
				$id=$this->input->post('id');
				$this->membermodel->del($id);
				$this->usermodel->del($id);
				$this->mealmodel->del($id);
				$this->paymodel->del($id);
				redirect( base_url()."member");
			}
		}
		else{
			$this->load->view('view_error');
		}
	}
	public function profile($id='')
	{
		if($this->session->userdata('usertype')=='admin'){
			$data=$this->membermodel->get($id);
			$this->parser->parse('view_profile',$data);
		}
		else if($this->session->userdata('usertype')=='user' || $this->session->userdata('usertype')=='manager'){
			if(!$this->input->post('buttonSubmit')){	
				$data=$this->membermodel->get($id);
				$this->parser->parse('view_pprofile',$data);
			}
			else{
				$id=$this->input->post('id');
				$phone=$this->input->post('phone');
				$email=$this->input->post('email');
				$this->membermodel->updatecontact($id,$phone,$email);
				redirect( base_url()."member/profile/".$id);
				
			}
		}
		else{
			$this->load->view('view_error');
		}
	
	}
	
	
	//Validation functions.................................
	
	public function nameValidation($str)
	{
		$pattern = '/^[a-zA-Z. ]*([1-9])?$/';

		if(preg_match($pattern, $str))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('nameValidation', 'Invalid Name');
			return false;
		}
	}
	
	
	function photoValidation(){
		global $picname;
		if($_FILES['photo']['name']==""){
			$this->form_validation->set_message('photoValidation', 'Photo Required');
			return false;
		}
		else{
			$check = getimagesize($_FILES["photo"]["tmp_name"]);
			if($check !== false) {
				$extent=explode(".",$_FILES['photo']['name']);
				$picname=$this->input->post('id').".".$extent[1];
				$file = $_FILES["photo"]["tmp_name"];
				$newloc = "../mess/public/$picname";
				move_uploaded_file($file, $newloc);
				return true;
			} 
			else {
				$this->form_validation->set_message('photoValidation', 'Invalid photo');
				return false;
			}
		}	
		
	}
	
}