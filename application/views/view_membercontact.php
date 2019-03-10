<!DOCTYPE html>
<html>
	<head>
		<title>Members</title>
	<head>
	<body>
		<?php $this->load->view('view_master'); ?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Members</h4></legend>
		<div class="col-sm-8">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
			{member}
					<tr>
						<td><img src="<?php echo base_url(); ?>public/{photo}" width="45" height="45"/></td>
						<td>{name}</td>
						<td>{phone}</td>
						<td>{email}</td>
					</tr>
			{/member}
				<tbody>
			</table>
		</div>
	</body>
</html>