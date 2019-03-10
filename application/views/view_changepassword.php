<!DOCTYPE html>
<html>
	<head>
		<title>Change Password</title>
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
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Change Password</h4></legend>
		<div class="col-sm-6" style="background-color:#d9d9d9">
			<span style="color:red"><?php echo $message; ?></span><br/>
			<form method="post">
				<table class="table">
					<tr>
						<td>Current Password</td>
						<td><input type="password" name="cp" class="form-control" value="<?php echo set_value('cp'); ?>"/></td>
					</tr>
					<tr>
						<td>New Password</td>
						<td><input type="password" name="np" class="form-control" value="<?php echo set_value('np'); ?>"/></td>
					</tr>
					<tr>
						<td>Confirm Password</td>
						<td><input type="password" name="cnp" class="form-control" value="<?php echo set_value('cnp'); ?>"/></td>
					</tr>
					
					<tr>
						<td><input type="hidden" name="id" value="<?php echo $id;?>"</td>
						<td><input type="submit" name="buttonSubmit" value="change password" class="btn btn-primary"/></td>
					</tr>
				</table>
			</form>
		</div><br/>
	</body>
</html>