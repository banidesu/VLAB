<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo.png">
		<title>MaMen MK2</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/fonts.googleapis.com.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!--<script src="<?php echo base_url();?>assets/js/ace-extra.min.js"></script>-->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>
	</head>

	<body class="no-skin">
<!---=====================HEADER========================-->
		<div id="navbar" class="navbar navbar-default">
			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?php echo base_url(); ?>home/asisten" class="navbar-brand">
						<small>
							<i class="fa fa-flask"></i>
								Kebijakan Deviden & Analisa Financial Leverage
						</small>
					</a>
				</div>
 
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
						<?php
									foreach ($foto->result() as $value) {
										$foto	= $value->foto;
									}

							?>
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url();?>assets/uploads/images/<?php echo $foto;?>" alt="" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo ($this->session->userdata('nama'));?>
								</span>
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li>
									<a href="#">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>



								<li>
									<a href="<?php echo base_url(); ?>home/logout">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	<div class="main-content">
		<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="center">
									<div class="row">
										<div class="col-xs-12">
											<div>
												<span>
													</br>
												</span>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xs-1">
											<div>
												<span></span>
											</div>
										</div>

										<div class="col-xs-10">
											<div>

												<div class="widget-box">
									<div class="widget-header widget-header-blue widget-header-flat">
										<h4 class="widget-title lighter">Laporan Pendahuluan Kebijakan Deviden</h4>

									</div>

									<div class="widget-body">
										<div class="widget-main" style="overflow-x:scroll;">
											<div id="fuelux-wizard-container">
												<div>
													<ul class="steps">
														<li data-step="1" class="active">
															<span class="step">1</span>
															<span class="title"></span>
														</li>

														<li data-step="2">
															<span class="step">2</span>
															<span class="title"></span>
														</li>

														<li data-step="3">
															<span class="step">3</span>
															<span class="title"></span>
														</li>

														<li data-step="4">
															<span class="step">4</span>
															<span class="title"></span>
														</li>
														<li data-step="5">
															<span class="step">5</span>
															<span class="title"></span>
														</li>

														<li data-step="6">
															<span class="step">V</span>
															<span class="title"></span>
														</li>

													</ul>
												</div>

												<hr />
							<form action="<?php echo base_url();?>ceklp/kb" method="post" >
								<div class="step-content pos-rel">
									<?php $no = 1;foreach ($soal->result() as $row) {?>
									<div class="step-pane active" data-step="<?php echo $no;?>">
										<div class="col-xs-1 col-sm-12 col-sm-offset-1">
										<table>
										<tr>
											<th><label class="control-label bolder blue"><?php echo $row->soal;?></label>
											</th>
										</tr>
										<tr>
											<td style="text-align:left">
											<div class="radio" >
													<label>
														<input name="jawab<?php echo $no;?>" type="radio" class="ace" value="jaw_a"/>
														<span class="lbl"> <?php echo $row->jaw_a;?></span>
													</label>
											</div>
											</td>
										</tr>

										<tr>
											<td style="text-align:left">
											<div class="radio" >
													<label>
														<input name="jawab<?php echo $no;?>" type="radio" class="ace" value="jaw_b"/>
														<span class="lbl"> <?php echo $row->jaw_b;?></span>
													</label>
												</div>
											</td>
										</tr>

										<tr>
											<td style="text-align:left">
											<div class="radio" >
													<label>
														<input name="jawab<?php echo $no;?>" type="radio" class="ace" value="jaw_c"/>
														<span class="lbl"> <?php echo $row->jaw_c;?></span>
													</label>
												</div>
											</td>
										</tr>

										<tr>
											<td style="text-align:left">
											<div class="radio" >
													<label>
														<input name="jawab<?php echo $no;?>" type="radio" class="ace" value="jaw_d"/>
														<span class="lbl"> <?php echo $row->jaw_d;?></span>
													</label>
												</div>
											</td>
										</tr>

										</table>

										</div>
									</div>
									<?php $no++; } ?>
									<div class="step-pane" data-step="6">
										<div class="center">
											<h3 class="green">Done!!</h3>
												Submit all And Finish!!
											</div>
										</div>
									</div>
								</div>

											<hr />
											<div class="wizard-actions">
												<a href="#"  class="btn btn-prev">
													<i class="ace-icon fa fa-arrow-left"></i>
													Prev
												</a>

												<a href="#" class="btn btn-success btn-next" >
													Next
													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</a>

												<button class="btn btn-primary btn-next" >
													submit all
													<i class="ace-icon fa fa-download icon-on-right"></i>
												</button>
											</div>
											</form>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>
							</div>
						</div>
			       </div>
			 </div>
		</div>
	</div>
