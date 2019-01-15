@extends('adminlte::page')
@section('title', 'FMDB')
@section('content')
<section class="content">
       <div class="row">
        <div class="col-xs-4">
            <span style="font-size:24px">Group material</span>
        </div>
        <div class="col-xs-8" align="right">
            <span href="#" class="btn btn-sm btn-success btn-add">&nbsp;<i class="glyphicon glyphicon-plus" title="Add new data"></i>&nbsp; Add</span>
        </div>
    </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
             <div class="box-body">
                <table id="data-table" class="table table-bordered table-hover table-condensed" width="100%">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Code</th>
                            <th>Attribute</th>
                            <th>Description</th>
                            <th>Latest</th>
                            <th width="10%">Status</th>
                            <th width="8%">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <!-- /.box-body -->
            </div>
          </div>
        </div>
      </div>
</section>
<div id="add-data-modal" class="modal fade" role="dialog">
    <div class="modal-dialog" width="900px">
		<div class="modal-content">
			<div class="modal-header">	
				<h4 class="modal-title"></h4>
			</div>
			<form id="data-form">
                <div class="modal-body">	
                    <div class="box-body">
                        <div class="col-xs-12">
                            <label class="control-label" for="name">Code</label> 
                            <select class="form-control" name="code" id="code"></select>
                            <input type="hidden" name='edit_id' id="edit_id">
                        </div>
                        <div class="col-xs-12">
                            <label>Attribute</label>
                            <select class="form-control" name="description" id="description" data-placeholder="Select a attribute"></select>
                           <br>
                            <div id="content-table-attribute"></div>
                        </div>
                        <div class="col-xs-12">
                            <label class="control-label" for="name">Description</label> 
                            <textarea class="form-control" name='name' id="name"></textarea>
                            <input type="hidden" name='edit_id' id="edit_id">
                        </div>
                        <div class="col-xs-12">
                            <label class="control-label" for="name">Latest Number</label> 
                            <input type="text" class="form-control"  name='latest_code' id="latest_code">
                        </div>
                    </div>	 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" style="margin-right: 5px;">Submit</button>
                </div>
            </form>
		</div>
    </div>
