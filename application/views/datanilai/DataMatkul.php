<link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.min.css" />
<div class="row">
	<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-12">
			<div class="alert alert-block alert-success" style="background-color: #d1eeff; border-color: #ecf0f1; color: #000000; ">
						Pilih Mata Kuliah untuk mengilihat nilai dari mata kuliah yang diikuti praktikan.
			</div>
				<table id="simple-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th class="center">No</th>
							<th>Kode</th>
							<th>Nama Mata Kuliah</th>
							<th class="center">Jumlah Bab</th>
							<th class="center"><i class="ace-icon fa fa-clock-o bigger-110 hidden-480 "></i>
								Tahun Ajaran
							</th>
							<th class="hidden-480 center">Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$No = 1;
						foreach ($data_matkul->result() as $Row ) 
						{
					?>
						<tr>
							<td class="center"><?=$No++;?></td>
							<td width="10%"><?=$Row->kd_matkul;?></td>
							<td><?=$Row->nama_matkul;?></td>
							<td class="center" width="10%"><?=$Row->jml_bab;?></td>
							<td class="center" width="20%"><?=$Row->t_ajaran;?></td>
							<td class="hidden-600 center" width="5%"><a href="<?= base_url();?>Datanilai/DaftarBab/<?=$Row->kd_matkul;?>"><span class="label label-sm label-primary arrowed arrowed-right">Lihat</span></a></td>
						</tr>

					<?php
						}
					?>
					</tbody>
				</table>
			</div>
			<div class="col-md-12 well">
			    <form method="post" action="<?php echo base_url();?>datanilai/export_excel" onsubmit= "return cekform();">
			        <table>
			        	<tr>
			        		<td style="padding-right: 20px;">
			        			<label> Export Nilai to Excel :</label>
			        		</td>
			        		<td style="padding-right: 20px;" width="180">
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
							</td>
			        		<td>
			        			<input class="btn btn-sm btn-primary" type="submit" name="submit" value="Download">
			        		</td>
			        	</tr>
			        </table>

			    </form>
			</div>
		</div>
	</div>
</div>

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
