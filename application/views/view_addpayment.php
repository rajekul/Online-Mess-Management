<!DOCTYPE html>
<html>
	<head>
		<title>Add payment</title>
	<head>
	<body>
		<?php $this->load->view('view_master'); ?>
		<legend><h4><span class="glyphicon glyphicon-forward"></span> Add Payment</h4></legend>
		<div class="col-sm-4" style="background-color:#d9d9d9">
			<span style="color:red"><?php echo $message; ?></span><br/>
			<form method="post">
				<table class="table">
					<th colspan="2">
						<h4>Enter Payment Details</h4>
						<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Note!</strong><br/>Please Enter Current Month payment only.
							This Payment will calculate for current month... 
						 </div>
					</th>
					<tr>
						<td>Select Member</td>
						<td>
							<select name="member" class="form-control">
								<option value="">Select Member</option>
								{member}
									<option value="{id}">{name}</option><br/>
								{/member}
							</select>
						</td>
					</tr>
					<tr>
						<td>Pay Amount</td>
						<td><input type="text" name="amount" class="form-control" value="<?php echo set_value('amount'); ?>"/></td>
					</tr>
					<tr>
						<td>Return Amount</td>
						<td><input type="text" name="ramount" class="form-control" value="<?php echo set_value('ramount'); ?>"/></td>
					</tr>
					<tr>
						<td>Payment for</td>
						<td>
							<select class="form-control" name="month">
								<option value="">Select Month</option>
								<option value="01">January</option>
								<option value="02">February</option>
								<option value="03">March</option>
								<option value="04">April</option>
								<option value="05">May</option>
								<option value="06">June</option>
								<option value="07">July</option>
								<option value="08">Agust</option>
								<option value="09">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Pay Method</td>
						<td>
							<select name="method" class="form-control">
								<option value="Cash"  <?php  echo set_select('method', 'Cash'); ?>>Cash</option>
								<option value="Bkash"<?php echo set_select('method', 'Bkash'); ?>>Bkash</option>
								<option value="DBBL" <?php echo set_select('method', 'DBBL'); ?>>DBBL</option>
								<option value="other" <?php echo set_select('method', 'other'); ?>>other</option>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td align="right"><input type="submit" name="buttonSubmit" value="Save" class="btn btn-primary"/></td>
					</tr>
				</table>
			</form>
		</div><br/>
	</body>
</html>