</div>
@stop
@section('js')
<script>
    var attribute = [];
    jQuery(document).ready(function() {
         jQuery('#data-table').DataTable({
            ajax: '{!! route('get.group_material') !!}',
            columns: [
                { data: 'no', name: 'no' },
                { data: 'code', name: 'code' },
                { data: 'description', name: 'description' },
                { data: 'name', name: 'name' },
                { data: 'latest_code', name: 'latest_code' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' }
            ],
             columnDefs: [
                { targets: [6], className: 'text-center', orderable: false},
                { targets: [0,5], className: 'text-center'}
            ]
        }); 

        jQuery('.btn-add').on('click', function() {
            document.getElementById("data-form").reset();
            jQuery("#edit_id").val("");
            jQuery("#add-data-modal").modal({backdrop:'static', keyboard:false});		
            jQuery("#add-data-modal .modal-title").html("<i class='fa fa-plus'></i> Create new data");		
            jQuery("#add-data-modal").modal("show");		
        });
        
        jQuery('.btn-edit').on('click', function() {
            jQuery("#add-data-modal").modal({backdrop:'static', keyboard:false});		
            jQuery("#add-data-modal .modal-title").html("<i class='fa fa-pencil'></i> Edit data");		
            jQuery("#add-data-modal").modal("show");		
        });

        jQuery("#description").select2({
            data:[
                {id:'part-number', text: 'Part Number'},
                {id:'spesifikasi', text: 'Spesifikasi'},
                {id:'merk', text: 'Merk'},
                {id:'deskripsi-material', text: 'Deskripsi Material'}
            ],
            width: '100%',
            placeholder: ' ',
            allowClear: true
        }).on('change', function() {
            selectedAttribute(jQuery(this).val());
        });

        jQuery("#code").select2({
            data:[
                {id:'1010', text: '1010'},
                {id:'2010', text: '2010'},
                {id:'3010', text: '3010'}
            ],
            width: '100%',
            placeholder: ' ',
            allowClear: true
        });

        jQuery('#data-form').on('submit', function(e) {
            e.preventDefault();


            var edit_id = jQuery('#edit_id').val();
            var name = jQuery('#name').val();
            var code = jQuery("#code").val();
            var latest_code = jQuery("#latest_code").val();
            var param = {
                edit_id: edit_id,
                name: name,
                description: attribute.join(','),
                code: code,
                latest_code: latest_code
            }

           jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            jQuery.ajax({
				url:"{{ url('groupmaterials/post') }}",
				method:"POST",
				data: param,
				beforeSend:function(){},
				success:function(result){
                    if(result.status){
                        jQuery("#add-data-modal").modal("hide");
                        jQuery("#data-table").DataTable().ajax.reload();
                        notify({
                            type:'success',
                            message:result.message
                        });
                    }else{
                        notify({
                            type:'warning',
                            message:result.message
                        });
                    } 
				},
				complete:function(){}
			 }); 
            
            
        })
    });

    function edit(id) {
        document.getElementById("data-form").reset();
        jQuery("#edit_id").val(id);

        var result = jQuery.parseJSON(JSON.stringify(dataJson("{{ url('groupmaterials/edit/?id=') }}"+id)));
        var descritpion = result[0].description;
        var attribute = descritpion.split(',');

        jQuery("#edit_id").val(result[0].id);
        jQuery("#name").val(result[0].name);
        jQuery("#code").val(result[0].code);
        jQuery("#code").trigger('change');
        jQuery("#latest_code").val(result[0].latest_code);
        jQuery("#description").val(attribute).trigger('change');

        jQuery("#add-data-modal .modal-title").html("<i class='fa fa-edit'></i> Update data");			
        jQuery("#add-data-modal").modal("show");
    }

    function inactive(id) {
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
            url:"{{ url('groupmaterials/inactive') }}",
            method:"POST",
            data: {id:id},
            beforeSend:function(){},
            success:function(result){
                if(result.status){
                    jQuery("#data-table").DataTable().ajax.reload();
                    notify({
                        type:'success',
                        message:result.message
                    });
                }else{
                    notify({
                        type:'warning',
                        message:result.message
                    });
                } 
            },
            complete:function(){}
        }); 
    }
    
    function active(id) {
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
            url:"{{ url('groupmaterials/active') }}",
            method:"POST",
            data: {id:id},
            beforeSend:function(){},
            success:function(result){
                if(result.status){
                    jQuery("#data-table").DataTable().ajax.reload();
                    notify({
                        type:'success',
                        message:result.message
                    });
                }else{
                    notify({
                        type:'warning',
                        message:result.message
                    });
                } 
            },
            complete:function(){}
        }); 
    }

    function selectedAttribute(item) {
        attribute.push(item);
        createTableAttribute();
    }

    function createTableAttribute() {
        var item = "<table class='table table-condensed'>";
        jQuery.each(attribute, function(key, val) {
            item += "<tr class='success'>";
            item += "<td>" + val + "</td>";
            item += '<td width="30px"><button type="button" class="btn btn-xs btn-danger" onClick="deleteAttribute(\'' + key + '\')"><i class="fa fa-trash"></i></button></td>';
            item += "</tr>";
        });
         item += "</table>";
        jQuery("#content-table-attribute").html(item);
    }

    function deleteAttribute(key) {
      /*   var conf = confirm("anda yakin mau menghapus data ini?");
		if (conf == true) { 
            
        } */

        var index = attribute.indexOf(attribute[key]);;
        if (index > -1) {
            attribute.splice(key, 1);
        }
        createTableAttribute();
    }
</script>            
@stop