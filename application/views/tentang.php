<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Gallery - Ace Admin</title>

		<meta name="description" content="responsive photo gallery using colorbox" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

	
		<script src="assets/js/ace-extra.min.js"></script>

	</head>

<div class="row">
	<div class="col-xs-12">
		<div class="col-sm-12">
			<div class="widget-box">
				<center>
				<div class="widget-header">
					<h4 class="smaller">
					Virtual Laboratorium Manajemen Menengah
						<small></small>
					</h4>
				</div>
				</center>
			<div class="widget-body">
				<div class="widget-main">
					<div style="margin: auto;
    							width: 15%;
    							padding: 5px;">
						<ul class="ace-thumbnails clearfix " >
							<li >
								<div>
								
									<img width="150" height="200" alt="150x150" src="<?php echo base_url();?>assets/images/gallery/bay2.jpg" />
										<div class="text">
											<div class="inner">
												<span>Programmer</span>
												<br />
												<a href="<?php echo base_url();?>assets/images/gallery/bay2.jpg" data-rel="colorbox">
												<i class="ace-icon fa fa-search-plus"></i>
												</a>
											</div>
										</div>
								  </div>
							</li>
						</ul>
					
					</div>
												<p class="muted">
														<center>
														<p>
															<b>Bayu Wijaya</b>
														</p>
														<p>
															<b>11113682</b>
														</p>
														<p>
															<b>4KA16</b>
														</p>

														</center>

											<div align="justify" style="padding-left: 200px; padding-right:200px;">
														Virtual Laboratorium Manajemen Menengah ini adalah aplikasi yang bertujuan untuk menunjang pembelajaran di Laboratorium Manajemen Menengah Universitas Gunadarma. yang di khususkan pada mata kuliah yang dipelajari di Laboratorium Manajemen Menengah Universitas Gunadarma. Dengan Aplikasi ini praktikan dapat belajar menggunakan modul vodeo yang tersedia dan mengerjakan aktifitas lab dan tugas akhir secara sistem komputerisasi. praktikan pun dapat melihat nilai mereka masing-masing secara transparan sehingga praktikan dapat melihat perkembangan nilainnya dari minggu ke minggu.
											</div>
													

						<hr />
				  </div>
			   </div>
		    </div>
	      </div><!-- /.col -->
				<!-- PAGE CONTENT BEGINS -->
						<!-- PAGE CONTENT ENDS -->
	    </div><!-- /.col -->
       </div><!-- /.row -->
  


			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
<!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo base_url();?>assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<!-- <script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery.min.js'>"+"<"+"/script>");
		</script> -->

		<!-- <![endif]-->

		
<!-- <script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script> -->
		

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url();?>assets/js/jquery.colorbox.min.js"></script>

		<!-- ace scripts -->
		
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
	var $overflow = '';
	var colorbox_params = {
		rel: 'colorbox',
		reposition:true,
		scalePhotos:true,
		scrolling:false,
		previous:'<i class="ace-icon fa fa-arrow-left"></i>',
		next:'<i class="ace-icon fa fa-arrow-right"></i>',
		close:'&times;',
		current:'{current} of {total}',
		maxWidth:'100%',
		maxHeight:'100%',
		onOpen:function(){
			$overflow = document.body.style.overflow;
			document.body.style.overflow = 'hidden';
		},
		onClosed:function(){
			document.body.style.overflow = $overflow;
		},
		onComplete:function(){
			$.colorbox.resize();
		}
	};

	$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
	$("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon
	
	
	$(document).one('ajaxloadstart.page', function(e) {
		$('#colorbox, #cboxOverlay').remove();
   });
})
		</script>
	</body>
</html>
