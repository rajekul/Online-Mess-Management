<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Action extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
		$this->load->model('actionmodel');
	}

	public function index()
	{
		if($this->session->userdata('usertype')!='admin'){
			$this->load->view('view_error');
		}
		else{
			$month=date('Y-m');
			if(!($this->input->post('buttonSubmit') || $this->input->post('buttonEdit'))){
				$data['message']='';
				if(!$data['action']=$this->actionmodel->get($month)){
					$action['action']='';
					$action['day']='';
					$data['action']=$action;
					$data['button']='<input type="submit" name="buttonSubmit" value="Save" class="btn btn-primary"/>';
				}
				else{
					$data['button']='<input type="submit" name="buttonEdit" value="Update" class="btn btn-primary"/>';
				}
				
				$this->load->view("view_action",$data);
			}
			else{	
				if(!$this->form_validation->run('action')){
					$data['message']=validation_errors();
					if(!$data['action']=$this->actionmodel->get($month)){
						$action['action']='';
						$action['day']='';
						$data['action']=$action;
						$data['button']='<input type="submit" name="buttonSubmit" value="Save" class="btn btn-primary"/>';
					}
					else{
						$data['button']='<input type="submit" name="buttonEdit" value="Update" class="btn btn-primary"/>';
					}
					$this->load->view("view_action",$data);
				}
				else{
					$meal=$this->input->post('meal');
					$day=$this->input->post('day');
					if($this->input->post('buttonSubmit')){
						$this->actionmodel->insert($meal,$day,$month);
					}
					else if($this->input->post('buttonEdit')){
						$this->actionmodel->update($meal,$day,$month);
					}
					redirect( base_url()."action");
				}
				
			}
		}	
	}
}