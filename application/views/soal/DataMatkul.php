<div class="row">
	<div class="col-xs-12">

	<ul class="nav nav-pills">
		<li >
			<a href="javascript:ShowAL();">Aktifitas Lab</a>
		</li>
		<li>
			<a href="javascript:ShowTA();">Tugas Akhir</a>
		</li>
	</ul>

		<hr>
			<div class="col-xs-12" id="AL" style="display: none;">
				<div class="alert alert-block alert-success" style="background-color: #d1eeff; border-color: #ecf0f1; color: #000000; ">
							Pilih Mata Kuliah untuk mengilihat Soal Aktifitas Lab dari mata kuliah yang diikuti praktikan.
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
						foreach ($data_soal->result() as $Row ) 
						{
					?>

						<tr>
							<td class="center"><?=$No++;?></td>
							<td width="10%"><?=$Row->kd_matkul;?></td>
							<td><?=$Row->nama_matkul;?></td>
							<td class="center" width="10%"><?=$Row->jml_bab;?></td>
							<td class="center" width="20%"><?=$Row->t_ajaran;?></td>
							<td class="hidden-600 center" width="5%"><a href="<?= base_url();?>Soal/AktifitasLab/<?=$Row->kd_matkul;?>"><span class="label label-sm label-primary arrowed arrowed-right">Lihat</span></a></td>
						</tr>

					<?php
						}
					?>
					</tbody>
				</table>
			</div>

			<div class="col-xs-12" id="TA" style="display: none;">
				<div class="alert alert-block alert-success" style="background-color: #d1eeff; border-color: #ecf0f1; color: #000000; ">
							Pilih Mata Kuliah untuk mengilihat Soal Tugas Akhir dari mata kuliah yang diikuti praktikan.
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
						foreach ($data_soal->result() as $Row ) 
						{
					?>

						<tr>
							<td class="center"><?=$No++;?></td>
							<td width="10%"><?=$Row->kd_matkul;?></td>
							<td><?=$Row->nama_matkul;?></td>
							<td class="center" width="10%"><?=$Row->jml_bab;?></td>
							<td class="center" width="20%"><?=$Row->t_ajaran;?></td>
							<td class="hidden-600 center" width="5%"><a href="<?= base_url();?>Soal/Tugasakhir/<?=$Row->kd_matkul;?>"><span class="label label-sm label-primary arrowed arrowed-right">Lihat</span></a></td>
						</tr>

					<?php
						}
					?>
					</tbody>
				</table>

			</div>
		</div>
				<ul class="nav nav-pills">
					<li >
						<a href="<?=base_url();?>Soal/hapustemp">Hapus Temp</a>
					</li>
				</ul>
	</div>

<script type="text/javascript">
	
function ShowAL()
{
	document.getElementById('AL').style.display = "";
	document.getElementById('TA').style.display = "none";
	
}

function ShowTA()
{
	document.getElementById('TA').style.display = "";
	document.getElementById('AL').style.display = "none";
}

</script>
