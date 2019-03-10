<!DOCTYPE html>
<html>
	<head>
		<title>profile</title>
	<head>
	<body>
		<?php
			$this->load->view('view_master');
		?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Profile</h4></legend>
		<div class="row">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-4">
				<form method="post">
					<table  class="table">
						<th colspan="2"><u>{name}</u></th>
						<tr>
							<td>ID</td>
							<td>: {id}</td><input type="hidden" name="id" size="30" value="{id}">
						</tr>
						<tr>
							<td>Name</td>
							<td>: {name}</td>
						</tr>
						<tr>
							<td>Phone</td>
							<td><input type="text" class="form-control" name="phone" size="30" value="{phone}"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" class="form-control" name="email" size="30" value="{email}"></td>
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
						<tr>
							<td></td>
							<td><input type="submit" name="buttonSubmit" value="Change Contact" class="btn btn-primary" /></td>
						</tr>
					</table>
				</form>
			</div>
			<div class="col-sm-2">
				<img border="1" align="right" src="<?php echo base_url(); ?>public/{photo}" width="150" height="170"/>
			</div>
	</body>
</html>