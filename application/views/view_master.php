<head>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>		
		
		<div align="right" class="container" style="color:#001a66">
			<br/><span class="glyphicon glyphicon-user"></span>
			<strong>Welcome:&nbsp<?php echo $this->session->userdata('name')?></strong><br/>
			Access Type:&nbsp<?php echo $this->session->userdata('usertype')?>
		</div>
		<nav class="navbar navbar-inverse" style="background-color:#19334d">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			  </button>
			  <a class="navbar-brand" href="<?php echo base_url(); ?>home/user/<?php echo date('m'); ?>">Mess Mgt</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav">
				<li></li>
				<li><a href="<?php echo base_url(); ?>member">Members</a></li>
				<li class="dropdown">
				  <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url(); ?>meal">Meal<span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="<?php echo base_url(); ?>meal">View Meal</a></li>
					<li><a href="<?php echo base_url(); ?>meal/add/<?php echo $this->session->userdata('username')?>">Send Meal Request</a></li>
				  </ul>
				</li>
				<li class="dropdown">
				  <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url(); ?>meal">Bazar<span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="<?php echo base_url(); ?>bazar">View Bazar</a></li>
					<li><a href="<?php echo base_url(); ?>bazar/add">Add Bazar</a></li>
				  </ul>
				</li>
				<li><a href="<?php echo base_url(); ?>payment">Payment</a></li>
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url(); ?>home/user/<?php echo date('m'); ?>">Home</a></li>
				<li class="dropdown">
				  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Option<span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="<?php echo base_url(); ?>member/profile/<?php echo $this->session->userdata('username')?>">Profile</a></li>
					<li><a href="<?php echo base_url(); ?>home/changepassword/<?php echo $this->session->userdata('username')?>">Change Password</a></li>
				  </ul>
				</li>
				<li><a href="<?php echo base_url(); ?>start/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			  </ul>
			</div>
		  </div>
		</nav>	
		<div class="container">