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
                <table id="data-table" class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Name</th>
                            <th>Detail</th>
                            <th width="12%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         <tr>
                            <td>1</td>
                            <td>X</td>
                            <td></td>
                            <td>
                                <button href="#" class="btn btn-sm btn-primary btn-action btn-edit">&nbsp;<i class="fa fa-pencil" title="Edit data"></i>&nbsp;</button>
					            <button href="#" class="btn btn-sm btn-danger btn-action btn-activated"><i class="fa fa-trash"></i></Button>
                            </td>
                        </tr>    
                         <tr>
                            <td>1</td>
                            <td>Y</td>
                            <td></td>
                            <td>
                                <button href="#" class="btn btn-sm btn-primary btn-action btn-edit">&nbsp;<i class="fa fa-pencil" title="Edit data"></i>&nbsp;</button>
					            <button href="#" class="btn btn-sm btn-danger btn-action btn-activated"><i class="fa fa-trash"></i></Button>
                            </td>
                        </tr>    
                    </tbody>
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
                            <label class="control-label" for="name">Name</label> 
                            <input type="text" class="form-control" name='name' id="name">
                            <input type="hidden" name='edit-id' id="edit-id">
                        </div>
                        <div class="col-xs-12">
                            <label>Attribute</label>
                            <select class="form-control" name="description" id="description"  multiple="multiple" data-placeholder="Select a State"></select>
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
         jQuery("#data-table").DataTable({
            columnDefs: [
                { targets: [3], className: 'text-center', orderable: false},
                { target: [0], className: 'text-center'}
            ]
         });     
        /* jQuery('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('get.group_material') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'description', name: 'description' },
                { data: 'id', name: '0' }
            ]
        }); */

        jQuery('.btn-add').on('click', function() {
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
            var param = jQuery(this).serialize();
            alert(param);
        })
    });
</script>            
@stop