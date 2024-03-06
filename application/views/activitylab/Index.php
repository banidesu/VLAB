<link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.min.css" />

<?php
		if ($ListKelas->num_rows() > 0) 
		{
?>
<div class="row">
	<div class="col-sm-12" style="">
		<div class="row">
			<div class="col-xs-12">
				<div class="widget-box">
					<div class="widget-header widget-header-flat">
						<h4 class="widget-title smaller">Perhatian !!!</h4>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<dl id="dt-list-1">
								<ul>
									<li>Pengerjaan Aktifitas Lab dilakukan pada setiap minggu </li>
									<li>Waktu pengerjaan sesi Aktifitas Lab ditentukan oleh Ketua Praktikum</li>
									<li>Harap Teliti dan dalam mengerjakan soal</li>
									<li>Tonton Modul Video sebelum mengerjakan soal</li>
								</ul>
								Selamat Mengerjakan. 
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="space-6"></div>
	</div>
	<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-12">
				<table id="simple-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Bab</th>
							<th style="text-align: center;"><pre class="fa fa-icon fa-pencil-square-o"></pre></th>
						</tr>
					</thead>
				<tbody>
<?php
			$var_No = 1;
			foreach ($ListKelas->result() as $Row ) 
			{

				$var_Bab = $Row->kd_bab;
?>				
				<tr>
					<td><?php echo $Row->nama_bab;?></td>
					<td align="center">
						<a href="<?php echo base_url();?>Activity_lab/VeiwModvid/<?=$Row->kd_bab;?>" class="btn btn-sm btn-primary" id="id-btn-dialog2"> Mengerjakan Aktifitas Lab </a>
					</td>
				</tr>
<?php
			}
		}
		else
		{
			echo " <div class='alert alert-block alert-success'	>
						</strong>Aktifitas Lab tidak tersedia.
					</div>
			";
		}
?>
					</tbody>
				</table>
			</div><!-- /.span -->
		</div><!-- /.row -->
	</div>
</div>
<hr />


<div id="dialog-confirm" class="hide">
	<div class="alert alert-info bigger-110">
		These items will be permanently deleted and cannot be recovered.
	</div>

	<div class="space-6"></div>

	<p class="bigger-110 bolder center grey">
		<i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
		Are you sure?
	</p>
</div><!-- #dialog-confirm -->

<script type="text/javascript">
	

	$( "#id-btn-dialog2" ).on('click', function(e) {
					e.preventDefault();
				
					$( "#dialog-confirm" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Yakin Untuk Mengerjakan?</h4></div>",
						title_html: true,
						buttons: [
							{
								html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp;Mulai Nonton Modul Video ",
								"class" : "btn btn-danger btn-minier",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
							,
							{
								html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Batal",
								"class" : "btn btn-minier",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
						]
					});
				});

</script>

