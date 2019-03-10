<!DOCTYPE html>
<html>
	<head>
		<title>Delete Member | Admin</title>
	<head>
	<body>
		<?php $this->load->view('view_adminmaster'); ?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Delete Member</h4></legend>
		<div class="row">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-4">
				<form method="post">
					<legend><h3>Delete Member</h3></legend>
					ID: {id}<input type="hidden" name="id" value="{id}"/><br/><br/>
					Name: {name}<br/><br/>
					<span style="color:red">All Info about this member will be deleted<br/>And This will harm your current process<br/> Are you sure??</span><br/>
					<a href="<?php echo base_url(); ?>member/" class="btn btn-info" role="button">Back</a>&nbsp&nbsp&nbsp&nbsp
					<input type="submit" name="buttonSubmit" value="Confirm" class="btn btn-primary"/>
				</form>
			</div>
			<div class="col-sm-2">
				<img border="1" align="right" src="<?php echo base_url(); ?>public/{photo}" width="150" height="170"/>
			</div>
		</div>
	</div><br/>
	</body>
</html>