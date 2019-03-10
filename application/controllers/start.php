<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('messmodel');
		$this->load->model('usermodel');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
	}

	public function index()
	{
		$data['userdetails']=$this->usermodel->getAll();
		if(!$this->input->post('buttonSubmit')){
			$data['username']="";
			$data['message']="";
			$data['mess']=$this->messmodel->get();
			$this->parser->parse('view_index',$data);
		}
		else{
			$this->load->model('usermodel');
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$data['mess']=$this->messmodel->get();
			if($username=="" || $password==""){
				$data['username']=$username;
				$data['message']="Please Enter Username & Password";
				$this->parser->parse('view_index',$data);
			}
			else{
				if(!$user=$this->usermodel->get($username)){
					$data['username']=$username;
					$data['message']="Invalid Username";
					$this->parser->parse('view_index',$data);
				}
				else{
					$month=date('m');
					if($user['password']==$password){
						if($user['type']=='admin'){
							$this->session->set_userdata('username',$user['username']);
							$this->session->set_userdata('name',$user['name']);
							$this->session->set_userdata('usertype','admin');
							redirect( base_url()."home/admin/".$month);
						}
						else if($user['type']=='manager'){
							$this->session->set_userdata('username',$user['username']);
							$this->session->set_userdata('name',$user['name']);
							$this->session->set_userdata('usertype','manager');
							redirect( base_url()."home/user/".$month);
						}
						else if($user['type']=='user'){
							$this->session->set_userdata('username',$user['username']);
							$this->session->set_userdata('name',$user['name']);
							$this->session->set_userdata('usertype','user');
							redirect( base_url()."home/user/".$month);
						}
					}
					else{
						$data['username']=$username;
						$data['message']="Incorrect Password";
						$this->parser->parse('view_index',$data);
					}
				}
			}
			
			
		}
	}
	public function logout(){
		$this->session->unset_userdata('usertype');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('name');
		redirect("http://localhost/mess");
	}
}