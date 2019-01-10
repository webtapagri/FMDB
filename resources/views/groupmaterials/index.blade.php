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
            <span href="#" class="btn btn-sm btn-primary btn-action btn-edit" style="display:none">&nbsp;<i class="glyphicon glyphicon-edit" title="Edit data"></i>&nbsp;</span>
            <span href="#" class="btn btn-sm btn-success btn-action btn-activated" style="display:none">Activated</span>
            <span href="#" class="btn btn-sm btn-danger btn-action btn-inactivated" style="display:none" >Inactivated</span>
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
                            <th>Description</th>
                            <th>Attribute</th>
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
                        <div class="col-xs-12 name" id="form-bus-type-name">
                            <label class="control-label" for="name">Description</label> 
                            <input type="text" class="form-control" name='name' id="name">
                            <input type="hidden" name='edit_id' id="edit_id">
                        </div>
                        <div class="col-xs-12">
                            <label>Attribute</label>
                            <select class="form-control" name="description" id="description"  multiple="multiple" data-placeholder="Select a attribute"></select>
                        </div>
                    </div>	 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="margin-right: 5px;">Submit</button>
                </div>
            </form>
		</div>
    </div>
</div>
@stop
@section('js')
<script>
    jQuery(document).ready(function() {
         jQuery('#data-table').DataTable({
            ajax: '{!! route('get.group_material') !!}',
            columns: [
                { data: 'no', name: 'no' },
                { data: 'name', name: 'name' },
                { data: 'description', name: 'description' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' }
            ],
             columnDefs: [
                { targets: [4], className: 'text-center', orderable: false},
                { targets: [0,3], className: 'text-center'}
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
        });

        jQuery('#data-form').on('submit', function(e) {
            e.preventDefault();
            var edit_id = jQuery('#edit_id').val();
            var name = jQuery('#name').val();
            var attribute = jQuery("#description").val();
            var param = {
                edit_id: edit_id,
                name: name,
                description: attribute.join(',')
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
</script>            
@stop