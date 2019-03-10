<!DOCTYPE html>
<html>
	<head>
		<title>Edit Meal</title>
	<head>
	<body>
		<?php $this->load->view('view_master'); ?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Edit Meal</h4></legend> 
		<span style="color:red"><?php echo $message; ?></span><br/> 
		<form method="post" >
			<div class="col-sm-4" style="background-color:#d9d9d9">
				<legend><h3>Edit Meal Request</h3></legend>
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Warning!</strong> You already have an pending request.<br/>You can Edit your sent request.......
				 </div>
				<table class="table">
					<tr>
						<td>Breakfast</td>
						<td><input type="number" name="breakfast" class="form-control" value="<?php echo $pending['breakfast']; ?>" <?php if($check['breakfast']!='uncheck'){ echo 'disabled';} ?>/></td>
					</tr>
					<tr>
						<td>Lunch</td>
						<td><input type="number" name="lunch" class="form-control" value="<?php echo $pending['lunch']; ?>"<?php if($check['lunch']!='uncheck'){ echo 'disabled';} ?>/></td>
					</tr>
					<tr>
						<td>Dinner</td>
						<td><input type="number" name="dinner" class="form-control" value="<?php echo $pending['dinner']; ?>"<?php if($check['dinner']!='uncheck'){ echo 'disabled';} ?>/></td>
					</tr>
					<?php 	if($check['breakfast']!='uncheck'){
								echo '<input type="hidden" name="breakfast"  value="'.$pending['breakfast'].'"/> ';
							}
							if($check['lunch']!='uncheck'){
								echo '<input type="hidden" name="lunch"  value="'.$pending['lunch'].'"/> ';
							}
							if($check['dinner']!='uncheck'){
								echo '<input type="hidden" name="dinner"  value="'.$pending['dinner'].'"/> ';
							} 
					?>
					<tr>
						<td><input type="hidden" name="id" value="<?php echo $pending['userid'];?>"</td>
						<td><input type="submit" name="buttonSubmit" value="Edit Request" class="btn btn-primary"/></td>
					</tr>
				</table>
			</div>
		</form>
	</div><br/>
	</body>
</html>