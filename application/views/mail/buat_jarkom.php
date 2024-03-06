<div class="row">
	<div class="col-xs-12">
		<div class="tabbable">
			<div class="tab-content no-border no-padding">
					<form method="post" action="<?php echo base_url();?>create_mail" id="id-message-form" class="form-horizontal message-form col-xs-12" style="">
						<div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-recipient">Masukan Kelas:</label>
								<div class="col-sm-9">
									<span class="input-icon">
									<select name="kelas" class="form-control col-sm-3">
										<?php 
											foreach ($var_kelas->result() as $Row ) 
											{
										?>
												<option value="<?php echo $Row->kelas;?>"> <?php echo $Row->kelas;?> </option>
										<?php	
											}
										?>
									</select>
									</span>
								</div>
							</div>

							<div class="hr hr-18 dotted"></div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-subject">Judul:</label>

								<div class="col-sm-6 col-xs-12">
									<div class="input-icon block col-xs-12 no-padding">
										<input maxlength="100" type="text" class="col-xs-12" name="judul" id="form-field-subject" placeholder="Judul" />
										<i class="ace-icon fa fa-comment-o"></i>
									</div>
								</div>
							</div>

							<div class="hr hr-18 dotted"></div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right">
									<span class="inline space-24 hidden-480"></span>
									Pesan:
								</label>

								<div class="col-sm-9">
									<textarea name="pesan" class="form-control" style="margin: 0px -0.25px 0px 0px; height: 114px; width: 814px;"></textarea>
								</div>
							</div>

							<div class="hr hr-18 dotted"></div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right">
									
								</label>

								<div class="col-sm-9">
								<button class="btn btn-white btn-default btn-round" type="submit" name="submit">
									<i class="ace-icon fa fa-bolt bigger-110"></i>
									Kirim
									<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
								</button>
								<a href="<?php echo base_url();?>mail" class="btn btn-white btn-denger btn-round">
								<i class="ace-icon fa fa-undo bigger-110"></i>
								Kembali
								</a>
								</div>
							</div>
							<div class="space"></div>
						</div>
					</form>
			</div><!-- /.tab-content -->
		</div><!-- /.tabbable -->
	</div><!-- /.col -->
</div><!-- /.row -->




	