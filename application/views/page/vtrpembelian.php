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
                         
                        <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Master Pembelian</h3>
                                    
                                </div>
                                <div class="box-body">
                                    <form role="form" action="<?php echo site_url('pembelian/save_master');?>" method="POST" id="form-trpembelian">
                                    <input type="hidden" id="id-barang" name="id-barang"/>
                                   <div class="row">
                                        <div class="col-md-4 col-md-offset-1">
                                            <div class="form-group">
                                            <label>Kode</label>
                                            <input type="text" class="form-control master-brg" name="kode" id="kode" placeholder="Kode"> 
                                            <span id="err-kd" class="error-form"></span>                                           
                                            </div>                                            
                                        </div>

                                         <div class="col-md-4 col-md-offset-2">
                                            <div class="form-group">
                                            <label>Tanggal</label>
                                             <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" name="tgl" id="tgl" value="<?php echo date('Y-m-d');?>">
                                            </div><!-- /.input group -->
                                            </div>
                                        </div>
                                   </div>

                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-1">
                                            <div class="form-group">
                                            <label>Suplier</label>
                                            <select class="form-control" name="suplier">
                                            <option value="" selected>--select suplier--</option>
                                            <?php 
                                            if(empty($suplier)){
                                                echo '<option value=""></option>';
                                            }else{
                                                foreach($suplier as $row){
                                                    echo '<option value="'.$row->noid.'">'.$row->nama.'</option>';
                                                }
                                            } ?>
                                            </select>
                                            </div>
                                        </div>                                         
                                   </div>                           
                                  
                                </div><!-- /.box-body -->                                
                            </div><!-- /.box -->

                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Detail Pembelian</h3>
                                    
                                </div>
                                <div class="box-body">
                                                           
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Kode/Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>SubTotal</th>
                                            </tr>
                                        </thead>  
                                        <tbody>
                                            <tr><input type="hidden" id="id-barang" />
                                                <td width="30%"><div class="form-group"><input type="text" id="nm-barang" class="form-control detail-beli" placeholder="Kode/Nama Barang"></div><input type="hidden" id="kd-barang" /></td>
                                                <td width="20%"><div class="form-group"><input type="text" id="qty" class="form-control detail-beli" placeholder="Qty" onkeyup="subtotal(this.value)"></div></td>
                                                <td width="20%"><div class="form-group"><input type="text" id="harga" class="form-control detail-beli" placeholder="Harga" readonly></td>
                                                <td width="30%"><div class="form-group"><input type="text" id="sub-total" class="form-control detail-beli" placeholder="SubTotal" readonly></td>
                                            </tr>
                                        </tbody>  
                                    </table> 
                                     <button type="button" class="btn btn-primary btn-flat" onclick="addList()"><i class="fa fa-plus"></i></button>
                                    <hr>                  
                                    <table id="listBeli" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>SubTotal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                       
                                        </tbody>
                                        
                                    </table>
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td width="30%">Total Item</td>
                                                    <td><div class="form-group"><input type="text" name="tot-item" class="form-control" value=0 readonly id="tot-item"></div></td>
                                                </tr> 
                                                <tr>
                                                    <td width="30%">Total Qty</td>
                                                    <td><div class="form-group"><input type="text" name="tot-qty" class="form-control" value=0 readonly id="tot-qty"></div></td>
                                                </tr>   
                                                <tr>
                                                    <td width="30%">Total Harga</td>
                                                    <td><div class="form-group"><input type="text" name="tot-hrg" class="form-control" value=0 readonly id="tot-hrg"></div></td>
                                                </tr> 
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                  
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="row">
                                    <div class="pull-right" style="margin-right:20px">
                                    <button type="submit" class="btn btn-primary btn-flat">Save</button>
                                    <button type="button" class="btn btn-default btn-flat">Cancel</button>
                                    </form>
                                    </div>
                                 </div>
                                </div><!-- /.box-footer-->
                            </div><!-- /.box -->
                             
                    </div>
                </section><!-- /.content -->
