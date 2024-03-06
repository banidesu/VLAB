<div class="col-xs-12 col-sm-12">
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="widget-title"> <?php echo $namamatkul?> - <?php echo $judulbab?></h4>
				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
					<i class="ace-icon fa fa-chevron-up"></i>
					</a>
				</div>
		</div>
			<div class="widget-body">
				<div class="widget-main">
					<form method="post" action="<?php echo base_url()?>activity_lab/post">
						<div>
							<label name='soal' for="form-field-12">Soal </label>
								<div class="form-group">
									<div class="col-xs-12">
										<textarea class="form-control" placeholder="Tulis Jawaban disini!" name="analisis" ></textarea>
										<input multiple="" type="file" id="id-input-file-3" />
									</div>
									<input type="submit" name="done" class="btn btn-primary btn-sm">&nbsp;
									<input type="reset" name="clear" class="btn btn-denger btn-sm">
								</div>
								<hr />
						</div>
					</form>
				</div>
			</div>
	</div>
</div>
