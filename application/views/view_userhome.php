<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
	<head>
	<body>
		<?php $this->load->view('view_master'); ?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> HOME</h4></legend>
		<div class="row">
			<div class="col-sm-4">
				<h3><span class="glyphicon glyphicon-calendar"><?php echo $monthName; ?></span></h3>
			</div>
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4">
				<ul class="btn btn-default" style="list-style-type: none;">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" >Select Month <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url(); ?>home/user/01">January</a></li>
							<li><a href="<?php echo base_url(); ?>home/user/02">February</a></li>
							<li><a href="<?php echo base_url(); ?>home/user/03">March</a></li>
							<li><a href="<?php echo base_url(); ?>home/user/04">April</a></li>
							<li><a href="<?php echo base_url(); ?>home/user/05">May</a></li>
							<li><a href="<?php echo base_url(); ?>home/user/06">June</a></li>
							<li><a href="<?php echo base_url(); ?>home/user/07">July</a></li>
							<li><a href="<?php echo base_url(); ?>home/user/08">Agust</a></li>
							<li><a href="<?php echo base_url(); ?>home/user/09">September</a></li>
							<li><a href="<?php echo base_url(); ?>home/user/10">October</a></li>
							<li><a href="<?php echo base_url(); ?>home/user/11">November</a></li>
							<li><a href="<?php echo base_url(); ?>home/user/12">December</a></li>
						</ul>
					</li>
				</ul><br/><br/>
			</div>
		</div><hr/>
			<div class="row">
				<div class="col-sm-6">
					<legend><h3>Meal Requests</h3></legend>
					<a href="<?php echo base_url(); ?>meal/add/<?php echo $this->session->userdata('username'); ?>" class="btn btn-primary" role="button">Send  a Meal Request</a><br/><br/>
					<?php echo $message; ?>
					<table class="table table-bordered" >
						<tr>
							<th>Name</th>
							<th>Breakfast</th>
							<th>Lunch</th>
							<th>Dinner</th>
						</tr>
					{meals}
						<tr>
							<td>{name}</td>
							<td>{breakfast}</td>
							<td>{lunch}</td>
							<td>{dinner}</td>
						</tr>
					{/meals}
					</table>
				</div>
				<div class="col-sm-4" style="background-color:#f2f2f2">
					<legend><h3>Overview</h3></legend>
					<table class="table" >
						<tr>
							<td>TotalBazarCost:</td>
							<td>{totalcost}</td>
						</tr>
						<tr>
							<td>TotalMeal:</td>
							<td>{totalmeal}</td>
						</tr>
						<tr style="background-color:#ffb31a;">
							<td>Mealrate</td>
							<td>{mealrate}</td>
						</tr>
						<tr>
							<td>Total Pay:</td>
							<td>{totalpay}</td>
						</tr>
						<tr style="background-color:#6666ff;">
							<td>Available Balance:</td>
							<td>{abalance}</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-4" style="color:red">
					<legend><h2>Dues</h2></legend>
					<table class="table table-bordered">
					<tr>
						<th>Name</th>
						<th>Due</th>
					</tr>
					<?php echo $dues; ?>
					</table>
				</div>
				<div class="col-sm-8">
					<legend><h2>Detail View</h2></legend>
					<table class="table table-bordered" >
					<tr>
						<th>Name</th>
						<th>TotalMeal</th>
						<th>MealCost</th>
						<th>Paid</th>
						<th>Due</th>
					</tr>
					<?php echo $detail; ?>
					</table>
				</div>
			</div>
			<?php echo $bazars; ?><br/>
		</div><br/><br/>
	</body>
</html>