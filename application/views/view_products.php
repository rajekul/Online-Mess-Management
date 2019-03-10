<!DOCTYPE html>
<html>
	<head>
		<title>Products | Admin</title>
	<head>
	<body>
		<?php $this->load->view('view_adminmaster'); ?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Products</h4></legend>
		<div class="row">
			<div class="col-sm-4" style="background-color:#d9d9d9">
				<form method="post">
					<legend><h3>Add Product</h3></legend>
					Product Name: <input type="text" name="name"/><br/><br/>
					Unit: 
					<select name="unit">
						<option value="kg">kg</option>
						<option value="liter">liter</option>
						<option value="piece">piece</option>
						<option value="other">other</option>
					</select><br/>
					<span style="color:red"><?php echo $message; ?></span><br/>
					<input type="submit" name="buttonSubmit" value="Add Product" class="btn btn-primary"/>
				</form>&nbsp
			</div>
			<div class="col-sm-6">
				<ul class="btn btn-default" style="list-style-type: none;">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" >Select Month <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url(); ?>product/index/01">January</a></li>
							<li><a href="<?php echo base_url(); ?>product/index/02">February</a></li>
							<li><a href="<?php echo base_url(); ?>product/index/03">March</a></li>
							<li><a href="<?php echo base_url(); ?>product/index/04">April</a></li>
							<li><a href="<?php echo base_url(); ?>product/index/05">May</a></li>
							<li><a href="<?php echo base_url(); ?>product/index/06">June</a></li>
							<li><a href="<?php echo base_url(); ?>product/index/07">July</a></li>
							<li><a href="<?php echo base_url(); ?>product/index/08">Agust</a></li>
							<li><a href="<?php echo base_url(); ?>product/index/09">September</a></li>
							<li><a href="<?php echo base_url(); ?>product/index/10">October</a></li>
							<li><a href="<?php echo base_url(); ?>product/index/11">November</a></li>
							<li><a href="<?php echo base_url(); ?>product/index/12">December</a></li>
						</ul>
					</li>
				</ul><br/><br/>
				<table class="table table-bordered">
					<thead>
						<td colspan="6">
							<h3>Product List</h3>
						</td>
					</thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Unit</th>
						<th>NetWeight</th>
						<th>NetCost</th>
						<th>Action</th>
					</tr>
				<?php echo $products; ?>
				</table>
			</div>
		</div>
	</body>
</html>