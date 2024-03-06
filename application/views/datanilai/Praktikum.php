
<script type="text/javascript">
            jQuery(function($) {
                var oTable1 = 
                $('#dynamic-table')
                
                .dataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                    null, null,null, null, null, null, null, null,null,
                      { "bSortable": false },
                  ] } );
            })
        </script>
<script type="text/javascript">
        function cekform()
        {
                if(!$("#kelas").val())
                {
                    alert   ('Maaf Kelas tidak boleh kosong');
                    $("#kelas").focus();
                    return false;
                }
        }
</script>
<div class="row" >
<div class="clearfix" style="display: none;">
    <div class="pull-right tableTools-container"></div>
</div>

<div class="col-sm-12">
<!-- <?=$var_Query;?> -->
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
    <thead>
        </tr>
        <th>NO</th>
        <th>NPM</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Kehadiran</th>
        <th>AL</th>
        <th>TA</th>
        <th>Ujian</th>
        <th>Total</th>
        <th>Aksi</th>
        </tr>
    </thead>
<tbody>
    <?php
    $no = 1;
    foreach ($data_nilai->result() as $row)
    {
        $total = $row->Kehadiran + $row->AL + $row->TA + $row->ujian;
        ?>    
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row->npm; ?></td>
            <td><?php echo $row->nama; ?></td>
            <td><?php echo $row->kelas; ?></td>
            <td><?php echo $row->Kehadiran; ?></td>
            <td><?php echo $row->AL;  ?></td>
            <td><?php echo $row->TA;?></td>
            <td><?php echo $row->ujian;  ?></td>
            <td><?php echo $total;  ?></td>
            <td>
            <?php
                                        
                foreach ($Bab->result() as $Row) 
                {
                   $Kode_Bab = $Row->kd_bab;
                }

                $get_code = substr($Kode_Bab, 1, 2 );
                $var_Query = "SELECT 
                                tbtemp_al.*
                                , tbsoal_al.soal SoalAL
                                , tbbab.nama_bab
                                FROM tbtemp_al 
                                    INNER JOIN tbsoal_al
                                ON tbtemp_al.soal = tbsoal_al.kd_soal
                                    INNER JOIN tbbab
                                ON tbsoal_al.kd_bab = tbbab.kd_bab
                                WHERE tbtemp_al.npm = '".$row->npm."'
                                AND tbtemp_al.soal like '%".$get_code."%'";

                $Jawaban_AL = $this->db->query($var_Query);

                // ECHO $var_Query;
                $Tanggal = "";
                $Soal = "";
                $FileURL = "";
                $Jawaban = "";
                foreach ($Jawaban_AL->result() as $Row2 ) 
                {
                    $Tanggal = $Row2->tanggal_pengerjaan;
                    $Soal = $Row2->SoalAL;
                    $FileURL = $Row2->file;
                    $Jawaban = $Row2->jawaban;
                    $NamaBab = $Row2->nama_bab;
                }


                if($Jawaban != "" )
                {
                    $var_style = 'style="background-color: #69de2c !important; border-color: #69de2c;"';
                }
                else
                {
                    $var_style = '';
                }
            ?>
                <center>
                    <button class="btn btn-mini btn-info icon fa fa-pencil" id="editData" data-toggle="modal" data-target="#editData<?php echo $row->npm;?>"<?=$var_style?>></button>
                    <button class="btn btn-mini btn-info icon fa fa-book" id="UjianData" data-toggle="modal" data-target="#UjianData<?php echo $row->npm;?>"></button>
                </center>
                <!-- Update AL -->
                <div class="modal fade" id="editData<?php echo $row->npm;?>" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="addLabel">Koreksi jawaban Aktifitas Lab
            
                                </h4>
                            </div>
                                    <form method="POST" action="<?php echo base_url();?>datanilai/UpdateDatNilai/<?=$Id_Temp;?>">
                                        <div class="modal-body">
                                            <div class="control-group">
                                                <div class="well">
                                                    <?php
                                                        if ($Jawaban != "") 
                                                        {
                                                            $Button= '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                     <button type="submit" name="Submit" onclick="" class="btn btn-primary">Save</button>';
                                                    ?>

                                                 
                                                    <b>
                                                        <table>
                                                            <tr>
                                                                <td >Nama</td>
                                                                <td style="padding-left: 10px;">:</td>
                                                                <td style="padding-left: 10px;">
                                                                    <?=$row->nama;?>
                                                                </td>
                                                            </tr>
                                                            <tr >
                                                                <td >Tanggal & waktu pengerjaan</td>
                                                                <td style="padding-left: 10px;">:</td>
                                                                <td style="padding-left: 10px;">
                                                                    <?php

                                                                        if($Tanggal != "" )
                                                                        {
                                                                            echo $Tanggal." WIB"; 

                                                                        }
                                                                        else
                                                                        {
                                                                            echo "-";
                                                                        }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                             <tr>
                                                                <td >Nama Bab</td>
                                                                <td style="padding-left: 10px;">:</td>
                                                                <td style="padding-left: 10px;">
                                                                    <?=$NamaBab;?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </b>
                                                        <div class="space-4"></div>
                                                        <div class="space-4"></div>
                                                        <hr>
                                                        
                                                        <table>
                                                            <tr >
                                                                <td>Soal</td>
                                                                <td style="padding-left: 10px;">:</td>
                                                                <td style="padding-left: 10px;"><?=$Soal?></td>
                                                            </tr>
                                                            <tr >
                                                                <td>Jawaban</td>
                                                                <td style="padding-left: 10px;">:</td>
                                                                <td style="padding-left: 10px;"><textarea class="form-control" style="width: 301px; height: 30px;""><?=$Jawaban?></textarea>
                                                                </td>
                                                            </tr>
                                                            <tr >
                                                                <td>Lampiran File</td>
                                                                <td style="padding-left: 10px;">:</td>
                                                                <td style="padding-left: 10px;"><a href="<?php echo base_url()?>/assets/uploads/jawabanAL/<?=$FileURL?>" target="_blank"><?=$FileURL?></a></td>
                                                            </tr>

                                                            <tr >
                                                                <td>Masukan Nilai</td>
                                                                <td style="padding-left: 10px;">:</td>
                                                                <td style="padding-left: 6px;"><input type="text" name="al<?=$Id_Temp?>" id="al<?=$Id_Temp?>" class="input-small input-sm" value="<?php echo $row->AL;?>" required></td>
                                                            </tr>
                                                        </table>
                                                        <?php
                                                        } 
                                                        
                                                        else 
                                                        {
                                                            $Button = '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                                                        ?>
                                                            <center>
                                                                <b><h4 class="red smaller lighter">Belum Mengerjakan Aktifitas Lab</h4></b>
                                                            </center>
                                                    <?php
                                                        }
                                                        
                                                    ?>
                                                    <hr>
                                                </div>
                                                <div class="space-4"></div>
                                                <div class="space-4"></div>
                                                <div class="control-group">
                                                    <!-- <label class="control-label">Tugas Akhir :</label>   -->
                                                    <div class="controls">
                                                        <input type="hidden" placeholder="" class="input-xlarge" value="<?php echo $row->TA;?>" >
                                                        <input type="hidden" name="Kd_Bab" placeholder="" class="input-xlarge" value="<?php echo $Kd_Bab;?>" >
                                                        <input type="hidden" name="Kd_Matkul" placeholder="" class="input-xlarge" value="<?php echo $Kd_Matkul;?>" >
                                                        <input type="hidden" name="npm" id="npm" placeholder="" class="input-xlarge" value="<?php echo $row->npm;?>"  >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                               <?php
                                                echo $Button;
                                               ?>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                    </div>
                </div>
                <!-- Update Nilai Ujian -->
                <div class="modal fade" id="UjianData<?php echo $row->npm;?>" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="addLabel">Masukan Nilai Ujian 
            
                                </h4>
                            </div>
                                    <form method="POST" action="<?php echo base_url();?>datanilai/UpdateDatUjian">
                                        <div class="modal-body">
                                            <div class="control-group">
                                            <div class="well">
                                                    <b>
                                                        <table>
                                                            <tr>
                                                                <td >Nama</td>
                                                                <td style="padding-left: 10px;">:</td>
                                                                <td style="padding-left: 10px;">
                                                                    <?=$row->nama;?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </b>
                                                        <div class="space-4"></div>
                                                        <div class="space-4"></div>
                                                        <hr>
                                                        <table>
                                                            <tr >
                                                                <td>Masukan Nilai Ujian</td>
                                                                <td style="padding-left: 10px;">:</td>
                                                                <td style="padding-left: 6px;"><input type="text" name="ujian" id="ujian" class="input-small input-sm" value="<?php echo $row->ujian;?>" required></td>
                                                            </tr>
                                                        </table>
                                      
                                                    <hr>
                                                </div>
                                                <div class="space-4"></div>
                                                <div class="space-4"></div>
                                                <div class="control-group">
                                                    <!-- <label class="control-label">Tugas Akhir :</label>   -->
                                                    <div class="controls">
                                                        <input type="hidden" name="Kd_Bab" placeholder="" class="input-xlarge" value="<?php echo $Kd_Bab;?>" >
                                                        <input type="hidden" name="Kd_Matkul" placeholder="" class="input-xlarge" value="<?php echo $Kd_Matkul;?>" >
                                                        <input type="hidden" name="npm" id="npm" placeholder="" class="input-xlarge" value="<?php echo $row->npm;?>"  >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" name="Submit" onclick="" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                    </div>
                </div>
            </td>
        </tr>
     <?php
    }
