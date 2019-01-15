@extends('adminlte::page')

@section('title', 'FMDB')

@section('content')
<section class="content">
       <div class="row">
        <div class="col-xs-10">
            <div class="input-group">
                <input type="text" class="form-control" id="search_material" placeholder="serach material">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-flat btn-success btn-flat"><i class="fa fa-search"></i></button>
                    </span>
              </div>
        </div>
        <div class="col-xs-2" align="right">
            <span href="#" class="btn btn-flat btn-sm btn-success btn-add hide">&nbsp;<i class="glyphicon glyphicon-plus" title="Add new data"></i>&nbsp; Add</span>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
             <table id="data-table" class="table" style="background-color:white" width="100%">
                <thead>
                    <tr>
                        <th>Material list</th>
                        <th></th>
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <td width="15%">
                                <img src="{{ asset('img/genset.jpeg') }}" class="img-responsive"></td>
                            </td>
                            <td>
                                <table class="table" sty>
                                    <tr style="height:20px !important">
                                        <td><b>Material Number</b></td>
                                        <td>404030046</td>
                                        <td rowspan="3" style="width:10%">
                                            <span href="#" class="btn btn-flat btn-sm btn-default btn-flat btn-block">Extend</span>
                                            <span href="#" class="btn btn-flat btn-sm btn-default btn-flat btn-block ">Reado to PO</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama Material</b></td>
                                        <td>GENSET RG 7800 RYU</td>
                                    </tr>
                                      <tr>
                                        <td><b>Merk</b></td>
                                        <td>Ryu</td>
                                    </tr>
                                    <tr>
                                        <td><b>Satuan</b></td>
                                        <td>Unit</td>
                                    </tr>
                                    <tr>
                                       <td colspan="2"><b>Keterangan</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Generator - Max Power: 5.500 watt - Rated Power: 5.000 watt - Rated Ampere: 22.7 A - Voltage: 220 Volt   Frekuensi: 50 Hz- DC Output: 12 Volt / 8.3 A - Phasa: Single </br> Engine - Type: 4 stroke, OHV, Air Cooled - Engine Model: GX 390 - Displacement: 389 CC - Max. Power Output: 13 HP / 3.600 RPM - Starting System: Electric + Recoil Starting / Engkol Tarik- Fuel: Gasoline- Fuel Tank Capacity: 28 Litre - Oil Engine Capacity: 1.100 ml - Noise Level: 72 dB - Dimension: 77 x 56 x 57 cm - Gross Weight: 97 kg
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <img src="{{ asset('img/image2.jpg') }}" class="img-responsive"></td>
                            </td>
                            <td>
                                <table class="table" sty>
                                    <tr style="height:20px !important">
                                        <td><b>Material Number</b></td>
                                        <td>404100043</td>
                                        <td rowspan="3" style="width:10%">
                                            <span href="#" class="btn btn-flat btn-sm btn-default btn-flat btn-block">Extend</span>
                                            <span href="#" class="btn btn-flat btn-sm btn-default btn-flat btn-block ">Reado to PO</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama Material</b></td>
                                        <td>MESIN LAS 160 A RHINO</td>
                                    </tr>
                                      <tr>
                                        <td><b>Merk</b></td>
                                        <td>RHINO</td>
                                    </tr>
                                    <tr>
                                        <td><b>Satuan</b></td>
                                        <td>Unit</td>
                                    </tr>
                                    <tr>
                                       <td colspan="2"><b>Keterangan</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Generator - Max Power: 5.500 watt - Rated Power: 5.000 watt - Rated Ampere: 22.7 A - Voltage: 220 Volt   Frekuensi: 50 Hz- DC Output: 12 Volt / 8.3 A - Phasa: Single </br> Engine - Type: 4 stroke, OHV, Air Cooled - Engine Model: GX 390 - Displacement: 389 CC - Max. Power Output: 13 HP / 3.600 RPM - Starting System: Electric + Recoil Starting / Engkol Tarik- Fuel: Gasoline- Fuel Tank Capacity: 28 Litre - Oil Engine Capacity: 1.100 ml - Noise Level: 72 dB - Dimension: 77 x 56 x 57 cm - Gross Weight: 97 kg
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <img src="{{ asset('img/image4.jpg') }}" class="img-responsive"></td>
                            </td>
                            <td>
                                <table class="table" sty>
                                    <tr style="height:20px !important">
                                        <td><b>Material Number</b></td>
                                        <td>312010035</td>
                                        <td rowspan="3" style="width:10%">
                                            <span href="#" class="btn btn-flat btn-sm btn-default btn-flat btn-block">Extend</span>
                                            <span href="#" class="btn btn-flat btn-sm btn-default btn-flat btn-block ">Reado to PO</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama Material</b></td>
                                        <td>CONE HYDROCYCLONE DIA 75 MM</td>
                                    </tr>
                                      <tr>
                                        <td><b>Merk</b></td>
                                        <td>MM</td>
                                    </tr>
                                    <tr>
                                        <td><b>Satuan</b></td>
                                        <td>Unit</td>
                                    </tr>
                                    <tr>
                                       <td colspan="2"><b>Keterangan</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Generator - Max Power: 5.500 watt - Rated Power: 5.000 watt - Rated Ampere: 22.7 A - Voltage: 220 Volt   Frekuensi: 50 Hz- DC Output: 12 Volt / 8.3 A - Phasa: Single </br> Engine - Type: 4 stroke, OHV, Air Cooled - Engine Model: GX 390 - Displacement: 389 CC - Max. Power Output: 13 HP / 3.600 RPM - Starting System: Electric + Recoil Starting / Engkol Tarik- Fuel: Gasoline- Fuel Tank Capacity: 28 Litre - Oil Engine Capacity: 1.100 ml - Noise Level: 72 dB - Dimension: 77 x 56 x 57 cm - Gross Weight: 97 kg
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <img src="{{ asset('img/image3.jpeg') }}" class="img-responsive"></td>
                            </td>
                            <td>
                                <table class="table" sty>
                                    <tr style="height:20px !important">
                                        <td><b>Material Number</b></td>
                                        <td>216070033</td>
                                        <td rowspan="3" style="width:10%">
                                            <span href="#" class="btn btn-flat btn-sm btn-default btn-flat btn-block">Extend</span>
                                            <span href="#" class="btn btn-flat btn-sm btn-default btn-flat btn-block ">Reado to PO</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama Material</b></td>
                                        <td>SAFETY LINE WARNA KUNING HITAM</td>
                                    </tr>
                                    <tr>
                                        <td><b>Satuan</b></td>
                                        <td>Unit</td>
                                    </tr>
                                    <tr>
                                        <td><b>Merk</b></td>
                                        <td>MM</td>
                                    </tr>
                                    <tr>
                                       <td colspan="2"><b>Keterangan</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Generator - Max Power: 5.500 watt - Rated Power: 5.000 watt - Rated Ampere: 22.7 A - Voltage: 220 Volt   Frekuensi: 50 Hz- DC Output: 12 Volt / 8.3 A - Phasa: Single </br> Engine - Type: 4 stroke, OHV, Air Cooled - Engine Model: GX 390 - Displacement: 389 CC - Max. Power Output: 13 HP / 3.600 RPM - Starting System: Electric + Recoil Starting / Engkol Tarik- Fuel: Gasoline- Fuel Tank Capacity: 28 Litre - Oil Engine Capacity: 1.100 ml - Noise Level: 72 dB - Dimension: 77 x 56 x 57 cm - Gross Weight: 97 kg
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
                            <div class="form-group row">
                                <label for="material_no" class="col-sm-3 col-form-label">Material number</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="material_no" id="material_no" required>
                                    <input type="hidden" name="edit_id" id="edit_id">
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label for="sector_industry" class="col-sm-3 col-form-label">Industri sector</label>
                                <div class="col-sm-6">
                                    <select type="text" class="form-control" name="sector_industry" id="sector_industry"  ></select>
                                </div>
                            </div> 
                            <br>
                            <h5>MATERIAL INFORMATION</h5>
                        <div class="row">
                                <div class="form-group">
                                <label for="group_material"  class="col-sm-3 col-form-label">Group Material</label>
                                <div class="input-group col-sm-6" style="padding-left:16px">
                                    <input type="text" class="form-control" name="group_material" id="group_material" readonly>
                                    <input type="hidden" name="group_material_id" id="group_material_id" readonly>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-flat btn-group-material"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                            <div class="form-group row material-group-input" id="input-description">
                                <label for="part_no" class="col-sm-3 col-form-label">Deskripsi Material</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control attr-material-group" name="description" id="description" autocomplete="off">
                                </div>
                            </div> 
                            <div class="form-group row material-group-input" id="input-part-no">
                                <label for="part_no" class="col-sm-3 col-form-label">Part Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control attr-material-group" name="part_no" id="part_no"  autocomplete="off">
                                </div>
                            </div> 
                            <div class="form-group row material-group-input" id="input-specification">
                                <label for="part_no" class="col-sm-3 col-md-3 col-form-label">Spesifikasi</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control attr-material-group" name="specification"  id="specification" >
                                </div>
                            </div> 
                            <div class="form-group row material-group-input" id="input-brand">
                                <label for="brand" class="col-sm-3 col-form-label">Merk</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control attr-material-group" name="brand"  id="brand"  >
                                </div>
                            </div> 
                            <div class="form-group row ">
                                <label for="material_sap" class="col-sm-3 col-form-label">Material pada SAP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="material_sap"  id="material_sap"  readonly>
                                    <span class="help-block" id="help_material_sap"></span>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label for="uom" class="col-sm-3 col-form-label">Satuan</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="uom" id="uom" ></select>
                                </div>
                            </div> 
                        </div>	 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" style="margin-right: 5px;">Save</button>
                    </div>
            </form>
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
                    <table class="table table-bordered table-condensed" id="group-material-table" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center;" width="width:2%">No</th>
                                <th>Name</th>
                                <th>Attribute</th>
                                <th width="5%" class="text-center">Action</th>
                            </tr>
                            <tbody></tbody>
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
      jQuery('#data-table').DataTable({
           "searching": false,
           "sort": false,
            "lengthChange": false,
      });

      var materials = [
        "GENSET RG 7800 RYU",
        "MESIN LAS 160 A RHINO",
        "CONE HYDROCYCLONE DIA 75 MM",
        "SAFETY LINE WARNA KUNING HITAM"
      ];
      jQuery("#search_material").autocomplete({
        source: materials
      });

       jQuery('#group-material-table').DataTable({
            ajax: '{!! route('get.data_table_group_material') !!}',
            columns: [
                { data: 'no', name: 'no' },
                { data: 'name', name: 'name' },
                { data: 'description', name: 'description' },
                { data: 'action', name: 'action' }
            ],
              columnDefs: [
                { targets: [3], className: 'text-center', orderable: false},
                { targets: [0], className: 'text-center'}
            ],
            info: false,
            paging: false
        }); 

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
       
        jQuery('#sector_industry').select2({
            data: [
                {id:'Agro Business', text:'Agro Business'},
                {id:'Agro Wisata', text:'Agro Wisata'},
            ],
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });

        jQuery(".attr-material-group").on("keyup", function(){
            genMaterialNo();
        });    

    jQuery('.btn-add').on('click', function() {
        jQuery(".material-group-input").removeClass('has-success');
        jQuery(".attr-material-group").prop("required", false);
        document.getElementById("data-form").reset();
        jQuery("#edit_id").val("");
            jQuery("#add-data-modal .modal-title").html("<i class='fa fa-plus'></i> Create Request");	
        jQuery("#add-data-modal").modal({backdrop:'static', keyboard:false});			
        jQuery("#add-data-modal").modal("show");		
    });

    jQuery("#search_material").on("change", function(){
        jQuery(".btn-add").removeClass("hide");
    });

    
        jQuery('.btn-group-material').on('click', function() {
            //jQuery('#add-data-modal').modal('hide');

               $('#add-data-modal').on('hidden.bs.modal', function(event) {
                    // Open your second one in here
                    $('#group-material-modal').off('hidden.bs.modal');
                    jQuery('#group-material-modal').modal({backdrop: 'static', keyboard: false});
                    jQuery('#group-material-modal').modal('show');
                    // This will remove ANY event attached to 'hidden.bs.modal' label
                }).modal('hide');

            // jQuery('#group-material-modal').modal({backdrop: 'static', keyboard: false});
            // jQuery('#group-material-modal').modal('show');
        });
        
        jQuery('.btn-close-group-material-modal').on('click', function() {
           closeGroupMaterialModal()

        });    

    });

       function closeGroupMaterialModal() {
        // jQuery('#group-material-modal').modal('hide');
         $('#group-material-modal').on('hidden.bs.modal', function(event) {

            $('#add-data-modal').off('hidden.bs.modal');
            jQuery('#add-data-modal').modal({backdrop: 'static', keyboard: false});
            jQuery('#add-data-modal').modal('show');
        }).modal('hide');

        	
        //jQuery("#add-data-modal").modal("show");
    }

     function SelectGroup(id, name, attr) {
        jQuery(".material-group-input").removeClass('has-success');
        jQuery(".attr-material-group").prop("required", false);
        var data = attr.split(',');
        var help_material_sap = "";
        selected_material_group = attr;
        var no = 1;
        jQuery.each(data, function(key, val) {
            if(no > 1 ) {
               help_material_sap += "-";
            }
            help_material_sap += val.replace("-", " ");
            if(val == 'part-number') {
                jQuery("#input-part-no").addClass("has-success");
                jQuery("#part_no").prop("required",true);

            }else if(val == 'deskripsi-material'){
                jQuery("#input-description").addClass("has-success");
                jQuery("#description").prop("required",true);

            }else if(val == 'spesifikasi'){
                jQuery("#input-specification").addClass("has-success");
                jQuery("#specification").prop("required",true);

            }else if(val == 'merk'){
                jQuery("#input-brand").addClass("has-success");
                 jQuery("#brand").prop("required",true);

            }
            no++;
        });
        
        jQuery('#group_material').val(name);
        jQuery('#group_material_id').val(id);
        jQuery("#help_material_sap").text('Pattern: ' + help_material_sap);
        closeGroupMaterialModal();
    }

    function genMaterialNo(){
         var data = selected_material_group.split(',');
         var material_no = "";
        var no = 1;
        jQuery.each(data, function(key, val) {
             if(no > 1 ) {
               material_no += "-";
            }
            if(val == 'part-number') {
                material_no += jQuery("#part_no").val();
            }else if(val == 'deskripsi-material'){
                material_no += jQuery("#description").val();
            }else if(val == 'spesifikasi'){
                material_no += jQuery("#specification").val();
            }else if(val == 'merk'){
                material_no += jQuery("#brand").val();
            }
            no++;
        });

        jQuery("#material_sap").val(material_no);
    }
</script>            
@stop