<script type="text/javascript">
$(function() {
    $( "#tgl" ).datepicker({
        format: 'yyyy-mm-dd',
    }); 
});
$(function() {
    $("#listBeli").dataTable();           
});

 $(function() {
  function split( val ) {
                return val.split( /,\s*/ );
        }
                function extractLast( term ) {
                 return split( term ).pop();
        }

        $( "#nm-barang" )
            // don't navigate away from the field on tab when selecting an item
              .bind( "keydown", function( event ) {
                if ( event.keyCode === $.ui.keyCode.TAB &&
                        $( this ).data( "autocomplete" ).menu.active ) {
                    event.preventDefault();
                }
            })
            .autocomplete({
                source: function( request, response ) {
                    $.getJSON( "<?php echo site_url('barang/get_list');?>",{  //Url of controller
                        term: extractLast( request.term )
                    },response );
                },
                search: function() {
                    // custom minLength
                    var term = extractLast( this.value );
                    if ( term.length < 1 ) {
                        return false;
                    }
                },
                focus: function() {
                    // prevent value inserted on focus
                    return false;
                },
                select: function( event, ui ) {
                    $("#id-barang").val(ui.item.id);
                    $("#nm-barang").val(ui.item.value);
                    $("#kd-barang").val(ui.item.kode);
                    $("#harga").val(ui.item.harga);
                    $("#qty").val(1);
                    $("#qty").focus();
                    $("#qty").select();

                    subtotal(1);

                    return false;
                }
            });
          
 });
$('form').keypress(function (e) {     
    var charCode = e.charCode || e.keyCode || e.which;
    if (charCode  == 13) {
        return false;
    }
});

 $("#nm-barang").keypress(function(e){
    
    var val = $(this).val();
    if(e.which == 13){

        if( val == ''){
            return false;
        }else if( val != ''){
            $("#qty").focus();
            $("#qty").selected();
            return false;
        }
    }

 });

 $( document ).on( "click", ".btn-delete-row", function() { 
        var aPos = oTable.fnGetPosition(this.parentNode);
        oTable.fnDeleteRow(aPos[0]);
        getTotal();
 });

 $("#qty").keypress(function(e){
    var nmbarang = $("#nm-barang").val();
        qty = $(this).val();
    if(e.which == 13){
        if(nmbarang == ''){
            $("#nm-barang").focus();
            return false;
        }else if(qty == ''){
            $(this).focus();
            return false;
        }else if(nmbarang != '' && qty != ''){
            addList();
            return false;
        }
    }
 });

 $('#form-trpembelian').submit(function( event ) {
              
    event.preventDefault();
    oTable = $('#listBeli').dataTable();

      var noidArray = []
      $('input[name^="noid"]').each(function() {
      noidArray.push($(this).val());
      });


      var firstsCellArray=[];
      var secondCellArray=[];
      $.each( oTable.fnGetData(), function(i, row){
          secondCellArray.push( noidArray[i]);
          secondCellArray.push( row[1]);
          secondCellArray.push( row[2]);
          secondCellArray.push( row[3]);
          secondCellArray.push( row[4]);

          firstsCellArray.push(secondCellArray);

          secondCellArray = [];

      });

      $.post(this.action, $(this).serialize(),function(data){
            var lastid = data.lastid;
            if(lastid != ''){
                $.post("<?php echo site_url('pembelian/save_detail');?>",{data:firstsCellArray,idpembelian:lastid},function(){
                    location.reload();
                });
            }
      },"json")
          

});


function subtotal(qty){

    var harga = $("#harga").val();
        sub = parseInt(qty)*parseInt(harga);
    $("#sub-total").val(sub);
}

function addList() {
    var id = $("#id-barang").val();
    var noid = '<input type="hidden" name="noid[]" value="'+id+'" />';
    var btn = '<button class="btn btn-danger btn-sm btn-flat btn-delete-row">delete</button>'+noid;
    $('#listBeli').dataTable().fnAddData( [
        $('#kd-barang').val(),
        $('#nm-barang').val(),
        $('#qty').val(),
        $('#harga').val(),
        $('#sub-total').val(),
        btn ] );
    $(".detail-beli").val("");
    //$(".btn-delete-row").bind("click", deleteRow);

    $("#nm-barang").focus();

    getTotal();
}



function getTotal(){
    oTable = $('#listBeli').dataTable();
      
      var totitem = oTable.fnSettings().fnRecordsTotal();

      var totqty = 0;
      var tothrg = 0;
     
      $.each( oTable.fnGetData(), function(i, row){
        totqty += parseInt(row[2]);
        tothrg += parseInt(row[4])

      });

     $("#tot-qty").val(totqty);
     $("#tot-hrg").val(tothrg);
     $("#tot-item").val(totitem);
}
</script>