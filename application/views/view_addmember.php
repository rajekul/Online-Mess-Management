<!DOCTYPE html>
<html>
	<head>
		<title>Add member | Admin</title>
	<head>
	<body>
		<?php $this->load->view('view_adminmaster'); ?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Add Member</h4></legend>
		<span style="color:red"><?php echo $message; ?></span><br/>
		<div class="col-sm-6">
			<form method="post" enctype="multipart/form-data">
				<table class="table">
					<thead colspan="2"><h4>Member Entry Form</h4></thead>
					<tr>
						<td>ID<span style="color:red">*</span></td>
						<td><input type="text" name="id" class="form-control" value="<?php echo set_value('id'); ?>" placeholder="5 character length"/></td>
					</tr>
					<tr>
						<td>Name<span style="color:red">*</span></td>
						<td><input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>"/></td>
					</tr>
					<tr>
						<td>Phone<span style="color:red">*</span></td>
						<td><input type="text" name="phone" class="form-control" value="<?php echo set_value('phone'); ?>"/></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>"/></td>
					</tr>
					<tr>
						<td>Gender<span style="color:red">*</span></td>
						<td>
							<input type="radio" name="gender" value="male" <?php echo set_radio('gender','male'); ?>/>Male&nbsp
							<input type="radio" name="gender" value="female" <?php echo set_radio('gender','female'); ?>/>Female&nbsp
							<input type="radio" name="gender" value="other" <?php echo set_radio('gender','other'); ?>/>Other
						</td>
					</tr>
					<tr>
						<td>Profession</td>
						<td>
							<select name="profession" class="form-control">
								<option value="Student"  <?php  echo set_select('profession', 'Student'); ?>>Student</option>
								<option value="Employee"<?php echo set_select('profession', 'Employee'); ?>>Employee</option>
								<option value="Businessman" <?php echo set_select('profession', 'Businessman'); ?>>Businessman</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>NID no</td>
						<td><input type="text" name="nid" class="form-control" value="<?php echo set_value('nid'); ?>"/></td>
					</tr>
					<tr>
						<td>Address<span style="color:red">*</span></td>
						<td>
							<input type="text" name="address" class="form-control" value="<?php echo set_value('address'); ?>"/>
						</td>
					</tr>
					<tr>
						<td>Password<span style="color:red">*</span></td>
						<td><input type="text" name="password" class="form-control" value="<?php echo set_value('password'); ?>"/></td>
					</tr>
					<tr>
						<td>Photo<span style="color:red"></span></td>
						<td><input type="file" name="photo"/></td>
					</tr>
					
					<tr>
						<td></td>
						<td align="right"><input type="submit" name="buttonSubmit" class="btn btn-primary" value="Save"/></td>
					</tr>
				</table>
			</form>
		</div>
	</div><br/>
	</body>
</html>