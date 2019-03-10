<!DOCTYPE html>
<html>
	<head>
		<title>Add Bazar</title>
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
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Add Bazar</h4></legend>
		<form method="post">
			<div class="col-sm-4">
				<legend><h4>Enter Product Amount</h4></legend>
				<span style="color:red">Enter the number of product bought:</span><br/>
				Product Amount: <input type="text" class="form-control" name="amount" /><br/>
				<input type="submit" name="submit" value="Next" class="btn btn-primary"/>
			</div>	
		</form>
		<?php echo $productdetails; ?>
		
	</body>
</html>