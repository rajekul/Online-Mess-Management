<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bazar extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
		$this->load->model('bazarmodel');
		$this->load->model('productmodel');
	}
	public function index()
	{
		if($this->session->userdata('usertype')){
			$year=date('Y');
			$month=date('m');
			$cost=$this->bazarmodel->monthlyBazar($year,$month);
			$data['bazar']=$this->bazarmodel->get($year,$month);
			$data['total']=$cost['cost'];
			$this->parser->parse('view_bazars',$data);
		}
		else{
			$this->load->view('view_error');
		}
	}
	public function add(){
		if($this->session->userdata('usertype')){
			if($this->input->post('submit')){
				if(!$this->form_validation->run('bazar')){
					$data['productdetails']=validation_errors();
					$this->load->view('view_addbazar',$data);
				}
				else{
					$product=$this->productmodel->getAll();
					$products='';
					foreach($product as $pro){
						$products.='<option value="'.$pro['p_id'].'">'.$pro['p_name'].'('.$pro['unit'].')</option><br/>';
					}
					$data['productdetails']='
					<div class="col-sm-6">
						<form method="post">
							<legend><h3>Enter Bazar Details</h3></legend>
							<table class="table" style="background-color:#d9d9d9">
								<tr>
									<td>NO</td>
									<td>Product(unit)</td>
									<td>Weight</td>
									<td>Price</td>
								</tr>';
					$amount=$this->input->post('amount');
					for($i=1;$i<=$amount;$i++){
						$data['productdetails'].='
						<tr>
							<td>'.$i.'</td>
							<td>
								<select name="p_id'.$i.'" class="form-control">'.$products.'</select>
							</td>
							<td>
								<input type="text" name="weight'.$i.'" class="form-control"/>
							</td>
							<td>
								<input type="text" name="price'.$i.'" class="form-control"/>
							</td>
						</tr>';
					}
					$data['productdetails'].='<input type="hidden" name="amount" value="'.$amount.'"/>
						<tr>
							<td align="right" colspan="4"><input type="submit" name="buttonSubmit" value="Submit" class="btn btn-primary"/></td>
						</tr>
					</table>
					</form>
					</div>';
					$this->load->view('view_addbazar',$data);

				}
			}
			else if($this->input->post('buttonSubmit')){
				$userid=$this->session->userdata('username');
				$amount=$this->input->post('amount');
				for($i=1;$i<=$amount;$i++){
					$p_id=$this->input->post('p_id'.$i);
					$weight=$this->input->post('weight'.$i);
					$price=$this->input->post('price'.$i);
					$this->bazarmodel->insert($userid,$p_id,$weight,$price);
				}
				redirect( base_url()."bazar");
			}
			else{
				$data['productdetails']='';
				$this->load->view('view_addbazar',$data);
			}
		}
		else{
			$this->load->view('view_error');
		}
	}
	public function update(){
		date_default_timezone_set('Asia/Dhaka');
		$date=date('Y-m-d');
		$month=date('m');
		$this->bazarmodel->update($date);
		redirect( base_url()."home/user/".$month);
	}
	public function del(){
		$this->bazarmodel->del();
		$month=date('m');
		redirect( base_url()."home/user/".$month);
	}
}