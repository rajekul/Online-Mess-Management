<!DOCTYPE html>
<html>
	<head>
		<title>index | Mess management system</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
		<link href="<?php echo base_url();?>css/mystyle.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>css/style1.css" rel="stylesheet" />
		
		<script>
			function userlogin(u,p){
				document.getElementById("username").value=u;
				document.getElementById("password").value=p;
				document.documentElement.scrollTop = 0; 
			}
		</script>
	
	</head>
	<body>
		<div align="center" style="background-color:#132639;color:white;">
			<br/>
			<br/><font size="6">MESS MANAGEMENT SYSTEM</font><br/><br/>
			<?php echo '<font size="5">'.$mess['title'].'</font><br/>House#'.$mess['house'].' ;Road#'.$mess['road'].'<br/>'.$mess['area'].' ;'.$mess['city'];?>
			<hr/>
			<br/>
		</div><br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-5" style="border:1px solid lightgray;box-shadow:2px 2px 6px 6px lightgray;border-radius:10px;">
					<form method="post">
						<legend style="color:#132639"><h3>Login Panel</h3></legend>
						USERNAME <input type="text" id="username" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="Enter Userid"/><br/>
						PASSWORD <input type="password" id="password" name="password" class="form-control" placeholder="Enter password"/>
						<span style="color:red"><?php echo $message; ?></span><hr/>
						<input  type="submit" name="buttonSubmit" value="LOG IN" class="btn btn-primary" class="btn btn-primary"/><br/>&nbsp
					</form> 
				</div>
			</div>
			<div class="row" >
					
					<div class="col-sm-5  col-sm-offset-3 " >
						<h3>Use below details for login</h3>
					<table class="table table-bordered">
						<thead>
							<tr style="background-color:#33bbff">
								<th>Username</th>
								<th>Password</th>
								<th>Type</th>
								<th>Action</th>
							</tr>
						</thead>
						{userdetails}
							<tr>
								<td>{username}</td>
								<td>{password}</td>
								<td>{type}</td>
								<td><button type="button"  class="btn btn-primary" name="Copy"  onclick="userlogin('{username}','{password}')"/>Copy</button></td>
								
							</tr>
						{/userdetails}
					</table>
						
					</div>
					
				</div>
		</div><br/>
		<div class="container-fluid" style="background-color:white;padding:10px">
				<span class="add">
					**Manage your Mess Online. Call:(+8801762506794) or Mail:(rajekulislambadsha@gmail.com).
				</span>
			</div>
		
		
		<div class="footer">
		<div class="container">
			<p>Copyright @ Rajekul Islam. All rights reserved | Developed by <a href="http://www.rajekul.com" target="blank">Rajekul</a></p>
		</div>
		</div>
	</body>
</html>