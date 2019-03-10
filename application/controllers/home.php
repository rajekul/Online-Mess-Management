<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
		$this->load->model('messmodel');
		$this->load->model('mealmodel');
		$this->load->model('bazarmodel');
		$this->load->model('paymodel');
		$this->load->model('membermodel');
		$this->load->model('usermodel');
		$this->load->model('actionmodel');
		
	}
	public function index()
	{
		$this->load->view('view_error');
	}
	
	public function admin($month)
	{
		if($this->session->userdata('usertype')=='admin'){
			if(!$this->input->post('buttonSubmit')){
				$data['monthName'] = date("F", mktime(0, 0, 0, $month, 10));
				$year=date('Y');
				$day=date('d');
				$cm=date('m');
				$cost=$this->bazarmodel->monthlyBazar($year,$month);
				$meal=$this->mealmodel->monthlyMeal($year,$month);
				$pay=$this->paymodel->monthlyPayment($year,$month);
				$data['totalcost']=$cost['cost'];
				$data['totalmeal']=$meal['meal'];
				$mealrate=0;
				if($data['totalcost']!=null && $data['totalmeal']!=null){$mealrate=$data['totalcost']/$data['totalmeal'];}
				$data['mealrate']=intval($mealrate);
				$data['abalance']=$pay['pay']-$cost['cost'];
				$data['totalpay']=$pay['pay'];
				$members=$this->membermodel->getAll();
				$dues='';
				$manager='';
				$details='';
				$mn=$year.'-'.$month;
				
				if($mealaction=$this->actionmodel->get($mn)){
					
					$minmeal=$mealaction['action'];
					$d=$mealaction['day'];
				}
				else{
					$minmeal=0;
					$d=0;
				}
				
				foreach($members as $member){
					$meals=$this->mealmodel->getsumbyid($member['id'],$year,$month);
					$meal=$meals['meals'];
					if($month<$cm){
						if($meal<$minmeal){
							$meal=$minmeal;
						}
					}
					else if($day>$d){
						if($meal<$minmeal){
							$meal=$minmeal;
						}
					}
					$pays=$this->paymodel->getsumbyid($member['id'],$year,$month);
					$mealcost=$meal*$mealrate;
					$due=$mealcost-$pays['pays'];
					if($due<=0){
						$due=0;
					}
					$dues.='<tr>
								<td>'.$member['name'].'</td>
								<td>'.intval($due).'</td>
							</tr>';
					$manager.='<option value="'.$member['id'].'">'.$member['name'].'</option>';
					$details.='<tr>
						<td>'.$member['name'].'</td>
						<td>'.$meal.'</td>
						<td>'.intval($mealcost).'</td>
						<td>'.$pays['pays'].'</td>
						<td>'.intval($due).'</td>
					</tr>';
				}
				$data['manager']=$manager;
				$data['dues']=$dues;
				$data['detail']=$details;
				$data['managername']=$this->usermodel->getmanager();
				$this->parser->parse('view_adminhome',$data);

			}
			else{
				$month=date('m');
				$id=$this->input->post('id');
				$this->usermodel->updatetype($id);
				redirect( base_url()."home/admin/".$month);
			}
		}
		else{
			$this->load->view('view_error');
		}
	}
	public function user($month)
	{
		$data['monthName'] = date("F", mktime(0, 0, 0, $month, 10));
		$year=date('Y');
		$day=date('d');
		$cm=date('m');
		$cost=$this->bazarmodel->monthlyBazar($year,$month);
		$meal=$this->mealmodel->monthlyMeal($year,$month);
		$pay=$this->paymodel->monthlyPayment($year,$month);
		$data['totalcost']=$cost['cost'];
		$data['totalmeal']=$meal['meal'];
		$mealrate=0;
		if($data['totalcost']!=null && $data['totalmeal']!=null){$mealrate=$data['totalcost']/$data['totalmeal'];}	
		$data['mealrate']=intval($mealrate);
		$data['abalance']=$pay['pay']-$cost['cost'];
		$data['totalpay']=$pay['pay'];
		$members=$this->membermodel->getAll();
		$dues='';
		$details='';
		$mn=$year.'-'.$month;
		if($mealaction=$this->actionmodel->get($mn)){
			$minmeal=$mealaction['action'];
			$d=$mealaction['day'];
		}
		else{
			$minmeal=0;
			$d=0;
		}
		foreach($members as $member){
			$meals=$this->mealmodel->getsumbyid($member['id'],$year,$month);
			$meal=$meals['meals'];
			if($month<$cm){
				if($meal<$minmeal){
					$meal=$minmeal;
				}
			}
			else if($day>$d){
				if($meal<$minmeal){
					$meal=$minmeal;
				}
			}
			$pays=$this->paymodel->getsumbyid($member['id'],$year,$month);
			$mealcost=$meal*$mealrate;
			$due=$mealcost-$pays['pays'];
			if($due<=0){
				$due=0;
			}
			$dues.='<tr>
						<td>'.$member['name'].'</td>
						<td>'.intval($due).'</td>
					</tr>';
			$details.='<tr>
					<td>'.$member['name'].'</td>
					<td>'.$meal.'</td>
					<td>'.intval($mealcost).'</td>
					<td>'.$pays['pays'].'</td>
					<td>'.intval($due).'</td>
				</tr>';
		}
		$data['dues']=$dues;
		$data['detail']=$details;
		if($this->session->userdata('usertype')=='manager'){
			if(!$data['meals']=$this->mealmodel->getpendingmeal()){
				$data['message']='<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Info!</strong> No pending Request....
				  </div>';
			}
			else{
				date_default_timezone_set('Asia/Dhaka');
				$breakfast=0;
				$lunch=0;
				$dinner=0;
				foreach($data['meals'] as $meal){
					$breakfast+=$meal['breakfast'];
					$lunch+=$meal['lunch'];
					$dinner+=$meal['dinner'];
				}
				$mealcheck=$this->mealmodel->getmealcheck();
				
				$data['message']='<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Warning!</strong> Once you confirm meal request it can not be undone...
				  </div>';
				if($mealcheck['breakfast']=='uncheck'){
					$data['message'].='<span style="color:purple">Breakfast&nbsp<span class="badge">'.$breakfast.'</span></span>&nbsp&nbsp&nbsp
				<a href="/mess/meal/mealcheck/breakfast" class="btn btn-info" role="button">Confirm</a>
				&nbsp&nbsp<a href="/mess/meal/mealcancel/breakfast" class="btn btn-danger" role="button">Cancel</a><br/><br/>';
				}
				else{
					$data['message'].='<span style="color:purple">Breakfast&nbsp<span class="badge">'.$breakfast.'</span></span>&nbsp&nbsp&nbsp
				Checked By '.$mealcheck['breakfast'].'<br/><br/>';
				}
				if($mealcheck['lunch']=='uncheck'){
					$data['message'].='<span style="color:green">Lunch&nbsp<span class="badge">'.$lunch.'</span></span>&nbsp&nbsp&nbsp
				<a href="/mess/meal/mealcheck/lunch" class="btn btn-info" role="button">Confirm</a>&nbsp&nbsp<a href="/mess/meal/mealcancel/lunch" class="btn btn-danger" role="button">Cancel</a><br/><br/>';
				}
				else{
					$data['message'].='<span style="color:green">Lunch&nbsp<span class="badge">'.$lunch.'</span></span>&nbsp&nbsp&nbsp
				Checked By '.$mealcheck['lunch'].'<br/><br/>';
				}
				if($mealcheck['dinner']=='uncheck'){
					$data['message'].='<span style="color:blue">Dinner&nbsp<span class="badge">'.$dinner.'</span></span>&nbsp&nbsp&nbsp
				<a href="/mess/meal/mealcheck/dinner" class="btn btn-info" role="button">Confirm</a>&nbsp&nbsp<a href="/mess/meal/mealcancel/dinner" class="btn btn-danger" role="button">Cancel</a><br/><br/>';
				}
				else{
					$data['message'].='<span style="color:blue">Dinner&nbsp<span class="badge">'.$dinner.'</span></span>&nbsp&nbsp&nbsp
				Checked By '.$mealcheck['dinner'].'<br/><br/>';
				}
				$data['message'].='<br/><a align="right" href="/mess/meal/checkall" class="btn btn-info" role="button">Confirm All</a><br/><br/>';
				
			}
			$bazars='<div class="col-sm-8" style="background-color:#f2f2f2">
						<legend><h2>Pending Bazar</h2></legend>
						<table class="table table-bordered" width="100%">
						<tr>
							<th>Product</th>
							<th>Weight</th>
							<th>Price</th>
							<th>BoughtBy</th>';
			$bazarpending=$this->bazarmodel->getpending();
			$pendingcost=$this->bazarmodel->pendingtotal();
			foreach($bazarpending as $bazar){
				$bazars.='<tr>
							<td>'.$bazar['p_name'].'</td>
							<td>'.$bazar['weight'].' ('.$bazar['unit'].')</td>
							<td>'.$bazar['price'].'</td>
							<td>'.$bazar['name'].'</td>
						</tr>';
			}
			$bazars.='<tr>
					<td align="right" colspan="2">Total=</td>
					<td>'.$pendingcost['cost'].'</td>
					</tr>
					</table>
					<a href="/mess/bazar/del" class="btn btn-danger" role="button">Cancel</a>&nbsp&nbsp&nbsp
					<a href="/mess/bazar/update" class="btn btn-info" role="button">Confirm</a>
					</div>';
			$data['bazars']=$bazars;
			$this->parser->parse('view_userhome',$data);
		}
		else if($this->session->userdata('usertype')=='user'){
			if(!$data['meals']=$this->mealmodel->getpendingmeal()){
				$data['message']='<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Info!</strong> No pending Request....
				  </div>';
			}
			else{
				$breakfast=0;
				$lunch=0;
				$dinner=0;
				foreach($data['meals'] as $meal){
					$breakfast+=$meal['breakfast'];
					$lunch+=$meal['lunch'];
					$dinner+=$meal['dinner'];
				}
				$mealcheck=$this->mealmodel->getmealcheck();
				
				$data['message']='<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Warning!</strong> Once you confirm meal request it can not be undone...
				  </div>';
				if($mealcheck['breakfast']=='uncheck'){
					$data['message'].='<span style="color:purple">Breakfast&nbsp<span class="badge">'.$breakfast.'</span></span>&nbsp&nbsp&nbsp
				<a href="/mess/meal/mealcheck/breakfast" class="btn btn-info" role="button">Confirm</a>&nbsp&nbsp<a href="/mess/meal/mealcancel/breakfast" class="btn btn-danger" role="button">Cancel</a><br/><br/>';
				}
				else{
					$data['message'].='<span style="color:purple">Breakfast&nbsp<span class="badge">'.$breakfast.'</span></span>&nbsp&nbsp&nbsp
				Checked By '.$mealcheck['breakfast'].'<br/><br/>';
				}
				if($mealcheck['lunch']=='uncheck'){
					$data['message'].='<span style="color:green">Lunch&nbsp<span class="badge">'.$lunch.'</span></span>&nbsp&nbsp&nbsp
				<a href="/mess/meal/mealcheck/lunch" class="btn btn-info" role="button">Confirm</a>&nbsp&nbsp<a href="/mess/meal/mealcancel/lunch" class="btn btn-danger" role="button">Cancel</a><br/><br/>';
				}
				else{
					$data['message'].='<span style="color:green">Lunch&nbsp<span class="badge">'.$lunch.'</span></span>&nbsp&nbsp&nbsp
				Checked By '.$mealcheck['lunch'].'<br/><br/>';
				}
				if($mealcheck['dinner']=='uncheck'){
					$data['message'].='<span style="color:blue">Dinner&nbsp<span class="badge">'.$dinner.'</span></span>&nbsp&nbsp&nbsp
				<a href="/mess/meal/mealcheck/dinner" class="btn btn-info" role="button">Confirm</a>&nbsp&nbsp<a href="/mess/meal/mealcancel/dinner" class="btn btn-danger" role="button">Cancel</a><br/><br/>';
				}
				else{
					$data['message'].='<span style="color:blue">Dinner&nbsp<span class="badge">'.$dinner.'</span></span>&nbsp&nbsp&nbsp
				Checked By '.$mealcheck['dinner'].'<br/><br/>';
				}
				
			}
			$data['bazars']='';
			$this->parser->parse('view_userhome',$data);
		}
		else{
			$this->load->view('view_error');
		}
		
	}
	
	public function changepassword($id){
		if($this->session->userdata('usertype')){
			if(!$this->input->post('buttonSubmit')){
				$data['message']="";
				$data['id']=$id;
				$this->load->view('view_changepassword',$data);
			}
			else{
				if(!$this->form_validation->run('password')){
					$data['message']=validation_errors();
					$data['id']=$id;
					$this->load->view('view_changepassword',$data);
				}
				else{
					$id=$this->input->post('id');
					$password=$this->input->post('np');
					$this->usermodel->update($id,$password);
					redirect( base_url()."home/".$this->session->userdata('usertype'));
				}
			}
		}
		else{
			$this->load->view('view_error');
		}
	}
	public function messinfo(){
		if($this->session->userdata('usertype')=='admin'){
			if(!$this->input->post('buttonSubmit')){
				$data['mess']=$this->messmodel->get();
				$this->parser->parse('view_messinfo',$data);
			}
			else{
				$month=date('m');
				$title=$this->input->post('title');
				$house=$this->input->post('house');
				$road=$this->input->post('road');
				$area=$this->input->post('area');
				$city=$this->input->post('city');
				$this->messmodel->insert($title,$house,$road,$area,$city);
				redirect( base_url()."home/admin/".$month);
			}
		}
		else{
			$this->load->view('view_error');
		}
	}
	
	//password validation.................
	
	public function oldpass($str)
	{
		$id=$this->session->userdata('username');
		$this->load->model('usermodel');
		$user=$this->usermodel->get($id);
		if($user['password']==$str){
			return true;
		}
		else
		{
			$this->form_validation->set_message('oldpass', 'Current password is wrong');
			return false;
		}
	}
	public function newpass($str)
	{
		$pattern ="(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$)";
		
		if(preg_match($pattern, $str))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('newpass', '**Password should contain 1 uppercase 1 lowercase 1 digit');
			return false;
		}
	}
}