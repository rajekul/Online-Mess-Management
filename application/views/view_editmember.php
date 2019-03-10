<!DOCTYPE html>
<html>
	<head>
		<title>Edit member | Admin</title>
	<head>
	<body>
		<?php $this->load->view('view_adminmaster'); ?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Edit MemberInfo</h4></legend>
		<div class="row">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-4">
				<span style="color:red"><?php echo $message; ?></span><br/>
				<form method="post" enctype="multipart/form-data">
					<table  class="table">
						<thead colspan="2"><h4><?php echo $member['name']; ?></h4></thead>
						<tr>
							<td>ID<span style="color:red">*</span></td>
							<td><?php echo $member['id']; ?></td><input type="hidden" name="id" value="<?php echo $member['id']; ?>"/>
						</tr>
						<tr>
							<td>Name<span style="color:red">*</span></td>
							<td><input type="text" name="name" class="form-control" value="<?php echo $member['name']; ?>"/></td>
						</tr>
						<tr>
							<td>Phone<span style="color:red">*</span></td>
							<td><input type="text" name="phone" class="form-control" value="<?php echo $member['phone']; ?>"/></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" name="email" class="form-control" value="<?php echo $member['email'];; ?>"/></td>
						</tr>
						<tr>
							<td>Gender<span style="color:red">*</span></td>
							<td>
								<input type="radio" name="gender" value="male" <?php if($member['gender']=='male'){ echo set_radio('gender','male',TRUE); } ?>/>Male
								<input type="radio" name="gender" value="female" <?php if($member['gender']=='female'){ echo set_radio('gender','female',TRUE); } ?>/>Female
								<input type="radio" name="gender" value="other" <?php if($member['gender']=='other'){ echo set_radio('gender','other',TRUE); } ?>/>Other
							</td>
						</tr>
						<tr>
							<td>Profession</td>
							<td>
								<select name="profession" class="form-control">
									<option value="Student"  <?php if($member['profession']=='Student'){ echo set_select('profession', 'Student', TRUE);} ?>>Student</option>
									<option value="Employee"<?php if($member['profession']=='Employee'){echo set_select('profession', 'Employee', TRUE);} ?>>Employee</option>
									<option value="Businessman" <?php if($member['profession']=='Businessman'){echo set_select('profession', 'Businessman', TRUE);} ?>>Businessman</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>NID no</td>
							<td><input type="text" name="nid" class="form-control" value="<?php echo $member['nid'];; ?>"/></td>
						</tr>
						<tr>
							<td>Address<span style="color:red">*</span></td>
							<td>
								<input type="text" name="address" class="form-control" value="<?php echo $member['address'];; ?>"/>
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td align="right"><a href="<?php echo base_url(); ?>member/" class="btn btn-info" role="button">Back</a>&nbsp&nbsp&nbsp&nbsp
							<input type="submit" name="buttonSubmit" value="Submit" class="btn btn-primary"/></td>
						</tr>
					</table>
				</form>
			</div>
			<div class="col-sm-2">
				<img border="1" align="right" src="<?php echo base_url(); ?>public/<?php echo $member['photo']; ?>" width="150" height="170"/>
			</div>
		</div>
	</div><br/>
	</body>
</html>