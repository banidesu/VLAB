<div class="container">
    <h3>Data Praktikan </h3>
    <button id="btnAdd" class="btn btn-success">Add New </button>
    <table class="table table-bordered table-responsive" style="">
      <thead>
        <tr>
          <td>NPM</td>
          <td>Nama </td>
          <td>Kelas </td>
          <td>Username</td>
          <td>Password</td>
          <td>Foto</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody id="showdata">

      </tbody>
    </table>
  </div>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
    $(function(){
      showAllDatapraktikan();

      //add new
      $('#btnAdd').click(function(){
        $('#myModal').modal('show');
      });
       //function
       function showAllDatapraktikan(){
         $.ajax({
           url: '<?php echo base_url()?>datapraktikan/showAllDatapraktikan',
           async : false,
           dataType : 'json',
           success : function(data) {
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
              html += '<tr>'+
                        '<td>'+data[i].npm+'</td>'+
                        '<td>'+data[i].nama+'</td>'+
                        '<td>'+data[i].kelas+'</td>'+
                        '<td>'+data[i].username+'</td>'+
                        '<td>'+data[i].password+'</td>'+
                        '<td>'+data[i].foto+'</td>'+
                        '<td>'+
                          '<a href="javascript:;" class="btn btn-info">Edit</a>'+
                          '<a href="javascript:;" class="btn btn-danger">delete</a>'+
                        '</td>'+
                      '</tr>';
            }
             $('#showdata').html(html);
           },
           error : function(){
             alert('Could not get data from Database');
           }
         });
       }
    });

</script>
