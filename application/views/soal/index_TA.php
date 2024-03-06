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
                     if($no == 1) ;
                     else $active = null;
                         if($row->kunci_jaw =='jaw_a') $stat_a = 'checked'; else $stat_a = 'disabled';
                         if($row->kunci_jaw =='jaw_b') $stat_b = 'checked'; else $stat_b = 'disabled';
                         if($row->kunci_jaw =='jaw_c') $stat_c = 'checked'; else $stat_c = 'disabled';
                         if($row->kunci_jaw =='jaw_d') $stat_d = 'checked'; else $stat_d = 'disabled';
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
                           <div class="form-group">
                             <input type="radio" name="r<?php echo $no; ?>" class="minimal-orange" <?php echo $stat_a;?> /> <?php echo $row->jaw_a;?>
                             <br />
                             <input type="radio" name="r<?php echo $no; ?>" class="minimal-orange" <?php echo $stat_b;?>/> <?php echo $row->jaw_b;?>
                             <br />
                             <input type="radio" name="r<?php echo $no; ?>" class="minimal-orange" <?php echo $stat_c;?> /> <?php echo $row->jaw_c;?>
                             <br />
                             <input type="radio" name="r<?php echo $no; ?>" class="minimal-orange" <?php echo $stat_d;?> /> <?php echo $row->jaw_d;?>
                             </div>
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
                                       <div class="control-group">
                                         <div class="control-group">
                                           <!-- label class="control-label">Kode Mata Kuliah</label>   -->
                                             <div class="controls">
                                               <input type="text" name="kd_matkul" id="kd_matkul" placeholder="Kode Matakuliah" class="input-small" value="<?php echo $row->kd_matkul;?>" readonly hidden>
                                             </div>
                                         </div>
                                       <div class="control-group">
                                          <!-- <label class="control-label">Kode Bab</label>  -->
                                            <div class="controls">
                                              <input type="text" name="kd_bab" id="kd_bab" placeholder="Kode Bab" class="input-small" value="<?php echo $row->kd_bab;?>" readonly hidden>
                                            </div>
                                       </div>
                                       <div class="control-group">
                                         <!--  <label class="control-label">Kode Soal</label>  -->
                                           <div class="controls">
                                             <input type="text" name="kd_soal" id="kd_soal" placeholder="Kode Soal" class="input-small" value="<?php echo $row->kd_soal;?>" hidden>
                                           </div>
                                       </div>
                                       <div class="control-group">
                                        <label for="control-label">Soal </label>
                                         <div class="controls">
                                           <textarea name="soal" class="autosize-transition form-control" id="soal" placeholder="Soal"><?php echo $row->soal;?></textarea>
                                         </div>
                                       </div>
                                       <div class="control-group">
                                         <label class="control-label">Pilihan A</label>
                                           <div class="controls">
                                             <textarea name="jaw_a" class="autosize-transition form-control" id="jaw_a" placeholder=""><?php echo $row->jaw_a;?></textarea>
                                           </div>
                                       </div>
                                       <div class="control-group">
                                         <label class="control-label">Pilihan B</label>
                                           <div class="controls">
                                             <textarea name="jaw_b" class="autosize-transition form-control" id="jaw_b" placeholder=""><?php echo $row->jaw_b;?></textarea>
                                           </div>
                                       </div>
                                       <div class="control-group">
                                         <label class="control-label">Pilihan C</label>
                                           <div class="controls">
                                             <textarea name="jaw_c" class="autosize-transition form-control" id="jaw_c" placeholder=""><?php echo $row->jaw_c;?></textarea>
                                           </div>
                                       </div>
                                       <div class="control-group">
                                         <label class="control-label">Pilihan D</label>
                                           <div class="controls">
                                             <textarea name="jaw_d" class="autosize-transition form-control" id="jaw_d" placeholder=""><?php echo $row->jaw_d;?></textarea>
                                           </div>
                                       </div>
                                       <div class="control-group">
                                         <label class="control-label">Jawaban Benar</label>
                                           <div class="controls">
                                             <select name="kunci_jaw" id="kunci_jaw">
                                               <option value="jaw_a" <?php if($row->kunci_jaw == 'jaw_a'){ echo "selected"; } ?>>A</option>
                                               <option value="jaw_b" <?php if($row->kunci_jaw == 'jaw_b'){ echo "selected"; } ?>>B</option>
                                               <option value="jaw_c" <?php if($row->kunci_jaw == 'jaw_c'){ echo "selected"; } ?>>C</option>
                                               <option value="jaw_d" <?php if($row->kunci_jaw == 'jaw_d'){ echo "selected"; } ?>>D</option>
                                             </select>
                                           </div>
                                       </div>
                                       <div class="control-group">
                                            <div class="controls">
                                              <input type="text" name="keterangan" id="keterangan" placeholder="Keterangan" class="input-small" value="<?php echo $row->keterangan;?>" readonly hidden>
                                              <input type="hidden" name="tipe" id="tipe" value="TA" >

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
                             </span>
                             <span class="" style="">
                             <a href="<?php echo base_url()?>soal/delete/<?php echo $row->kd_soal;?>">
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
          <h4 class="modal-title" id="addLabel">Tambah <?=$judul?> </h4>
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
              <div class="space-4"></div>
                <div class="controls">
                  <textarea name="jaw_a" class="autosize-transition form-control" id="jaw_a" placeholder="Pilihan A"></textarea>
                </div>
            </div>
            <div class="control-group">
              <div class="space-4"></div>
                <div class="controls">
                  <textarea name="jaw_b" class="autosize-transition form-control" id="jaw_b" placeholder="Pilihan B"></textarea>
                </div>
            </div>
            <div class="control-group">
              <div class="space-4"></div>
                <div class="controls">
                  <textarea name="jaw_c" class="autosize-transition form-control" id="jaw_c" placeholder="Pilihan C"></textarea>
                </div>
            </div>
            <div class="control-group">
              <div class="space-4"></div>
                <div class="controls">
                  <textarea name="jaw_d" class="autosize-transition form-control" id="jaw_d" placeholder="Pilihan D"></textarea>
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Jawaban Benar</label>
                <div class="controls">
                  <select name="kunci_jaw" id="kd_matkul">
                    <option value="jaw_a">A</option>
                    <option value="jaw_b">B</option>
                    <option value="jaw_c">C</option>
                    <option value="jaw_d">D</option>
                  </select>
                </div>
            </div>
            <div class="control-group">
                 <div class="controls">
                   <input type="text" name="keterangan" id="keterangan" placeholder="Keterangan" class="input-small" value="TA" hidden >
                   <input type="hidden" name="tipe" id="tipe" value="TA" >
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