?>
    </tbody>
    </table>
    </div>
    <div class="space-4"></div>
</div>


        <!-- page specific plugin scripts -->

        <script src="<?php echo base_url();?>assets/js/dataTables.tableTools.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/dataTables.colVis.min.js"></script>


        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function($) {
                //initiate dataTables plugin
                var oTable1 = 
                $('#dynamic-table')
                //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                
                //oTable1.fnAdjustColumnSizing();
            
            
                //TableTools settings
                TableTools.classes.container = "btn-group btn-overlap";
                TableTools.classes.print = {
                    "body": "DTTT_Print",
                    "info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
                    "message": "tableTools-print-navbar"
                }
            
                //initiate TableTools extension
                var tableTools_obj = new $.fn.dataTable.TableTools( oTable1, {
                    "sSwfPath": "<?php echo base_url();?>assets/swf/copy_csv_xls_pdf.swf",
                    
                    "sRowSelector": "td:not(:last-child)",
                    "sRowSelect": "multi",
                    "fnRowSelected": function(row) {
                        //check checkbox when row is selected
                        try { $(row).find('input[type=checkbox]').get(0).checked = true }
                        catch(e) {}
                    },
                    "fnRowDeselected": function(row) {
                        //uncheck checkbox
                        try { $(row).find('input[type=checkbox]').get(0).checked = false }
                        catch(e) {}
                    },
            
                    "sSelectedClass": "success",
                    "aButtons": [
                        {
                            "sExtends": "copy",
                            "sToolTip": "Copy to clipboard",
                            "sButtonClass": "btn btn-white btn-primary btn-bold",
                            "sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
                            "fnComplete": function() {
                                this.fnInfo( '<h3 class="no-margin-top smaller">Table copied</h3>\
                                    <p>Copied '+(oTable1.fnSettings().fnRecordsTotal())+' row(s) to the clipboard.</p>',
                                    1500
                                );
                            }
                        },
                        
                        {
                            "sExtends": "csv",
                            "sToolTip": "Export to CSV",
                            "sButtonClass": "btn btn-white btn-primary  btn-bold",
                            "sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
                        },
                        
                        {
                            "sExtends": "pdf",
                            "sToolTip": "Export to PDF",
                            "sButtonClass": "btn btn-white btn-primary  btn-bold",
                            "sButtonText": "<i class='fa fa-file-pdf-o bigger-110 red'></i>"
                        },
                        
                        {
                            "sExtends": "print",
                            "sToolTip": "Print view",
                            "sButtonClass": "btn btn-white btn-primary  btn-bold",
                            "sButtonText": "<i class='fa fa-print bigger-110 grey'></i>",
                            
                            "sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Optional Navbar &amp; Text</small></a></div></div>",
                            
                            "sInfo": "<h3 class='no-margin-top'>Print view</h3>\
                                      <p>Please use your browser's print function to\
                                      print this table.\
                                      <br />Press <b>escape</b> when finished.</p>",
                        }
                    ]
                } );
                //we put a container before our table and append TableTools element to it
                $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));
                
                //also add tooltips to table tools buttons
                //addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
                //so we add tooltips to the "DIV" child after it becomes inserted
                //flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
                setTimeout(function() {
                    $(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function() {
                        var div = $(this).find('> div');
                        if(div.length > 0) div.tooltip({container: 'body'});
                        else $(this).tooltip({container: 'body'});
                    });
                }, 200);
                
                
                
                //ColVis extension
                var colvis = new $.fn.dataTable.ColVis( oTable1, {
                    "buttonText": "<i class='fa fa-search'></i>",
                    "aiExclude": [0, 6],
                    "bShowAll": true,
                    //"bRestore": true,
                    "sAlign": "right",
                    "fnLabel": function(i, title, th) {
                        return $(th).text();//remove icons, etc
                    }
                    
                }); 
                
                //style it
                $(colvis.button()).addClass('btn-group').find('button').addClass('btn btn-white btn-info btn-bold')
                
                //and append it to our table tools btn-group, also add tooltip
                $(colvis.button())
                .prependTo('.tableTools-container .btn-group')
                .attr('title', 'Show/hide columns').tooltip({container: 'body'});
                
                //and make the list, buttons and checkboxed Ace-like
                $(colvis.dom.collection)
                .addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
                .find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
                .find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');
            
            
                
                /////////////////////////////////
                //table checkboxes
                $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
                
                //select/deselect all rows according to table header checkbox
                $('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
                    var th_checked = this.checked;//checkbox inside "TH" table header
                    
                    $(this).closest('table').find('tbody > tr').each(function(){
                        var row = this;
                        if(th_checked) tableTools_obj.fnSelect(row);
                        else tableTools_obj.fnDeselect(row);
                    });
                });
                
                //select/deselect a row when the checkbox is checked/unchecked
                $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
                    var row = $(this).closest('tr').get(0);
                    if(!this.checked) tableTools_obj.fnSelect(row);
                    else tableTools_obj.fnDeselect($(this).closest('tr').get(0));
                });
                
            
                
                
                    $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
                    e.stopImmediatePropagation();
                    e.stopPropagation();
                    e.preventDefault();
                });
                
                
                //And for the first simple table, which doesn't have TableTools or dataTables
                //select/deselect all rows according to table header checkbox
                var active_class = 'active';
                $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
                    var th_checked = this.checked;//checkbox inside "TH" table header
                    
                    $(this).closest('table').find('tbody > tr').each(function(){
                        var row = this;
                        if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                        else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
                    });
                });
                
                //select/deselect a row when the checkbox is checked/unchecked
                $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
                    var $row = $(this).closest('tr');
                    if(this.checked) $row.addClass(active_class);
                    else $row.removeClass(active_class);
                });
            
                
            
                /********************************/
                //add tooltip for small view action buttons in dropdown menu
                $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
                
                //tooltip placement on right or left
                function tooltip_placement(context, source) {
                    var $source = $(source);
                    var $parent = $source.closest('table')
                    var off1 = $parent.offset();
                    var w1 = $parent.width();
            
                    var off2 = $source.offset();
                    //var w2 = $source.width();
            
                    if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
                    return 'left';
                }
            
            })
        </script>
