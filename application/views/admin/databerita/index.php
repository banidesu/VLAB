
<div class="row">
  <div class="col-xs-12">
      <a href="<?php echo base_url();?>Admin/tambah_berita" class="btn btn-primary" style="margin-bottom: 10px;"> Tambah Berita</a>
    <?=$valid?>
    <table id="simple-table" class="table table-striped table-bordered table-hover">
      <thead >
        <tr >
          <th style="text-align: center; width: 2%;">No</th>
          <th style="text-align: center;">Judul</th>
          <th style="text-align: center;">Gambar</th>
          <th style="text-align: center; width: 10%;">Tanggal Post</th>
          <th style="text-align: center; width: 10%;">Status</th>
          <th style="text-align: center; width: 10%;">Aksi</th>
        </tr>
      </thead>

      <tbody>

      <?php
      $No = 1;

      if ($DataBerita_Query->num_rows() > 0 ) 
      {
          foreach ($DataBerita_Query->result() as $ResultValue ) 
          {

          ?>
            <tr>
              <td><?=$No++;?></td>
              <td><?=$ResultValue->judul?></td>
              <td width="10">
                 <ul class="ace-thumbnails clearfix " >
                    <li >
                      <div>
                        <img width="222" height="155" alt="150x150" src="<?php echo base_url();?>assets/uploads/images/berita/<?=$ResultValue->gambar?>" />
                          <div class="text">
                            <div class="inner">
                              <span><?=$ResultValue->gambar?></span>
                              <br />
                              <a href="<?php echo base_url();?>assets/uploads/images/berita/<?=$ResultValue->gambar?>" data-rel="colorbox">
                              <i class="ace-icon fa fa-search-plus"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                    </li>
                  </ul>
              </td>
              
              <td align="center"><?=$ResultValue->tanggal_post?></td>
              <td align="center">
                <form action="<?php echo base_url()?>Admin/ubah_status_berita" method="post">
                  
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
                  <a href="<?php echo base_url();?>admin/ubah_berita/<?php echo $ResultValue->id;?>" class="btn btn-minier btn-blue">Lihat</a>
                  <a href="<?php echo base_url();?>admin/hapus_berita/<?php echo $ResultValue->id;?>" class="btn btn-minier btn-yellow">Hapus</a>
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

                <div style="display: none;">
                  <ul class="ace-thumbnails clearfix " >
                    <li >
                      <div>
                        <img width="222" height="155" alt="150x150" src="<?php echo base_url();?>assets/images/gallery/bay.jpg" />
                          <div class="text">
                            <div class="inner">
                              <span>Programmer</span>
                              <br />
                              <a href="<?php echo base_url();?>assets/images/gallery/bay.jpg" data-rel="colorbox">
                              <i class="ace-icon fa fa-search-plus"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                    </li>
                  </ul>
                </div>

 