<!DOCTYPE html>
<html>
	<head>
		<title>MealInfo</title>
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
		<legend><h4><span class="glyphicon glyphicon-forward"></span> All MealInfo</h4></legend>
		<div class="row">
			<div class="col-sm-4">
				<table class="table table-bordered">
					<tr>
						<td colspan="2">Totals</td>
					</tr>
					<tr>
						<th>Member</th>
						<th>Meal</th>
					</tr>
					<?php echo $membermeal; ?>
					<tr>
						<td>Total</td>
						<td><?php echo $total['meal'];?></td>
					</tr>
				</table>
			</div>
			<div class="col-sm-6">
				<table class="table table-bordered">
					<tr>
						<td colspan="5">Details</td>
					</tr>
					<tr>
						<th>Date</th>
						<th>Member</th>
						<th>Breakfast</th>
						<th>lunch</th>
						<th>Dinner</th>
					</tr>
				{meals}
					<tr>
						<td>{date}</td>
						<td>{name}</td>
						<td>{breakfast}</td>
						<td>{lunch}</td>
						<td>{dinner}</td>
					</tr>
				{/meals}
				</table>
			</div>
	</body>
</html>