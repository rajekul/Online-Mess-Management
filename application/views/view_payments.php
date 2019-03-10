<!DOCTYPE html>
<html>
	<head>
		<title>Payment</title>
	<head>
	<body>
		<?php 
			$permission='';
			$this->load->view('view_master'); 
			if($this->session->userdata('usertype')=='manager'){
				$permission='<a href="'.base_url().'payment/add" class="btn btn-primary" role="button">Add payments</a>&nbsp&nbsp
				<a href="'.base_url().'payment/all" class="btn btn-primary" role="button">View All Payments</a><br/><br/>';
			}
		?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Payments</h4></legend>
		<div class="col-sm-8">
			<?php echo $permission ?>
			<table class="table table-bordered">
				<tr>
					<th>Date</th> 
					<th>Payment</th>
					<th>Return</th>
					<th>Method</th>
				</tr>
			{payments}
				<tr>
					<td>{date}</td>
					<td>{amountReceive}</td>
					<td>{amountReturn}</td>
					<td>{paymethod}</td>
				</tr>
			{/payments}
			</table>
		</div>
	</body>
</html>