
<button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Tambah Praktikan </button>
<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
<br />
<br />
<div class="">
<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Username</th>
            <th>Password</th>
            <th style="width:145px;">Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>

    <tfoot>
    <tr>
      <th>NPM</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Username</th>
      <th>Password</th>
        <th>Action</th>
    </tr>
    </tfoot>
</table>
</div>
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>

<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('datapraktikan/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });

    //set input/textarea/select event when change value, remove class error and remove text help block
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});



function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tanbah Praktikan'); // Set Title to Bootstrap modal title
}

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('datapraktikan/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="npm"]').val(data.npm);
            $('[name="username"]').val(data.username);
            $('[name="password"]').val(data.password);
            $('[name="nama"]').val(data.nama);
            $('[name="kelas"]').val(data.kelas);
            $('[name="foto"]').val(data.foto);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Ubah Data Praktikan'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('datapraktikan/ajax_add')?>";
    } else {
        url = "<?php echo site_url('datapraktikan/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('NPM Sudah Ada');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}

function delete_person(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('datapraktikan/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">NPM</label>
                            <div class="col-md-9">
                                <input name="npm" placeholder="NPM.." class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">USERNAME</label>
                            <div class="col-md-9">
                                <input name="username" placeholder="Username.." class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">PASSWORD</label>
                            <div class="col-md-9">
                                <input name="password" placeholder="Password.." class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">NAMA</label>
                            <div class="col-md-9">
                                <input type="text" name="nama" placeholder="Nama.." class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">KELAS</label>
                            <div class="col-md-9">
                                <input type="text" name="kelas" placeholder="Kelas.." class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" style="display: none;">
                            <label class="control-label col-md-3">FOTO</label>
                            <div class="col-md-9">
                                <input type="hidden" name="foto" placeholder="Foto.." class="form-control" value="user1.jpg"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                                <input type="hidden" name="kehadiran1" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="kehadiran2" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="kehadiran3" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="kehadiran4" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="kehadiran5" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="kehadiran6" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="kehadiran7" value="0" placeholder="" class="form-control">
                                
                                <input type="hidden" name="al1" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="al2" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="al3" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="al4" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="al5" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="al6" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="al7" value="0" placeholder="" class="form-control">

                                <input type="hidden" name="ta1" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="ta2" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="ta3" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="ta4" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="ta5" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="ta6" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="ta7" value="0" placeholder="" class="form-control">
                                
                                <input type="hidden" name="quiz1" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="quiz2" value="0" placeholder="" class="form-control">
                                <input type="hidden" name="ujian" value="0" placeholder="" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
