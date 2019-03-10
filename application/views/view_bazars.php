<!DOCTYPE html>
<html>
	<head>
		<title>Bazar</title>
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
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Bazars</h4></legend>
		<div class="col-sm-6">
			<a href="<?php echo base_url(); ?>bazar/add" class="btn btn-primary" role="button">Add Bazar</a><br/><br/>
		</div>
		<div class="col-sm-8">
			<table class="table table-bordered">
				<tr>
					<th>Date</th>
					<th>Member</th>
					<th>Product</th>
					<th>weight</th>
					<th>Price</th>
				</tr>
			{bazar}
				<tr>
					<td>{date}</td>
					<td>{name}</td>
					<td>{p_name}</td>
					<td>{weight} ({unit})</td>
					<td>{price}</td>
				</tr>
			{/bazar}
			<tr>
				<td align="right" colspan="4">Total</td>
				<td><?php echo $total; ?></td>
			</tr>
			</table>
		</div>
	</body>
</html>