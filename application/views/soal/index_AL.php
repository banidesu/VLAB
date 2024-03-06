<section class="content">
     <div class="row">
         <div class="col-md-12">
           <h3 class="row header smaller lighter blue">
                     <span class="col-xs-10"> <?php echo $subjudul;?> - <?php echo $nama_bab;?> </span><!-- /.col -->
                     <span class="col-xs-2" style="padding-left:45px;">
                   <button class="btn btn-small btn-info icon fa fa-plus" id="add" data-toggle="modal" data-target="#addData">Tambah Soal</button>
                    </span>
                    </span><!-- /.col -->
                   </h3>
                   <?php $no = 1;
                   foreach ($Data_Soal->result() as $row) {
                         ?>
                     <div id="accordion" class="accordion-style1 panel-group">
                     <div class="panel panel-default">
                       <div class="panel-heading">
                         <h4 class="panel-title">
                           <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $no; ?>">
                             <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                             &nbsp;Soal <?php echo $no; ?>
                           </a>
                         </h4>
                       </div>
                       <div class="panel-collapse collapse " id="collapse<?php echo $no; ?>">
                         <div class="panel-body">
                           <?php echo $row->soal;?>
                             <span class="" style="padding-left:10px;">
                             <button class="btn btn-small btn-info icon fa fa-plus" id="" data-toggle="modal" data-target="#editData<?php echo $row->kd_soal;?>" >Edit</button>
                             <div class="modal fade" id="editData<?php echo $row->kd_soal;?>" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                               <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                   <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                     <h4 class="modal-title" id="addLabel">Edit Data Soal <?php echo $no; ?></h4>
                                   </div>
                                     <form method="POST" action="<?php echo base_url();?>soal/simpan_data">
                                     <div class="modal-body">
                                            <div class="controls">
                                            <input type="text" name="kd_matkul" id="kd_matkul" placeholder="Kode Matakuliah" class="input-medium" value="<?php echo $kd_matkul;?>" hidden>
                                            <input type="text" name="kd_bab" id="kd_bab" placeholder="Kode Bab" class="input-small" value="<?php echo $kd_bab;?>"  hidden>
                                            <input type="text" name="kd_soal" id="kd_soal" placeholder="Kode Soal" class="input-small" value="<?php echo $row->kd_soal;?>" hidden >
                                            </div>
                                      <div class="controls">
                                          <textarea name="soal" class="autosize-transition form-control" id="soal" placeholder="Soal"><?=$row->soal;?></textarea>
                                          <input type="hidden" name="tipe" value="AL">
                                          <input type="hidden" name="keterangan" value="AL">
                                        </div>
                                     <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <button type="submit" onclick="" class="btn btn-primary">Save</button>
                                     </div>
                                 </form>
                               </div>
                             </div>
                            </div>
                            </div>
                             </span>
                             <span class="" style="">
                             <a href="<?php echo base_url()?>soal/delete_al/<?php echo $row->kd_soal;?>">
                                 <button class="icon fa fa-eraser btn btn-grey radius-6">
                                   <i class="bigger-100 "><b>Hapus</b></i>
                                 </button>
                             </a>
                             </span>
                           </div>
                       </div>
                     </div>
       <?php $no++; }?>
                   </div>
                 </div><!-- /.col -->
              </div>
</section>
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="addLabel">Tambah <?=$judul?></h4>
        </div>
          <form method="POST" action="<?php echo base_url();?>soal/simpan_data">
          <div class="modal-body">
            <div class="control-group">
              <div class="control-group">
                  <div class="controls">
                    <input type="text" name="kd_matkul" id="kd_matkul" placeholder="Kode Matakuliah" class="input-medium" value="<?php echo $kd_matkul;?>" hidden>
                    <input type="text" name="kd_bab" id="kd_bab" placeholder="Kode Bab" class="input-small" value="<?php echo $kd_bab;?>"  hidden>
                    <input type="text" name="kd_soal" id="kd_soal" placeholder="Kode Soal" class="input-small" value="<?php echo $kode_soal;?>" hidden >
                  </div>
              </div>
          </div>
          <div class="control-group">
            <div class="control-group">
              <div class="space-4"></div>
              <div class="controls">
                <textarea name="soal" class="autosize-transition form-control" id="soal" placeholder="Soal"></textarea>
              </div>
            </div>
            
            <div class="control-group">
                 <div class="controls">
                   <input type="text" name="keterangan" id="keterangan" placeholder="Keterangan" class="input-small" value="AL" hidden >
                   <input type="hidden" name="tipe" id="tipe" value="AL">

                 </div>
            </div>
            <div class="space-4"></div>
            <div class="space-4"></div>
            <div>
          </div>
        </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <button type="submit" onclick="" class="btn btn-primary">Save</button>
          </div>
      </form>
    </div>
  </div>
</div>
</div>
