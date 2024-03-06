<link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.min.css" />
<div class="row">
	<div class="col-sm-4">
		<div class="widget-box">
			<div class="widget-header widget-header-flat">
				<h4 class="widget-title smaller">
					<i class="ace-icon fa fa-quote-left smaller-80"></i>
					Filter Kelas
				</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="row">
						<div class="col-xs-12">
							<form method="GET" action="<?php echo base_url();?>Matakuliah/AktifasiPraktikum">
						<select name="kelas" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Pilih Kelas..." >
							<option value=""> </option>
								<?php 
									foreach ($data_kelas->result() as $Row ) 
									{
								?>
										<option value="<?=$Row->kelas;?>"><?=$Row->kelas;?></option>
								<?php		
									}
								?>
						</select>
						<br>
						<br>
						<input type="submit" class="btn btn-xs btn-primary form-control" value="Cari">
					</form>
						</div>
					</div>
					<hr />
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-8">
		<div class="row">
			<div class="col-xs-12">
				<div class="widget-box">
					<div class="widget-header widget-header-flat">
						<h4 class="widget-title smaller">Aturan Aktivasi Praktikum</h4>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<dl id="dt-list-1">
								<ul>
									<li>Untuk Aktivasi Kelas harap klik tombol pada bagian <b>Status</b></li>
									<li>Jangan lupa untuk mengaktifkan atau menonaktifkan bab pada setiap kelas</li>
									<li>Harap teliti dalam mengaktifkan atau menonaktifkan bab .</li>
									<li>Jangan lupa menghapus temporary pada menu soal.</li>
									<li>Laporkan ke Programmer apabila nama kelas tidak ada pada data aktivasi.</li>
								</ul>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="space-6"></div>
	</div>
</div><!-- PAGE CONTENT ENDS -->


<div class="row">
	<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-12">
				<div class="col-sm-2">
					
				</div>
			</div>
		</div>
	</div>
</div>
	<hr>
<?php
		if ($data_aktivasi->result() > 1 ) 
		{
?>
<div class="row">
	<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-12">
				<table id="simple-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Kelas</th>
							<th>Mata Kuliah</th>
							<th>Bab</th>
							<th>Aktifitas Lab</th>
							<th>Tugas Akhir</th>
						</tr>
					</thead>
				<tbody>
<?php
			foreach ($data_aktivasi->result() as $Row ) 
			{
?>	
				<tr>
					<td><?php echo $Row->kelas;?></td>
					<td><?php echo $Row->nama_matkul;?></td>
					<td><?php echo $Row->nama_bab;?></td>
					<td align="center">
						<form method="POST" action="<?php echo base_url();?>Matakuliah/UbahStatus/<?=$Row->kd_bab;?>">
							<?php

								$var_Status = $Row->status_al;

								$var_TempKelas = "<input type='hidden' name='kelas' class='btn btn-xs btn-primary' value='$Row->kelas'/>";

								echo $var_TempKelas;

								if ( $var_Status == 1 ) 
								{
									echo "<input type='hidden' name='status_al' class='btn btn-xs btn-primary' value='0'/>";
									echo "<input type='submit' class='btn btn-xs btn-primary' value='Tidak Aktif'/>";
								}
								else
								{
									echo "<input type='hidden' name='status_al' class='btn btn-xs btn-primary' value='1'/>";
									echo "<input type='submit' class='btn btn-xs btn-danger' value='Aktif'/> ";
								}
						?>	
						</form>
					</td>
					<td align="center">
						<form method="POST" action="<?php echo base_url();?>Matakuliah/UbahStatus/<?=$Row->kd_bab;?>">
							<?php

								$var_Status = $Row->status_ta;

								$var_TempKelas = "<input type='hidden' name='kelas' class='btn btn-xs btn-primary' value='$Row->kelas'/>";

								echo $var_TempKelas;

								if ( $var_Status == 1 ) 
								{
									echo "<input type='hidden' name='status_ta' class='btn btn-xs btn-primary' value='0'/>";
									echo "<input type='submit' class='btn btn-xs btn-primary' value='Tidak Aktif'/>";
								}
								else
								{
									echo "<input type='hidden' name='status_ta' class='btn btn-xs btn-primary' value='1'/>";
									echo "<input type='submit' class='btn btn-xs btn-danger' value='Aktif'/> ";
								}
						?>	
						</form>
					</td>

				</tr>
<?php
			}
		}
		else
		{
			echo "tidak ada data";
		}
?>
					</tbody>
				</table>
			</div><!-- /.span -->
		</div><!-- /.row -->
	</div>
</div>
<hr />
	<script src="<?php echo base_url();?>assets/js/chosen.jquery.min.js"></script>
	<script type="text/javascript">
		if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
	</script>

