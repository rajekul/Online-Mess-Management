<!DOCTYPE html>
<html>
	<head>
		<title>MealInfo</title>
	<head>
	<body>
		<?php 
			$permission='';
			$this->load->view('view_master'); 
			if($this->session->userdata('usertype')=='manager'){
				$permission='&nbsp&nbsp
				<a href="'.base_url().'meal/all" class="btn btn-info" role="button">View All Meal</a>';
			}
		?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> MealInfo</h4></legend>
		<div class="col-sm-8">
			<a href="<?php echo base_url(); ?>meal/add/<?php echo $id; ?>" class="btn btn-primary" role="button">Send Meal Request</a><?php echo $permission; ?>
			<br/><br/>
			<span style="color:green"><h4>Total Meal: <?php echo $totalmeal['meals']?></h4></span>
			<table class="table table-bordered">
				<tr>
					<th>Date</th>
					<th>Breakfast</th> 
					<th>lunch</th>
					<th>Dinner</th>
				</tr>
			{meals}
				<tr>
					<td>{date}</td>
					<td>{breakfast}</td>
					<td>{lunch}</td>
					<td>{dinner}</td>
				</tr>
			{/meals}
			</table>
		</div>
	</body>
</html>