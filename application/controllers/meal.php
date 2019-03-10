<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meal extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
		$this->load->model('mealmodel');
		$this->load->model('membermodel');
	}

	public function index()
	{
		if($this->session->userdata('usertype')=='user'||$this->session->userdata('usertype')=='manager'){
			$year=date('Y');
			$month=date('m');
			$id=$this->session->userdata('username');
			$data['totalmeal']=$this->mealmodel->getsumbyid($id,$year,$month);
			$data['meals']=$this->mealmodel->get($id,$year,$month);
			$data['id']=$id;
			$this->parser->parse('view_meal',$data);
		}
		else{
			$this->load->view('view_error');
		}
		
		
	}
	public function all(){
		if($this->session->userdata('usertype')=='admin'||$this->session->userdata('usertype')=='manager'){
			$year=date('Y');
			$month=date('m');
			$data['meals']=$this->mealmodel->getAll($year,$month);
			$data['total']=$this->mealmodel->monthlyMeal($year,$month);
			$members=$this->membermodel->getAll();
			$membermeal='';
			foreach($members as $member){
				$meals=$this->mealmodel->getsumbyid($member['id'],$year,$month);
				$membermeal.='<tr>
					<td>'.$member['name'].'</td>
					<td>'.$meals['meals'].'</td>
				</tr>';
			}
			$data['membermeal']=$membermeal;
			$this->parser->parse('view_allmeal',$data);
		}
		else{
			$this->load->view('view_error');
		}
	}
	public function add($id)
	{
		
		if($this->session->userdata('usertype')=='manager'||$this->session->userdata('usertype')=='user'){
			if(!$pending=$this->mealmodel->getcheck($id)){
				if(!$this->input->post('buttonSubmit')){
					$data['message']="";
					$data['id']=$id;
					$this->load->view('view_addmeal',$data);
				}
				else{
					if(!$this->form_validation->run('meal')){
						$data['message']=validation_errors();
						$data['id']=$id;
						$this->load->view('view_addmeal',$data);
					}
					else{
						$id=$this->input->post('id');
						$breakfast=$this->input->post('breakfast');
						$lunch=$this->input->post('lunch');
						$dinner=$this->input->post('dinner');
						$this->mealmodel->insert($id,$breakfast,$lunch,$dinner);
						redirect( base_url()."meal");
					}
				}
			}
			else{
				if(!$this->input->post('buttonSubmit')){
					$data['message']="";
					$data['pending']=$pending;
					$data['check']=$this->mealmodel->getmealcheck();
					$this->load->view('view_editmeal',$data);
				}
				else{
					if(!$this->form_validation->run('meal')){
						$data['message']=validation_errors();
						$data['pending']=$pending;
						$data['check']=$this->mealmodel->getmealcheck();
						$this->load->view('view_editmeal',$data);
					}
					else{
						$id=$this->input->post('id');
						$breakfast=$this->input->post('breakfast');
						$lunch=$this->input->post('lunch');
						$dinner=$this->input->post('dinner');
						$this->mealmodel->updatemeal($id,$breakfast,$lunch,$dinner);
						redirect( base_url()."meal");
					}
				}
			}
		}
		else{
			$this->load->view('view_error');
		}
	}
	
	public function del($id)
	{
		if($this->session->userdata('usertype')=='admin'){
			
		}
		else{
			$this->load->view('view_error');
		}
	}
	public function mealcheck($str)
	{
		if($this->session->userdata('usertype')){
			$month=date('m');
			$user=$this->session->userdata('name');
			$this->mealmodel->setmealcheck($str,$user);
			redirect( base_url()."home/user/".$month);
		}
		else{
			$this->load->view('view_error');
		}
	}
	public function mealcancel($str)
	{
		if($this->session->userdata('usertype')){
			$month=date('m');
			$this->mealmodel->mealcancel($str);
			$user=$this->session->userdata('name');
			$this->mealmodel->setmealcheck($str,$user);
			redirect( base_url()."home/user/".$month);
		}
		else{
			$this->load->view('view_error');
		}
	}
	public function checkall()
	{
		date_default_timezone_set('Asia/Dhaka');
		$date=date('Y-m-d');
		if($this->session->userdata('usertype')=='manager'){
			$month=date('m');
			$this->mealmodel->confirmmeal($date);
			$this->mealmodel->updatemealcheck();
			redirect( base_url()."home/user/".$month);
		}
		else{
			$this->load->view('view_error');
		}
	}
	
	
}