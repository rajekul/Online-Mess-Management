<!DOCTYPE html>
<html>
	<head>
		<title>Members | Admin</title>
	<head>
	<body>
		<?php $this->load->view('view_adminmaster'); ?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Members</h4></legend>
		<a href="<?php echo base_url(); ?>member/add" class="btn btn-primary" role="button">Add New Member</a><br/><br/>
		<div class="col-sm-8">
			<table class="table table-hover">
				<thead>	
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
			{member}
				<tr>
					<td>{id}</td>
					<td>{name}</td>
					<td>{phone}</td>
					<td>{email}</td>
					<td>
						<a href="<?php echo base_url(); ?>member/profile/{id}" class="btn btn-info" role="button">Profile</a>&nbsp
						<a href="<?php echo base_url(); ?>member/edit/{id}" class="btn btn-default" role="button">Edit</a>&nbsp
						<a href="<?php echo base_url(); ?>member/del/{id}" class="btn btn-danger" role="button">Delete</a>
					</td>
				</tr>
			{/member}
			</table>
		</div>
	</body>
</html>