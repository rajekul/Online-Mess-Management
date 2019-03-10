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
					<legend><h3>Edit Product</h3></legend>
					ID:<?php echo $product['p_id']; ?><br/><br/>
					<input type="hidden" name="id" value="<?php echo $product['p_id']; ?>"/>
					Product Name: <input type="text" name="name" value="<?php echo $product['p_name']; ?>"/>
					Unit: 
					<select name="unit">
						<option value="kg" <?php if($product['unit']=='kg'){ echo set_select('unit', 'kg', TRUE);} ?>>kg</option>
						<option value="liter" <?php if($product['unit']=='liter'){ echo set_select('unit', 'liter', TRUE);} ?>>liter</option>
						<option value="piece"<?php if($product['unit']=='piece'){ echo set_select('unit', 'piece', TRUE);} ?>>piece</option>
						<option value="other" <?php if($product['unit']=='other'){ echo set_select('unit', 'other', TRUE);} ?>>other</option>
					</select><br/>
					<span style="color:red"><?php echo $message; ?></span><br/>
					<a href="<?php echo base_url(); ?>product/index/<?php echo date('m'); ?>" class="btn btn-info" role="button">Back</a>&nbsp&nbsp
					<input type="submit" name="buttonSubmit" value="Edit Product" class="btn btn-primary"/>
				</form><br/>
			</div>
		</div>
	</body>
</html>