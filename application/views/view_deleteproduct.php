<!DOCTYPE html>
<html>
	<head>
		<title>Products| Admin</title>
	<head>
	<body>
		<?php $this->load->view('view_adminmaster'); ?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Edit Product</h4></legend>
		<div class="row">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-4">
				<form method="post">
					<legend><h3>Delete Product</h3></legend>
					ID:<?php echo $product['p_id']; ?><br/>
					<input type="hidden" name="id" value="<?php echo $product['p_id']; ?>"/>
					Product Name: <?php echo $product['p_name']; ?><br/><br/>
					<span style="color:red">All records of this product will be deleted. <br/> Are you sure???</span><br/><br/>
					<a href="<?php echo base_url(); ?>product/index/<?php echo date('m'); ?>" class="btn btn-info" role="button">Back</a>&nbsp&nbsp
					<input type="submit" name="buttonSubmit" value="Confirm" class="btn btn-primary"/>
				</form><br/>
			</div>
		</div>
	</body>
</html>