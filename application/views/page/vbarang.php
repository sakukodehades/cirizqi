<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Blank page
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Blank page</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="col-md-12">
                         
                        <div class="box box-primary" id="div-formbrg">
                                <div class="box-header" data-toggle="tooltip" title="Header tooltip">
                                    <h3 class="box-title">Master Barang</h3>
                                    
                                </div>
                                <div class="box-body">
                                    <form role="form" action="<?=site_url('barang/add');?>" method="POST" id="form-barang">
                                    <input type="hidden" id="id-barang" name="id-barang"/>
                                   <div class="row">
                                        <div class="col-md-4 col-md-offset-1">
                                            <div class="form-group">
                                            <label>Kode</label>
                                            <input type="text" class="form-control master-brg" name="kd-barang" id="kd-barang" placeholder="Kode Barang"> 
                                            <span id="err-kd" class="error-form"></span>                                           
                                            </div>                                            
                                        </div>

                                         <div class="col-md-4 col-md-offset-2">
                                            <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" class="form-control master-brg" name="nm-barang" id="nm-barang" placeholder="Nama Barang">
                                            <span id="err-nm" class="error-form"></span> 
                                            </div>
                                        </div>
                                   </div>

                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-1">
                                            <div class="form-group">
                                            <label>Satuan</label>
                                            <input type="text" class="form-control master-brg" name="satuan" id="satuan" placeholder="Satuan">
                                            <span id="err-stn" class="error-form"></span> 
                                            </div>
                                        </div>
                                         <div class="col-md-4 col-md-offset-2">
                                            <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text" class="form-control master-brg" name="harga" id="harga" placeholder="Harga Barang">
                                            <span id="err-hrg" class="error-form"></span> 
                                            </div>
                                        </div>
                                   </div>                           
                                  
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary btn-flat">Save</button>
                                     <button type="button" class="btn btn-default btn-flat">Cancel</button>
                                </div><!-- /.box-footer-->
                            </form>
                            </div><!-- /.box -->
                             
                          <div class="box box-primary" id="div-barang">
                                <div class="box-header">
                                    <h3 class="box-title">Daftar Barang</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="tblBarang" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Satuan</th>
                                                <th>Harga</th>
                                                <th>aksi</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                    </div>
                </section><!-- /.content -->
<!--modal-->
<div class="modal fade" id="modal-brg">
  <div class="modal-dialog">
    <div class="modal-content">
     
      <div class="modal-body" id="modal-brg-body">
        
      </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
$(document).ready(function() {

    var oTable = $('#tblBarang').dataTable( {
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": '<?php echo site_url('barang/get_all');?>',
                "bJQueryUI": false,
                "iDisplayStart ":20,
                "oLanguage": {
            "sProcessing": ""
        },  
        "fnInitComplete": function() {
                //oTable.fnAdjustColumnSizing();
         },
                'fnServerData': function(sSource, aoData, fnCallback)
            {
              $.ajax
              ({
                'dataType': 'json',
                'type'    : 'POST',
                'url'     : sSource,
                'data'    : aoData,
                'success' : fnCallback
              });
            }
    } );

    $( document ).on( "click", ".btnbrg-del", function() {
       var aPos = oTable.fnGetPosition(this.parentNode);
       var aData = oTable.fnGetData(aPos[0]);
       $.ajax({
       type: "GET",
       url: "<?php echo site_url('barang/delete');?>",
       dataType : "json",
       data: "id="+aData[0],
       success: function(data){
       oTable.fnDeleteRow(aPos[0]);
       notifSuccess(data.msg,'del');
       }
       });
        
  });

 
} );

    function addRowTable(){

        $('#tblBarang').dataTable().fnAddData( [
            $('#kd-barang').val(),
            $('#nm-barang').val(),
            $('#satuan').val(),
            $('#harga').val(),
            'btn'
         ] );
    }

            function notifSuccess(msg,context){
                
                  if(context == 'add')  
                    stack_context = {
                    "dir1": "down",
                    "dir2": "left",
                    "context": $("#div-formbrg")
                    };
                  else if(context == 'del'){
                    stack_context = {
                    "dir1": "down",
                    "dir2": "left",
                    "context": $("#div-barang")
                    };
                  }

                PNotify.prototype.options.styling = "fontawesome";
                new PNotify({
                    title: 'Sukses',
                    text: msg,
                    buttons:{
                        sticker:false
                    },
                    delay:5000,
                    type: 'success',
                    stack : stack_context,
                    cornerclass: 'ui-pnotify-sharp'
                });
            }


 
            $('#form-barang').submit(function( event ) {
              
              event.preventDefault();
              $("#div-notif").html();
              $.post(this.action, $(this).serialize(),function(data){
                    if(data.status == 'error'){
                        $("#err-kd").html(data.error_kode);
                        $("#err-nm").html(data.error_nama);
                        $("#err-stn").html(data.error_satuan);
                        $("#err-hrg").html(data.error_harga);
                    }else if(data.status == 'success'){
                        notifSuccess(data.msg,'add')
                        addRowTable();
                        $(".master-brg").val("");
                        $(".error-form").html("");
                        $("#kd-barang").focus();                       
                    }
              },"json")
            });

</script>