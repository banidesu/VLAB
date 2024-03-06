<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url();?>assets/virtual/img/apple-icon.png">
	<link rel="icon" type="image/png" href="<?=base_url();?>assets/virtual/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Sign In <?=$User;?>- V-Lab MaMen</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="<?=base_url();?>assets/virtual/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=base_url();?>assets/virtual/css/material-kit.css" rel="stylesheet"/>

</head>

<body class="signup-page">
	<nav class="navbar navbar-transparent navbar-absolute">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand" href="<?=base_url();?>">V-Lab MaMen</a>
        	</div>

        	<div class="collapse navbar-collapse" id="navigation-example">
        		<ul class="nav navbar-nav navbar-right">
		            
        		</ul>
        	</div>
    	</div>
    </nav>

    <div class="wrapper">
		<div class="header header-filter" style="background-image: url('<?=base_url();?>assets/virtual/img/Login_Background.jpg'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form" method="POST" action="<?= base_url();?>login/GetLogin<?=$User;?>">
								<div class="header header-primary text-center">
									<h4>Sign In</h4>
								</div>
								<p class="text-divider">As <?=$User;?></p>
								<div class="content">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<input name="username" type="text" class="form-control" placeholder="Username...">
									</div>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input name="password" type="password" placeholder="Password..." class="form-control" />
									</div>
								</div>
								<div class="footer text-center">
									<input type="submit" name="submit" class="btn btn-simple btn-primary btn-lg" value="Login">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

	<!-- Fopter -->
		<footer class="footer" style="padding-top: 90px;">
		  
		        <div class="copyright text-center">
		            &copy; 2017, made with <i class="material-icons">favorite</i> by MaMen Tim for a better web.
		        </div>
		    </div>
		</footer>
	<!-- End Fopter -->


		</div>

    </div>


</body>
	<!--   Core JS Files   -->
	<script src="<?=base_url();?>assets/virtual/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>assets/virtual/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>assets/virtual/js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="<?=base_url();?>assets/virtual/js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="<?=base_url();?>assets/virtual/js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="<?=base_url();?>assets/virtual/js/material-kit.js" type="text/javascript"></script>
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
</html>
