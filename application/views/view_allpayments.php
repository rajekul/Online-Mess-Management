<!DOCTYPE html>
<html>
	<head>
		<title>PaymentInfo</title>
	<head>
	<body>
		<?php 
			if($this->session->userdata('usertype')=='admin'){
				$this->load->view('view_adminmaster'); 
			}
			else{
				$this->load->view('view_master'); 
			}	
		?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> PaymentInfo</h4></legend>
		<div class="row">
			<div class="col-sm-4">
				<table class="table table-bordered">
					<tr>
						<td colspan="2">Totals</td>
					</tr>
					<tr>
						<th>Member</th>
						<th>Paid</th>
					</tr>
					<?php echo $memberpay; ?>
					<tr>
						<td>Total</td>
						<td><?php echo $total['pay'];?></td>
					</tr>
				</table>
			</div>
			<div class="col-sm-6">
				<table class="table table-bordered">
					<tr>
						<td colspan="5">Details</td>
					</tr>
					<tr>
						<th>Member</th>
						<th>Date</th>
						<th>Pay</th>
						<th>Return</th>
					</tr>
				{payments}
					<tr>
						<td>{name}</td>
						<td>{date}</td>
						<td>{amountReceive}</td>
						<td>{amountReturn}</td>
					</tr>
				{/payments}
				</table>
			</div>
		</div>
		
	</body>
</html>