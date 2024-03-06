<script type="text/javascript">
            jQuery(function($) {
                var oTable1 = 
                $('#dynamic-table')
                
                .dataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                    null, null,null, null, null,
                      { "bSortable": false },
                  ] } );
            })
        </script>
<div class="row">
	<div class="col-sm-12">
	 <a href="#modal-form" role="button" data-toggle="modal" class="btn btn-primary" style="margin-bottom: 10px;"> Tambah Praktikum </a>
		<?=$valid?>
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
		    <thead>
		        </tr>
		        <th>No</th>
		        <th>Kelas</th>
		        <th>Kode</th>
		        <th>Matakuliah</th>
		        <th>Tahun Ajaran</th>
		        <th style="text-align: center;width: 10%;">Aksi</th>
		        </tr>
		    </thead>
			<tbody>

			<?php 

			if ($data_praktikum->num_rows() > 0 ) 
			{
					$No = 1;
					foreach ($data_praktikum->result() as $Row ) 
					{
				?>
					    <tr>
					        <td><?php echo $No++;?></td>
					        <td><?php echo $Row->kelas;?></td>
					        <td><?php echo $Row->kd_matkul;?></td>
					        <td><?php echo $Row->nama_matkul;?></td>
					        <td><?php echo $Row->t_ajaran;?></td>
					        <td align="center">
	                  			<a href="<?php echo base_url();?>admin/hapus_praktikum/<?=$Row->kelas;?>" class="btn btn-minier btn-yellow">Hapus</a>
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

<div id="modal-form" class="modal" tabindex="-1">
  <form action="<?php echo base_url();?>admin/data_praktikum" enctype="multipart/form-data" method="post" accept-charset="utf-8" >

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="blue bigger">Tambah Data Praktikum</h4>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="form-field-select-3">Nama Mata Kuliah</label>
                    
                      <select class="form-control" id="form-field-select-1" name="kd_matkul" required>
                        <option value=""></option>
                      <?php
                      	$DataMatkul_Query = $this->db->query("SELECT * FROM tbmatkul");
                        foreach ($DataMatkul_Query->result() as $Row) 
                        {
                      ?>
                            <option value="<?php echo $Row->kd_matkul;?>"><?php echo $Row->nama_matkul;?></option>
                      <?php
                        }
                      ?>
                      </select>
                  </div>
                   <div class="form-group">
                     <input type="text" name="kelas" class="form-control" placeholder="Masukan Kelas..." required>
                    </div>
                  <div class="space-4"></div>
                  <div class="space-4"></div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-sm" data-dismiss="modal">
                <i class="ace-icon fa fa-times"></i>
                Cancel
              </button>

              <button class="btn btn-sm btn-primary" type="submit" name="submit">
                <i class="ace-icon fa fa-check"></i>
                Save
              </button>
            </div>
          </div>
        </div>
  </form>
</div><!-- PAGE CONTENT ENDS -->




