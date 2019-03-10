<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('productmodel');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
	}

	public function index($month)
	{
		if($this->session->userdata('usertype')!='admin'){
			$this->load->view('view_error');
		}
		else{
			$data['products']='';
			$year=date('Y');
			if(!$this->input->post('buttonSubmit')){
				$data['message']="";
				$product=$this->productmodel->getAll();
				foreach($product as $pro){
					$prodetail=$this->productmodel->getdetail($pro['p_id'],$year,$month);
					$data['products'].='
					<tr>
						<td>'.$pro['p_id'].'</td>
						<td>'.$pro['p_name'].'</td>
						<td>'.$pro['unit'].'</td>
						<td>'.$prodetail['weight'].'</td>
						<td>'.$prodetail['price'].'</td>
						<td>
							<a href="/mess/product/edit/'.$pro['p_id'].'">Edit</a>&nbsp
							<a href="/mess/product/del/'.$pro['p_id'].'">Delete</a>
						</td>
					</tr>';
				}
				$this->parser->parse('view_products',$data);
			}
			else{
				$month=date('m');
				if(!$this->form_validation->run('product')){
					$data['message']=validation_errors();
					$product=$this->productmodel->getAll();
					foreach($product as $pro){
						$prodetail=$this->productmodel->getdetail($pro['p_id'],$year,$month);
						$data['products'].='
						<tr>
							<td>'.$pro['p_id'].'</td>
							<td>'.$pro['p_name'].'</td>
							<td>'.$pro['unit'].'</td>
							<td>'.$prodetail['weight'].'</td>
							<td>'.$prodetail['price'].'</td>
							<td>
								<a href="/mess/product/edit/'.$pro['p_id'].'">Edit</a>&nbsp
								<a href="/mess/product/del/'.$pro['p_id'].'">Delete</a>
							</td>
						</tr>';
					}
					$this->parser->parse('view_products',$data);
				}
				else{
					$name=$this->input->post('name');
					$unit=$this->input->post('unit');
					$this->productmodel->insert($name,$unit);
					redirect( base_url()."product/index/".$month);
				}
				
			}
		}	
	}

	public function edit($id='')
	{
		if($this->session->userdata('usertype')!='admin'){
			$this->load->view('view_error');
		}
		else{
			if(!$this->input->post('buttonSubmit')){
				$data['message']="";
				$data['product']=$this->productmodel->get($id);
				$this->parser->parse('view_editproduct',$data);
			}
			else{
				$month=date('m');
				$id=$this->input->post('id');
				$name=$this->input->post('name');
				$unit=$this->input->post('unit');
				$this->productmodel->update($id,$name,$unit);
				redirect( base_url()."product/index/".$month);
				
			}
		}
	}
	public function del($id='')
	{
		if($this->session->userdata('usertype')!='admin'){
			$this->load->view('view_error');
		}
		else{	
			if(!$this->input->post('buttonSubmit')){
				$data['product']=$this->productmodel->get($id);
				$this->parser->parse('view_deleteproduct',$data);
			}
			else{
				$month=date('m');
				$this->input->post('id');
				$this->productmodel->del($id);
				redirect( base_url()."product/index/".$month);
			}
		}
	}
	
}