</div>
<!-- page specific plugin scripts -->
		<script src="<?php echo base_url(); ?>assets/js/fuelux.wizard.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/additional-methods.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>

		<!-- ace scripts -->
		<script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script>
				function myFunction() {
				    alert("Yakin untuk mengerjakan ? ");
				}
				</script>

		<script type="text/javascript">
			jQuery(function($) {

				$('[data-rel=tooltip]').tooltip();

				$(".select2").css('width','200px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});


				var $validation = false;
				$('#fuelux-wizard-container')
				.ace_wizard({
					//step: 2 //optional argument. wizard will jump to step "2" at first
					//buttons: '.wizard-actions:eq(0)'
				})
				.on('actionclicked.fu.wizard' , function(e, info){
					if(info.step == 1 && $validation) {
						if(!$('#validation-form').valid()) e.preventDefault();
					}
				})
				.on('finished.fu.wizard', function(e) {
					bootbox.dialog({
						message: "Thank you! Your information was successfully saved!",
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary"
								// "a href : "<?php echo base_url();?>beranda""
							}
						}
					});
				}).on('stepclick.fu.wizard', function(e){
					//e.preventDefault();//this will prevent clicking and selecting steps
				});


				$('#skip-validation').removeAttr('checked').on('click', function(){
					$validation = this.checked;
					if(this.checked) {
						$('#sample-form').hide();
						$('#validation-form').removeClass('hide');
					}
					else {
						$('#validation-form').addClass('hide');
						$('#sample-form').show();
					}
				})


				$.mask.definitions['~']='[+-]';
				$('#phone').mask('(999) 999-9999');

				jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
				}, "Enter a valid phone number.");

				$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						email: {
							required: true,
							email:true
						},
						password: {
							required: true,
							minlength: 5
						},
						password2: {
							required: true,
							minlength: 5,
							equalTo: "#password"
						},
						name: {
							required: true
						},
						phone: {
							required: true,
							phone: 'required'
						},
						url: {
							required: true,
							url: true
						},
						comment: {
							required: true
						},
						state: {
							required: true
						},
						platform: {
							required: true
						},
						subscription: {
							required: true
						},
						gender: {
							required: true,
						},
						agree: {
							required: true,
						}
					},

					messages: {
						email: {
							required: "Please provide a valid email.",
							email: "Please provide a valid email."
						},
						password: {
							required: "Please specify a password.",
							minlength: "Please specify a secure password."
						},
						state: "Please choose state",
						subscription: "Please choose at least one option",
						gender: "Please choose gender",
						agree: "Please accept our policy"
					},


					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},

					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						$(e).remove();
					},

					errorPlacement: function (error, element) {
						if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
						}
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						}
						else error.insertAfter(element.parent());
					},

					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});




				$('#modal-wizard-container').ace_wizard();
				$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');


				/**
				$('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
					$(this).closest('form').validate().element($(this));
				});

				$('#mychosen').chosen().on('change', function(ev) {
					$(this).closest('form').validate().element($(this));
				});
				*/


				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					$('[class*=select2]').remove();
				});
			})
		</script>
