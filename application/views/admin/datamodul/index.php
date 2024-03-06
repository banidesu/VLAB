<div class="row">
  <div class="col-xs-12">
      <a href="#modal-form" role="button" data-toggle="modal" class="btn btn-primary" style="margin-bottom: 10px;"> Tambah Modul</a>
    <?=$valid?>
    <table id="simple-table" class="table table-striped table-bordered table-hover">
      <thead >
        <tr >
          <th style="text-align: center; width: 2%;">No</th>
          <th style="text-align: center;">Nama</th>
          <th style="text-align: center; width: 10%;">Tanggal Post</th>
          <th style="text-align: center; width: 10%;">Status</th>
          <th style="text-align: center; width: 10%;">Aksi</th>
        </tr>
      </thead>

      <tbody>

      <?php
      $No = 1;

      if ($DataModul_Query->num_rows() > 0 ) 
      {
          foreach ($DataModul_Query->result() as $ResultValue ) 
          {

          ?>
            <tr>
              <td><?=$No++;?></td>
              <td><?=$ResultValue->nama?></td>
              
              <td align="center"><?=$ResultValue->tanggal_post?></td>
              <td align="center">
                <form action="<?php echo base_url()?>Admin/ubah_status_modul" method="post">
                  
                  <?php
                      if ( $ResultValue->status== 1 ) 
                      {
                  ?>
                      <input type="hidden" name="id" value="<?=$ResultValue->id?>">
                      <input type="hidden" name="status" value="0">
                      <input type="submit" name="submit" class="btn btn-xs btn-primary" value="Tidak Aktif">
                  <?php     
                      }

                  ?>

                  <?php
                      if ( $ResultValue->status== 0 ) 
                      {
                  ?>
                      <input type="hidden" name="id" value="<?=$ResultValue->id?>">
                      <input type="hidden" name="status" value="1">
                      <input type="submit" name="submit" class="btn btn-xs btn-danger" value="Aktif">
                  <?php     
                      }

                  ?>
                  

                </form>
              </td>
              <td >
                  <a href="#modal-form<?php echo $ResultValue->id; ?>" role="button" data-toggle="modal" class="btn btn-minier btn-blue">Ubah</a>
                  <a href="<?php echo base_url();?>admin/hapus_modul/<?php echo $ResultValue->id;?>" class="btn btn-minier btn-yellow">Hapus</a>

                  <div id="modal-form<?php echo $ResultValue->id; ?>" class="modal" tabindex="-1">
                    <form action="<?php echo base_url();?>admin/modul" enctype="multipart/form-data" method="post" accept-charset="utf-8" >

                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="blue bigger">Ubah data modul <?php echo $ResultValue->nama;?></h4>
                              </div>

                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-xs-12 col-sm-5">
                                    <div class="space"></div>
                                    <input type="file" name="userfile" />
                                    <input type="hidden" name="id" value="<?php echo $ResultValue->id; ?>" />

                                    <div class="well well-sm" style="margin-top: 10px"> Format harus .pdf </div>

                                  </div>
                                  <div class="col-xs-12 col-sm-7">
                                    <div class="form-group">
                                      <label for="form-field-select-3">Nama Mata Kuliah</label>
                                      <div>
                                        <select class="form-control" id="form-field-select-1" name="nama" required>
                                          <option value=""></option>
                                        <?php
                                          foreach ($DataMatkul_Query->result() as $Row) 
                                          {
                                        ?>
                                                <option value="<?php echo $Row->nama_matkul;?>"><?php echo $Row->nama_matkul;?></option>
                                        <?php
                                          }
                                        ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                      <label for="form-field-username">Deskripsi</label>
                                      <div>
                                        <textarea name="deskripsi" class="form-control" id="form-field-8" placeholder="Default Text" required><?php echo $ResultValue->deskripsi; ?></textarea>
                                      </div>
                                    </div>

                                    <div class="space-4"></div>

                                    <div class="form-group">
                                      <label for="form-field-first">Status</label>

                                      <div>
                                        <select class="form-control" id="form-field-select-1" name="status">
                                          <option <?php if($ResultValue->status == 1 ){ echo "selected"; } ?> value="1">Aktif</option>
                                          <option <?php if($ResultValue->status == 0 ){ echo "selected"; } ?> value="0">Tidak Aktif</option>
                                        </select>
                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="modal-footer">
                                <button class="btn btn-sm" data-dismiss="modal">
                                  <i class="ace-icon fa fa-times"></i>
                                  Batal
                                </button>

                                <button class="btn btn-sm btn-primary" type="submit" name="ubah">
                                  <i class="ace-icon fa fa-check"></i>
                                  Perbarui
                                </button>
                              </div>
                            </div>
                          </div>
                    </form>
                  </div><!-- PAGE CONTENT ENDS -->
              </td>
            </tr> 
        <?php
          }
      }
      else
      {
        echo "<td colspan='5' align='center'><h1>data tidak ada!!!<h1></td>";
      }

      ?>
      </tbody>
    </table>
  </div>
</div>

<div id="modal-form" class="modal" tabindex="-1">
  <form action="<?php echo base_url();?>admin/modul" enctype="multipart/form-data" method="post" accept-charset="utf-8" >

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="blue bigger">Tambah data modul</h4>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12 col-sm-5">
                  <div class="space"></div>
                  <input type="file" name="userfile" />
                  <div class="well well-sm" style="padding-top: 10px"> Format harus .pdf </div>
                </div>
                <div class="col-xs-12 col-sm-7">
                  <div class="form-group">
                    <label for="form-field-select-3">Nama Mata Kuliah</label>
                    <div>
                      <select class="form-control" id="form-field-select-1" name="nama">
                        <option value=""></option>
                      <?php
                        foreach ($DataMatkul_Query->result() as $Row) 
                        {
                      ?>
                              <option value="<?php echo $Row->nama_matkul;?>"><?php echo $Row->nama_matkul;?></option>
                      <?php
                        }
                      ?>
                      </select>
                    </div>
                  </div>
                  <div class="space-4"></div>
                  <div class="form-group">
                    <label for="form-field-username">Deskripsi</label>
                    <div>
                      <textarea name="deskripsi" class="form-control" id="form-field-8" placeholder="Default Text"></textarea>
                    </div>
                  </div>

                  <div class="space-4"></div>

                  <div class="form-group">
                    <label for="form-field-first">Status</label>

                    <div>
                      <select class="form-control" id="form-field-select-1" name="status">
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                      </select>
                      
                    </div>
                  </div>
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



   

