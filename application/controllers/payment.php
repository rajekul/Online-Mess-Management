<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
		$this->load->model('paymodel');
		$this->load->model('membermodel');
	}

	public function index()
	{
		if(!$this->session->userdata('usertype')){
			$this->load->view('view_error');
		}
		else{
			if($this->session->userdata('usertype')=='admin'){
				$this->load->view('view_error');
			}
			else{
				$year=date('Y');
				$month=date('m');
				$data['payments']=$this->paymodel->get($this->session->userdata('username'),$year,$month);
				$this->parser->parse("view_payments",$data);
			}
			
		}	
	}
	public function all(){
		if($this->session->userdata('usertype')=='admin'||$this->session->userdata('usertype')=='manager'){
			$year=date('Y');
			$month=date('m');
			$data['payments']=$this->paymodel->getAll($year,$month);
			
			$data['total']=$this->paymodel->monthlyPayment($year,$month);
			$members=$this->membermodel->getAll();
			$memberpay='';
			foreach($members as $member){
				$pays=$this->paymodel->getsumbyid($member['id'],$year,$month);
				$memberpay.='<tr>
					<td>'.$member['name'].'</td>
					<td>'.$pays['pays'].'</td>
				</tr>';
			}
			$data['memberpay']=$memberpay;
			$this->parser->parse('view_allpayments',$data);
		}
		else{
			$this->load->view('view_error');
		}
	}

	public function add()
	{
		if($this->session->userdata('usertype')!='manager'){
			$this->load->view('view_error');
		}
		else{
			if(!$this->input->post('buttonSubmit')){
				$data['message']="";
				$data['member']=$this->membermodel->getAll();
				$this->parser->parse('view_addpayment',$data);
			}
			else{
				if(!$this->form_validation->run('payment')){
					$data['message']=validation_errors();
					$data['member']=$this->membermodel->getAll();
					$this->parser->parse('view_addpayment',$data);
				}
				else{
					date_default_timezone_set('Asia/Dhaka');
					$date=date('Y-m-d');
					$year=date('Y');
					$userid=$this->input->post('member');
					$amount=$this->input->post('amount');
					$ramount=$this->input->post('ramount');
					$method=$this->input->post('method');
					$month=$this->input->post('month');
					$payfor=$year.'-'.$month;
					$this->paymodel->insert($date,$userid,$amount,$ramount,$method,$payfor);
					redirect( base_url()."payment");
				}
			}
		}
	}
	public function del($id='')
	{
		if(!$this->session->userdata('usertype')){
			$this->load->view('view_error');
		}
		else{
			
		}
	}
	
}