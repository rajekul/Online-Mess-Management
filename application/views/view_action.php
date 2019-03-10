<!DOCTYPE html>
<html>
	<head>
		<title>Actions| Admin</title>
	<head>
	<body>
		<?php $this->load->view('view_adminmaster'); ?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Actions</h4></legend>
		<div class="row">
			<div class="col-sm-4">
				<form method="post">
					<legend><h3>Meal Actions</h3></legend>
					Minimum meal / member
					<input type="text" class="form-control" name="meal" value="<?php echo $action['action']; ?>"/><br/>
					Apply After Day
					<input type="text" class="form-control" name="day" value="<?php echo $action['day']; ?>" placeholder="ex:25"/>
					<span style="color:red"><?php echo $message; ?></span><br/>
					<?php echo $button; ?>
				</form><br/>
			</div>
		</div>
	</body>
</html>