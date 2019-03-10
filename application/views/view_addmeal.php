<!DOCTYPE html>
<html>
	<head>
		<title>Add Meal</title>
	<head>
	<body>
		<?php $this->load->view('view_master'); ?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Add Meal</h4></legend>
		<span style="color:red"><?php echo $message; ?></span><br/>
		<form method="post">
			<div class="col-sm-4" style="background-color:#d9d9d9">
				<legend><h3>Send Meal Request</h3></legend>
				<table class="table">
					<tr>
						<td>Breakfast</td>
						<td><input type="number" name="breakfast" class="form-control" value="<?php echo set_value('breakfast'); ?>"/></td>
					</tr>
					<tr>
						<td>Lunch</td>
						<td><input type="number" name="lunch" class="form-control" value="<?php echo set_value('lunch'); ?>"/></td>
					</tr>
					<tr>
						<td>Dinner</td>
						<td><input type="number" name="dinner" class="form-control" value="<?php echo set_value('dinner'); ?>"/></td>
					</tr>
					
					<tr>
						<td><input type="hidden" name="id" value="<?php echo $id;?>"</td>
						<td><input type="submit" name="buttonSubmit" value="Send Request" class="btn btn-primary"/></td>
					</tr>
				</table>
			</div>
		</form>
	</div><br/>
	</body>
</html>