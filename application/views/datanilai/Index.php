<?php 
        $Id_Temp = 0;
        foreach ($data_nilai->result() as $Row) 
        {
            $Id_Temp++;
            $bab = substr($Row->nama_bab,0,25);
?>
<div class="col-xs-6 col-sm-3 pricing-box">
    <div class="widget-box widget-color-blue">
        <div class="widget-header">
            <h6 class="widget-title bigger lighter"><?php echo $bab;?></h6>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <ul class="list-unstyled spaced2">
                    <li>
                        <i class="ace-icon fa fa-book "></i>
                        <?php echo $Row->nama_matkul;?>
                    </li>
                    <li>
                        <i class="ace-icon fa  fa-check-square-o "></i>
                        Minggu Ke <?php echo $Row->minggu;?>
                    </li>
                    <li>
                        <i class="ace-icon fa fa-folder-open"></i>
                        Semester <?php echo $Row->t_ajaran;?>
                    </li>
                </ul>
                <hr />
            </div>
            <div>
                <a href="<?php echo base_url();?>datanilai/Praktikum?Kd_Matkul=<?=$Row->kd_matkul;?>&Kd_Bab=<?=$Id_Temp;?>" class="btn btn-block btn-primary">
                    <i class="ace-icon fa fa-pencil bigger-110"></i>
                    <span>LIHAT</span>
                </a>
            </div>
        </div>
    </div>
</div>
<?php }?>
