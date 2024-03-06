<script type="text/javascript">
            jQuery(function($) {
                var oTable1 = 
                $('#dynamic-table')
                
                .dataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                    null, null,null, null, null,null,
                      { "bSortable": false },
                  ] } );
            })
        </script>
<div class="row">
	<div class="col-sm-12">
	 <a href="<?php echo base_url();?>Admin/tambah_asisten" class="btn btn-primary" style="margin-bottom: 10px;">Tambah Asisten</a>
	 <?=$valid;?>
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
		    <thead>
		        </tr>
		        <th>No</th>
		        <th>Kode</th>
		        <th>Nama</th>
		        <th>NPM</th>
		        <th>Kelas</th>
		        <th>Jabatan</th>
		        <th style="text-align: center;width: 10%;">Aksi</th>
		        </tr>
		    </thead>
			<tbody>

			<?php 

			if ($data_asisten->num_rows() > 0 ) 
			{
					$No = 1;
					foreach ($data_asisten->result() as $Row ) 
					{
				?>
					    <tr>
					        <td><?php echo $No++;?></td>
					        <td><?php echo $Row->kd_asisten;?></td>
					        <td><?php echo $Row->nama_lengkap;?></td>
					        <td><?php echo $Row->npm;?></td>
					        <td><?php echo $Row->kelas;?></td>
					        <td><?php echo $Row->status;?></td>
					        <td>
					        	<a href="<?php echo base_url();?>Admin/lihat_asisten/<?php echo $Row->id;?>" class="btn btn-minier btn-blue">Lihat</a>
	                  			<a href="<?php echo base_url();?>Admin/hapus_asisten/<?php echo $Row->id;?>" class="btn btn-minier btn-yellow">Hapus</a>
					        </td>
					    </tr>
	<?php
						
					}
			}
			else
		    {
				
		    	echo "<td colspan='7' align='center'><h1>data tidak ada!!!<h1></td>";
		    }

	?>


		    </tbody>
		                
		</table>
			<div class="space-6"></div>
	</div>
</div>




