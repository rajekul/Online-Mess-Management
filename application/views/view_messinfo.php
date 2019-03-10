<!DOCTYPE html>
<html>
	<head>
		<title>MessInfo | Admin</title>
	<head>
	<body>
		<?php $this->load->view('view_adminmaster'); ?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Mess Information</h4></legend>
		<div class="row">
			<div class="col-sm-4">
				<form method="post">
					<legend><h3>MessInfo</h3></legend>
					Title: <input type="text" name="title" class="form-control" value="<?php echo $mess['title']; ?>"/><br/>
					House No:<input type="text" name="house" class="form-control" value="<?php echo $mess['house']; ?>"><br/>
					Road No:<input type="text" name="road" class="form-control" value="<?php echo $mess['road']; ?>"><br/>
					Area:<input type="text" name="area" class="form-control" value="<?php echo $mess['area']; ?>"/><br/>
					City:<input type="text" name="city" class="form-control" value="<?php echo $mess['city']; ?>"<br/><br/>
					<input type="submit" name="buttonSubmit" value="Change" class="btn btn-primary"/>
				</form><br/>
			</div>
		<div>
	</body>
</html>