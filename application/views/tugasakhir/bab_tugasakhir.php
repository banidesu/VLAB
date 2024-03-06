<div class="row">
	<div class="col-xs-12">
		<table id="simple-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Nama BAB</th>
					<th style="text-align:center;">BAB</th>
					<th style="text-align:center;">Modvid</th>
					<th class="hidden-480" style="text-align:center;">Status</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($data->result() as $key ) {
				$status = $key->status;
				if ($status == 'Aktif') {
					$button = 'class="btn btn-primary btn-sm"';
					$cek	= 'Tersedia';
					$disabled = '';
				} else {
					$button = 'class="btn btn-disabled btn-sm"';
					$cek	= 'Tidak Tersedia';
					$disabled = 'disabled';
				}?>
				<tr>
					<td><?php echo $key->nama_bab; ?></td>
					<td style="text-align:center;"><?php echo $key->minggu;?> </td>
					<td style="text-align:center;">
						<button class="btn btn-primary btn-sm fa fa-youtube-play" id="" data-toggle="modal" data-target="#addData<?php echo $key->minggu;?>" ></button>
						<div class="modal fade" id="addData<?php echo $key->minggu;?>" tabindex="-1" role="dialog" aria-labelledby="addLabel">
						    <div class="modal-dialog" role="document">
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						          <h4 class="modal-title" id="addLabel"><?php echo $key->nama_bab; ?></h4>
						        </div>
										<div class="modal-body">
											<div class="control-group">
												<div class="control-group">
												<div class="controls">
													<center>
														<?php if (!$key->link_modvid == 0) {
														echo '<iframe allowfullscreen="" frameborder="0" height="270" src="'.$key->link_modvid.'" width="480"></iframe>';
													}else {
															echo '<p>Video Tidak Tersedia</p>';
														}
													?>
													</center>
														</div>
													</div>
												</div>
											</div>
						    </div>
						  </div>
						</div>
					</td>
					<td class="hidden-480" style="text-align:center;">
						<div>
						<button <?php echo $button;?> id="" data-toggle="modal" data-target="#addDataTA<?php echo $key->minggu;?>"  <?php echo $disabled;?>> <?php echo $cek;?></button>
							<div class="modal fade" id="addDataTA<?php echo $key->minggu;?>" tabindex="-1" role="dialog" aria-labelledby="addLabel">
							    <div class="modal-dialog" role="document">
							      <div class="modal-content">
							        <div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							          <h4 class="modal-title" id="addLabel"><?php echo $key->nama_bab; ?></h4>
							        </div>
											<div class="modal-body">
												<div class="control-group">
													<div class="control-group">
													<div class="controls">
														<center>
														<a href="<?php echo base_url()?>tugasakhir/<?php echo $key->kd_bab;?>" class="btn btn-primary btn-sm" > Mulai
															</a>
															</div>
														</div>
													</div>
												</div>
							    </div>
							  </div>
							</div>
						</div>
					</td>
					</td>
				</tr>
			<?php }?>
			</tbody>
		</table>
	</div><!-- /.span -->
</div><!-- /.row -->
<script type="text/javascript">

</script>
