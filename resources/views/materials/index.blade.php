@extends('adminlte::page')

@section('title', 'FMDB')

@section('content')
<section class="content">
       <div class="row">
        <div class="col-xs-4">
            <span style="font-size:24px">&nbsp; Materilas</span>
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
                            <th class="text-center;" width="width:5%">No</th>
                            <th>Material No</th>
                            <th>sector</th>
                            <th>Group</th>
                            <th>Deskripsi</th>
                            <th>Part no</th>
                            <th>Spesifikasi</th>
                            <th>Merek</th>
                            <th>SAP</th>
                            <th>Satuan</th>
                            <th width="15%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>212040000000000</td>
                            <td>Agro Business</td>
                            <td>X</td>
                            <td>AUTOMATIC MATERIAL</td>
                            <td>20204A000</td>
                            <td>Core i7</td>
                            <td>Lenovo</td>
                            <td>SAP-898332903920932093923920</td>
                            <td>Unit</td>
                            <td>
                                <button href="#" class="btn btn-sm btn-success btn-action btn-edit">&nbsp;<i class="fa fa-pencil" title="Edit data"></i>&nbsp;</button>
					            <button href="#" class="btn btn-sm btn-danger btn-action btn-activated"><i class="fa fa-trash"></i></Button>
                            </td>
                        </tr>    
                        <tr>
                            <td>1</td>
                            <td>212040000000000</td>
                            <td>Agro Business</td>
                            <td>X</td>
                            <td>AUTOMATIC MATERIAL</td>
                            <td>20204A000</td>
                            <td>Core i7</td>
                            <td>Sony</td>
                            <td>SAP-898332903920932093923920</td>
                            <td>Unit</td>
                            <td>
                                <button href="#" class="btn btn-sm btn-success btn-action btn-edit">&nbsp;<i class="fa fa-pencil" title="Edit data"></i>&nbsp;</button>
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
			<div class="modal-body">	
				<div class="box-body">
                    <div class="form-group row">
                        <label for="material_no" class="col-sm-3 col-form-label">Material number</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="material_no" value="">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="sector_industry" class="col-sm-3 col-form-label">Industri sector</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="sector_industry" value="">
                        </div>
                    </div> 
                    <br>
                    <h5>MATERIAL INFORMATION</h5>
                   <div class="row">
                        <div class="form-group">
                         <label for="group_material"  class="col-sm-3 col-form-label">Group Material</label>
                          <div class="input-group col-sm-6">
                            <input type="text" class="form-control" id="group_material" name="group_material" disabled="disabled">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-flat btn-group-material"><i class="fa fa-search"></i></button>
                             </span>
                        </div>
                    </div>
                   </div>
                    <div class="form-group row">
                        <label for="part_no" class="col-sm-3 col-form-label">Deskripsi Material</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="description" id="description" value="">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="part_no" class="col-sm-3 col-form-label">Part Number</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="part_no" value="">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="part_no" class="col-sm-3 col-md-3 col-form-label">Spesifikasi</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="part_no" value="">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="brand" class="col-sm-3 col-form-label">Merk</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="brand" value="">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="material_sap" class="col-sm-3 col-form-label">Material pada SAP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="material_sap" value="">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="uom" class="col-sm-3 col-form-label">Satuan</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="uom" id="uom" value=""></select>
                        </div>
                    </div> 
				</div>	 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" onclick="saveData()" style="margin-right: 5px;">Save</button>
			</div>
		</div>
    </div>
</div>
<div id="group-material-modal" class="modal fade" role="dialog">
    <div class="modal-dialog" width="900px">
		<div class="modal-content">
			<div class="modal-header">	
				<h4 class="modal-title">Group Material</h4>
			</div>
			<div class="modal-body">	
				<div class="box-body">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th class="text-center;" width="width:5%">No</th>
                                <th>Name</th>
                                <th>Detail</th>
                                <th width="15%" class="text-center">Action</th>
                            </tr>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Group X</td>
                                    <td>partno, spesifikasi, Merk</td>
                                    <td>
                                        <button  data-id="Group X" class="btn btn-sm btn-success btn-action btn-select-group-material">Select</button>
                                    </td>
                                </tr>    
                                <tr>
                                    <td>1</td>
                                    <td>Group Y</td>
                                    <td>partno, spesifikasi, Merk</td>
                                    <td>
                                        <button data-id="Group Y" class="btn btn-sm btn-success btn-action btn-select-group-material">Select</button>
                                    </td>
                                </tr>    
                            </tbody>
                        </thead>
                    </table>
				</div>	 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-close-group-material-modal">Close</button>
			</div>
		</div>
    </div>
</div>
@stop
@section('js')
<script>
    jQuery(document).ready(function() {
         jQuery("#data-table").DataTable({
            columnDefs: [
                { targets: [10], className: 'text-center', orderable: false},
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

        jQuery('#uom').select2({
            data: [
                {id:'unt', text:'unit'},
                {id:'bx', text:'Box'},
                {id:'bnd', text:'Bundle'},
                {id:'dz', text:'Dozen'},
                {id:'ctn', text:'Carton'}
            ],
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });

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

        jQuery('.btn-group-material').on('click', function() {
            jQuery('#add-data-modal').modal('hide');

            jQuery('#group-material-modal').modal({backdrop: 'static', keyboard: false});
            jQuery('#group-material-modal').modal('show');

        });
        
        jQuery('.btn-close-group-material-modal').on('click', function() {
           closeGroupMaterialModal()

        });

        jQuery(".btn-select-group-material").on('click', function() {
            jQuery('#group_material').val(jQuery(this).data('id'));
            closeGroupMaterialModal();
        })
    });

    function closeGroupMaterialModal() {
         jQuery('#group-material-modal').modal('hide');

           jQuery("#add-data-modal .modal-title").html("<i class='fa fa-pencil'></i> Edit data");		
           jQuery("#add-data-modal").modal("show");
    }
</script>            
@stop