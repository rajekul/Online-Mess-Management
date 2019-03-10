<!DOCTYPE html>
<html>
	<head>
		<title>Member profile | Admin</title>
	<head>
	<body>
		<?php 
			$this->load->view('view_adminmaster');
		?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Member Profile</h4></legend>
		<div class="row">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-4">
				<table  class="table">
					<thead colspan="2"><h4>{name}</h4></thead>
					<tr>
						<td>ID</td>
						<td>: {id}</td>
					</tr>
					<tr>
						<td>Name</td>
						<td>: {name}</td>
					</tr>
					<tr>
						<td>Phone</td>
						<td>: {phone}</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>: {email}</td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>: {gender}</td>
					</tr>
					<tr>
						<td>Profession</td>
						<td>: {profession}</td>
					</tr>
					<tr>
						<td>NID No</td>
						<td>: {nid}</td>
					</tr>
					<tr>
						<td>Address</td>
						<td>: {address}</td>
					</tr>
				</table>
			</div>
			<div class="col-sm-2">	
				<img border="1" align="right" src="<?php echo base_url(); ?>public/{photo}" width="150" height="170"/>
			</div>
		</div>
	</div><br/>
	</body>
</html>