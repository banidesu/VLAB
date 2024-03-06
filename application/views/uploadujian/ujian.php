<script type="text/javascript">
            jQuery(function($) {
                var oTable1 = 
                $('#dynamic-table')
                
                .dataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                    null, null,null, null,
                      { "bSortable": false },
                  ] } );
            
            })
        </script>
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header widget-header-flat">
                <h4 class="widget-title smaller">Aktivasi Ujian Praktikum</h4>
            </div>
            <div class="widget-body">
                <div class="widget-main">
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
                            $data_matkul = $this->db->query("SELECT * FROM tbmatkul ORDER BY nama_matkul ASC ");
                            foreach ($data_matkul->result() as $Row ) 
                            {
                        ?>

                            <tr>
                                <td class="center"><?=$No++;?></td>
                                <td width="10%"><?=$Row->kd_matkul;?></td>
                                <td><?=$Row->nama_matkul;?></td>
                                <td class="center" width="10%"><?=$Row->jml_bab;?></td>
                                <td class="center" width="20%"><?=$Row->t_ajaran;?></td>
                                <td class="hidden-600 center" width="5%">
                                    <form method="post" action="<?php echo base_url();?>ujian/aktifasi_ujian">
                                        <?php
                                            if ($Row->status == "Tidak Aktif") 
                                            {
                                        ?>
                                                <input type="hidden" name="status" value="Aktif">
                                                <input type="hidden" name="kd_matkul" value="<?=$Row->kd_matkul;?>">
                                                <input type="submit" name="submit" class="btn btn-minier btn-danger" value="Aktif">
                                        <?php        
                                            }
                                            else
                                            {
                                        ?>  
                                                <input type="hidden" name="status" value="Tidak Aktif">
                                                <input type="hidden" name="kd_matkul" value="<?=$Row->kd_matkul;?>">
                                                <input type="submit" name="submit" class="btn btn-minier btn-primary" value="Tidak Aktif">
                                        <?php        
                                            }
                                        ?>
                                    </form>
                                </td>
                            </tr>

                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
	<div class="col-sm-4">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Upload Ujian</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<?php echo form_open_multipart('ujian/upload');?>	
						<div class="control-group">    
                           <label class="control-label">Kode Ujian</label>    
                                <div class="controls">     
 	                              <input type="text" name="kd_ujian" id="kd_ujian" class=" form-control" >  
                                </div>  
                        </div> 
                        <div class="control-group">    
                           <label class="control-label">Mata Kuliah</label>    
                                <div class="controls">
                                	<select name="nama_matkul" class="form-control" >
                                	<?php 
                                		$data_matkul = $this->db->query("SELECT * FROM tbmatkul ORDER BY nama_matkul ASC ");
                                		foreach ($data_matkul->result() as $Row) 
                                		{
                                	?>
                                		<option value="<?php echo $Row->kd_matkul ;?>"> 
                                			<?php echo $Row->nama_matkul;?>
                            			</option>
                                	<?php
                                		}
                                	?>     
                               		</select>
                                </div>  
                        </div> 
                        <div class="control-group">    
                           <label class="control-label">Tipe Soal</label>    
                                <div class="controls">     
 	                              <input type="text" name="tipe_soal" id="tipe_soal" class=" form-control" >  
                                </div>  
                        </div> 

						<div class="space-12"></div>
						<div class="control-group">    
                       		<input type="file" name="userfile" size="20" />
                    	</div> 

                        <div class="control-group">    
                             
                                <div class="controls">     
 	                              <input type="text" name="status" id="status" class="input-xlarge" value="0" hidden >  
                                </div>  
                        </div> 
                    	<div class="space-12"></div>
                    	<div class="control-group">    
                       		<input type="submit" name="submit" class="btn btn-primary" value="Upload">
                       		<input type="reset" name="reset" class="btn btn-denger" value="Reset">
                    	</div> 
					</form>
				</div>
			</div>
		</div>
	</div>
    <div class="col-sm-8">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                </tr>
                <th>Kode Ujian</th>
                <th>Matakuliah</th>
                <th>Tipe Soal</th>
                <th>Status</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php

            foreach ($dataujian->result() as $row){
            ?>  
                <tr>
                
                    <td><?php echo $row->kd_ujian; ?></td>
                    <td><?php echo $row->nama_matkul; ?></td>
                    <td><?php echo $row->tipe_soal; ?></td>
                    <td align="center">
                    	<form method="post" action="<?php echo base_url();?>ujian/aktifasi_soal" >
                    	<?php 
                    		if ($row->status == 0 ) 
                    		{
                    	?>
                    			<input type="hidden" name="status" value="1">
                    			<input type="hidden" name="kd_ujian" value="<?=$row->kd_ujian;?>">
                    			<input type="submit" name="submit" class="btn btn-minier btn-danger" value="Aktif">
                    	<?php
                    		}else
                    		{
                    	?>
                    			<input type="hidden" name="status" value="0">
                    			<input type="hidden" name="kd_ujian" value="<?=$row->kd_ujian;?>">
                    			<input type="submit" name="submit" class="btn btn-minier btn-primary" value="Tidak Aktif">
                    	<?php
                    		} 
                    	?>
                    	
                    	</form>
                    </td>
                    <td>
                        <center>
                        <a href="<?php echo base_url()?>ujian/delete/<?php echo $row->kd_ujian;?>" onclick="return confirm('Anda yakin ingin menghapus data ini?'); ">
                                <i class="ace-icon fa fa-trash-o bigger-120">
                                </i>
                            </span>
                        </a> 
                       
                        </center>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
<div class="space-6"></div>

</div>
</div>




