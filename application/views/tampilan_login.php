<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Asisten</title>
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet"  />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo.png">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />
		<script type="text/javascript">
		function cekform()
 		{
 				if(!$("#username").val())
 				{
 					alert	('maaf username tidak boleh kosong');
 					$("#username").focus();
 					return false;
 				}
 				if(!$("#password").val())
 				{
 					alert	('maaf password tidak boleh kosong');
 					$("#password").focus();
 					return false;
 				}
		}
		</script>
	</head>
	<body class="login-layout" style="background-image:url(<?php echo base_url(); ?>assets/images/background.png);background-size: cover; background-repeat: no-repeat;">
	<div id="navbar" class="navbar navbar-default">
			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-header pull-left">
					<a href="<?php echo base_url(); ?>dashboard" class="navbar-brand">
						<small>
							<i class="fa fa-flask"></i>
							Virtual Lab Manajemen Menengah
						</small>
					</a>
				</div>
			</div>
		</div>
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-laptop blue"></i>
									<span class="blue">Laboratorium Manajemen Menengah</span></a>
								</h1>
							</div>
							<div class="space-6"></div>
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
										<center><h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee black"></i>
												Login Asisten
											</h4></center>
											<div class="space-6"></div>
											<form method="POST" action="<?php echo base_url();?>index.php/login/getloginasisten"
											onsubmit= "return cekform();">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="username" id="username" class="form-control" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" id="password" class="form-control" placeholder="Password" />
															<center><b>
															<?php
															$info_a = $this->session->flashdata('info_a');
															if(!empty($info_a)){
																echo $info_a;
															}
															?>
														</b></center>
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>
													<div class="space"></div>
													<div class="clearfix">
														<button type="submit" class="width-100 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>
													<div class="space-4"></div>
												</fieldset>
											</form>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
</div>
<div class="footer" style="background : #ff2212;">
	<div class="footer-inner">
		<div class="footer-content">
			<span class="bigger-120">
				<strong>Copyright &copy; 2016 Laboratorium Manajemen Menengah</strong> All rights reserved.
			</span>
		</div>
	</div>
</div>
		<script src="<?php echo base_url();?>assets/js/jquery.2.1.1.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/58c7bb542dfdd91cf6f232c3/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
	</body>
</html>
