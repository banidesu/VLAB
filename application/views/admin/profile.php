						<div class="row">
							<div class="col-xs-12">
								<div>
									<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-4 center">
											<div>
												<span class="profile-picture">
											
													<img id="" class=" img-responsive" alt="<?php echo ($this->session->userdata('nama'));?>" src="<?php echo base_url();?>assets/uploads/images/<?php echo ($this->session->userdata('foto'));?>" />
												</span>
												
												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white"><?php echo ($this->session->userdata('nama_lengkap'));?></span>
														</a>

														<ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
															<li class="dropdown-header"> Change Status </li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-circle green"></i>
&nbsp;
																	<span class="green">Available</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<div class="space-6"></div>
											<div class="hr hr12 dotted"></div>
											<div class="clearfix">
											</div>
											<div class="hr hr16 dotted"></div>
										</div>
										<div class="col-xs-12 col-sm-7">
											<div class="space-12"></div>
											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name">Kode Asisten</div>

													<div class="profile-info-value">
														<input type="text" name="kd_asisten" id="kd_asisten" class="input-medium" value="<?php echo ($this->session->userdata('kd_asisten'));?>" readonly>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Nama Lengkap </div>

													<div class="profile-info-value">
														<input type="text" name="nama" id="nama" class="input-medium" value="<?php echo ($this->session->userdata('nama_lengkap'));?>" readonly>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Jabatan </div>
													<div class="profile-info-value">
														<input type="text" name="status" id="status" class="input-medium" value="<?php echo ($this->session->userdata('status'))?>" readonly>
													</div>
												</div>
										</div>
									</div>
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->

		<script src="<?php echo base_url();?>assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.gritter.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootbox.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.easypiechart.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.hotkeys.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/select2.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/fuelux.spinner.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-editable.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace-editable.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.maskedinput.min.js"></script>
