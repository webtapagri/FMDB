@extends('adminlte::page')

@section('title', 'FMDB')

@section('content')
<section class="content">
       <div class="row">
        <div class="col-xs-10">
            <div class="input-group">
                <input type="text" class="form-control" onkeyup="searchData()"  id="search_material" placeholder="search material">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-flat btn-success btn-flat"><i class="fa fa-search"></i></button>
                    </span>
              </div>
        </div>
        <div class="col-xs-2" align="right">
            <span href="#" class="btn btn-flat btn-sm btn-success btn-add">&nbsp;<i class="glyphicon glyphicon-plus" title="Add new data"></i>&nbsp; Add</span>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
             <table id="data-table" class="table table-condensed" style="background-color:white" width="100%">
                <thead>
                    <tr>
                        <th width="15%">Material list</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                    <tbody></tbody>
                </table>
          </div>
        </div>
      </div>
</section>
<div id="add-data-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">	
				<h4 class="modal-title"></h4>
			</div>

                	<div class="modal-body">	
                        <div class="row">
                                <div class="col-xs-12">
                                <div class="">
                                    <ul class="nav nav-tabs">
                                    <li class="active"><a href="#panel-initial" data-toggle="tab" class="panel-initial">INITIAL</a></li>
                                    <li><a href="#panel-basic-data" data-toggle="tab" class="panel-basic-data" disabled>MATERIAL INFORMATION</a></li>
                                    </ul>
                                    <div class="tab-content">
                                    <!-- Font Awesome Icons -->
                                        <div class="tab-pane active" id="panel-initial">
                                            <form id="form-initial">
                                               <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="sap_material_group">Material Group</label>
                                                                <select type="text" class="form-control" name="sap_material_group" id="sap_material_group" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>  
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="plant">Plant</label>
                                                                <select type="text" class="form-control" name="plant" id="plant" maxlength="4" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">  
                                                            <div class="form-group">
                                                                <label for="location">Location</label>
                                                                <select type="text" class="form-control" name="location" id="location"  maxlength="10" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="mrp_controller">MRP Controller</label>
                                                                <select type="text" class="form-control" name="mrp_controller" id="mrp_controller"  maxlength="3"  required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>  
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="valuation_class">Valuation Class</label>
                                                                <select type="text" class="form-control" name="valuation_class"  maxlength="10"  id="valuation_class" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>  
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="sector_industry">Industri sector</label>
                                                                <select type="text" class="form-control" name="industry_sector" id="industry_sector" maxlength="20" required >
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  <div class="row">
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="material_type">Material Type</label>
                                                                <select type="text" class="c" name="material_type" id="material_type"  maxlength="10"  required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="store_location">Store Location</label>
                                                                <select type="text" class="form-control" name="store_location" id="store_location"  maxlength="4" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>  
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="sales_org">Sales Org</label>
                                                                <select type="text" class="form-control" name="sales_org" id="sales_org"  maxlength="4" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>  
                                                  </div>
                                                    <div class="row">
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="dist_channel">Distribution Channel</label>
                                                                <select type="text" class="form-control" name="dist_channel" id="dist_channel"  maxlength="4" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="division">Division</label>
                                                                <select type="text" class="form-control" name="division" id="division"  maxlength="30" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="general_item_category_group">General Item Category Group</label>
                                                                <select type="text" class="form-control" name="general_item_category_group" id="general_item_category_group" maxlength="4" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                    </div>  
                                                    <div class="row">
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="cash_discount">Cash Discount</label>
                                                                <select type="text" class="form-control" name="cash_discount" id="cash_discount"  maxlength="1"  required></select>
                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="tax_classification">Tax Classification</label>
                                                                <select type="text" class="form-control" name="tax_classification" id="tax_classification" maxlength="1" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="account_assign">Account Assignment Group</label>
                                                                <select type="text" class="form-control" name="account_assign" id="account_assign" maxlength="2" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                     </div>  
                                                    <div class="row">
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="item_category_group">Item Category Group</label>
                                                                <select type="text" class="form-control" name="item_category_group" id="item_category_group" maxlength="30" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="availability_check">Availability Check</label>
                                                                <select type="text" class="form-control" name="availability_check" id="availability_check" maxlength="2" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="transportation_group">Transportation Group</label>
                                                                <select type="text" class="form-control" name="transportation_group" maxlength="4" id="transportation_group" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="loading_group">Loading Group</label>
                                                                <select type="text" class="form-control" name="loading_group" id="loading_group" maxlength="4" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="profit_center">Profit Center</label>
                                                                <select type="text" class="form-control" name="profit_center" id="profit_center" maxlength="4"  required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="mrp_type">MRP Type</label>
                                                                <select type="text" class="form-control" name="mrp_type" id="mrp_type" maxlength="4"  required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="period_ind_for_sle">Period Ind. for SLE</label>
                                                                <select type="text" class="form-control" name="period_ind_for_sle" maxlength="10" id="period_ind_for_sle" required>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="price_unit">Price Unit</label>
                                                                <input type="number" class="form-control" name="price_unit" id="price_unit" value="1" required>
                                                            </div>
                                                        </div>    
                                                    </div> 

                                               </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success btn-flat" style="margin-right: 5px;">Next</button>
                                                </div> 
                                            </form>
                                         
                                        </div>
                                        <!-- /#fa-icons -->

                                        <!-- glyphicons-->
                                        <div class="tab-pane" id="panel-basic-data">
                                              <form id="form-basic-data">
                                                  <div class="box-body">
                                                      <div class="row">
                                                        <div class="col-md-4">
                                                                <label for="group_material" >Group Material</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="group_material" id="group_material" readonly>
                                                                    <input type="hidden" name="group_material_id" id="group_material_id" readonly>
                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="btn btn-default btn-flat btn-group-material"><i class="fa fa-search"></i></button>
                                                                    </span>
                                                                </div>
                                                            </div>     
                                                        <div class="col-md-4">
                                                            <div class="form-group material-group-input" id="input-description">    
                                                                <label for="part_no">Description</label>
                                                                <input type="text" class="form-control attr-material-group" name="description" id="description" autocomplete="off">
                                                            </div>
                                                        </div>   
                                                        <div class="col-md-4"> 
                                                            <div class="form-group material-group-input" id="input-part-no">
                                                                <label for="part_no">Part Number</label>
                                                                <input type="text" class="form-control attr-material-group" name="part_no" id="part_no"  autocomplete="off">
                                                            </div>
                                                        </div> 
                                                      </div>
                                                      <div class="row">
                                                        <div class="col-md-4">  
                                                         <div class="form-group material-group-input" id="input-specification">
                                                            <label for="part_no" class="col-md-3 col-form-label">Spesifikasi</label>
                                                                <input type="text" class="form-control attr-material-group" name="specification"  id="specification" >
                                                            </div>
                                                        </div> 
                                                        <div class="col-sm-4">
                                                            <div class="form-group material-group-input" id="input-brand">
                                                                 <label for="brand">Merk</label>
                                                                <input type="text" class="form-control attr-material-group" name="brand"  id="brand"  >
                                                            </div>
                                                        </div> 
                                                        <div class="form-group ">
                                                            <div class="col-md-4">
                                                                <label for="material_sap">Material pada SAP</label>
                                                                <input type="text" class="form-control" name="material_sap"  id="material_sap" maxlength="30"  readonly>
                                                                <span class="help-block" id="help_material_sap"></span>
                                                            </div>
                                                        </div> 
                                                      </div>
                                                       <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">    
                                                                    <label for="uom">Base Unit of Measure</label>
                                                                    <select class="form-control" name="uom" id="uom" ></select>
                                                                </div>
                                                            </div> 
                                                      </div>
                                                      <h5>DIMENSI</h5>
                                                       <div class="row">
                                                         <div class="col-md-4">   
                                                            <div class="form-group">
                                                                <label for="gross_weight">Gross Weight</label>
                                                                <input type="text" class="form-control" name="gross_weight" id="gross_weight" onkeypress="return isNumber(event)" onpaste="return false" ondrop="return false">
                                                            </div>
                                                        </div> 
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="net_weight">Net Weight</label>
                                                                <input type="text" class="form-control" name="net_weight" id="net_weight" onkeypress="return isNumber(event)" onpaste="return false" ondrop="return false">
                                                            </div>
                                                        </div> 
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                            <label for="volume">Volume</label>
                                                                <input type="text" class="form-control" name="volume" id="volume" onkeypress="return isNumber(event)" onpaste="return false" ondrop="return false">
                                                            </div>
                                                        </div> 
                                                      </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="size">Size/Dimension</label>
                                                                   <input type="text" class="form-control" name="size" id="size" maxlength="30" onkeypress="return isNumber(event)" onpaste="return false" ondrop="return false">
                                                                </div>
                                                            </div> 
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="weight_unit">Weight Unit</label>
                                                                    <input type="text" class="form-control" name="weight_unit" id="weight_unit" maxlength="10" onkeypress="return isNumber(event)" onpaste="return false" ondrop="return false">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                 <label for="volume_unit">Volume Unit</label>
                                                                    <input type="text" class="form-control" name="volume_unit" id="volume_unit" maxlength="10" onkeypress="return isNumber(event)" onpaste="return false" ondrop="return false">
                                                                </div>
                                                            </div> 
                                                      </div>
                                                       <h5>IMAGE</h5>
                                                       <div class="row">
                                                            <div class="col-md-4">
                                                                 <div class="form-group">
                                                                <label for="exampleInputFile">File input</label>
                                                                <input type="file" id="img-files" name="images" ultiple accept='image/*' >
                                                                <input type="hidden" name="img_list" id="img_list">
                                                                <p class="help-block">*jpg, png</p>
                                                                </div>
                                                            </div> 
                                                      </div> 
                                                       <div class="row">
                                                            <div class="col-md-3">
                                                                <img id="material-images-1" class="img-responsive">
                                                            </div> 
                                                            <div class="col-md-3">
                                                                <img id="material-images-2" class="img-responsive">
                                                            </div> 
                                                            <div class="col-md-3">
                                                                <img id="material-images-3" class="img-responsive">
                                                            </div> 
                                                      </div> 
                                                  </div>
                                                   <div class="modal-footer">
                                                                <button type="button" class="btn btn-default btn-flat" onClick="initialPanel()">Back</button>
                                                                <button type="submit" class="btn btn-success btn-flat" style="margin-right: 5px;">Submit</button>
                                                            </div> 
                                              </form>
                                        </div>
                        
                                    <!-- /#ion-icons -->

                                    </div>
                                    <!-- /.tab-content -->
                                </div>
                                <!-- /.nav-tabs-custom -->
                                </div>
                                <!-- /.col -->
                            </div>     
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
                    <table class="table table-bordered table-condensed" id="group-material-table" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center;" width="width:2%">No</th>
                                <th>Code</th>
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
    var imgFiles = [];    
    jQuery(document).ready(function() {
    var table =   jQuery('#data-table').DataTable({
        ajax: '{!! route('get.tm_material') !!}',
        columns: [
            { data: 'img', name: 'img' },
            { data: 'detail', name: 'detail' },
            { data: 'action', name: 'action' }
        ],
        "searching": false,
        "sort": false,
        "lengthChange": false,
      });

      var search = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.auto_sugest') !!}')));
      jQuery("#search_material").autocomplete({
        source: search
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

         jQuery('#form-basic-data').on('submit', function(e) {
            e.preventDefault();
           jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //var form = jQuery('#form-initial').not(':submit').clone().hide().appendTo('#form-basic-data');
            var param = jQuery("#form-initial, #form-basic-data").serializeArray();

            jQuery.ajax({
				url:"{{ url('material_user/post') }}",
				method:"POST",
				data: param,
				beforeSend:function(){},
				success:function(result){
                    var data = jQuery.parseJSON(result);
                    if(data.code == '201'){
                        jQuery("#add-data-modal").modal("hide");
                        jQuery("#data-table").DataTable().ajax.reload();
                        notify({
                            type:'success',
                            message:data.message
                        });
                    }else{
                        notify({
                            type:'warning',
                            message:data.message
                        });
                    } 
				},
				complete:function(){}
			 });
        });

        var material_group = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.get_group_material') !!}')));
        jQuery('#sap_material_group').select2({
            data: material_group,
            width:'100%',
            placeholder: "",
            allowClear: true
        });

        var uom = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.uom') !!}')));
        jQuery('#uom').select2({
            data: uom,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });
      
        var plant = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.plant') !!}')));
        jQuery('#plant').select2({
            data: plant,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        }).on("change", function() {
            var store_location = jQuery.parseJSON(JSON.stringify(dataJson("{{ url('material_user/store_location/?id=') }}"+jQuery(this).val())));
            jQuery('#store_location').select2({
                data: store_location,
                width:'100%',
                placeholder: "",
                allowClear: true
            });
        });

        jQuery("#img-files").on('change', function() {
            var src = document.getElementById("img-files");

            if (jQuery('#material-images-1').prop('src') === '') {
                 var target = document.getElementById("material-images-1");
            } else if (jQuery('#material-images-2').prop('src') === '') {
                 var target = document.getElementById("material-images-2");
            } else if (jQuery('#material-images-3').prop('src') === '') {
                 var target = document.getElementById("material-images-3");
            } else {
                  notify({
                        type:'warning',
                        message: 'hanya bisa 3 kali upload gambar'
                    });
                return false;
            }

            showImage(src,target);
            jQuery(this).val("");

        });

         jQuery('#store_location').select2({
                width:'100%',
                placeholder: "",
                allowClear: true
            });
      
        var location = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.location') !!}')));
        jQuery('#location').select2({
            data: location,
            width:'100%',
            placeholder: "",
            allowClear: true
        });
      
        var mrp_controller = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.mrp_controller') !!}')));
        jQuery('#mrp_controller').select2({
            data: mrp_controller,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });
       
        var valuation_class = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.valuation_class') !!}')));
        jQuery('#valuation_class').select2({
            data: valuation_class,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });

        var industry_sector = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.industry_sector') !!}')));
        jQuery('#industry_sector').select2({
            data:industry_sector,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });
     
        var material_type = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.material_type') !!}')));
        jQuery('#material_type').select2({
            data:material_type,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });

        var division = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.div') !!}')));
        jQuery('#division').select2({
            data: division,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });
       
        var sales_org = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.sales_org') !!}')));
        jQuery('#sales_org').select2({
            data: sales_org,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });
       
        var dist_channel = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.dist_channel') !!}')));
        jQuery('#dist_channel').select2({
            data: dist_channel,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });
        
        var item_cat = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.item_cat') !!}')));
        jQuery('#general_item_category_group, #item_category_group').select2({
            data: item_cat,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });
      
      
        var tax_classification = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.tax_classification') !!}')));
        jQuery('#tax_classification').select2({
            data: tax_classification,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });
      

        var account_assign = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.account_assign') !!}')));
        jQuery('#account_assign').select2({
            data: account_assign,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });
       
        var availability_check = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.availability_check') !!}')));
        jQuery('#availability_check').select2({
            data: availability_check,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });
       
        var transportation_group = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.transportation_group') !!}')));
        jQuery('#transportation_group').select2({
            data: transportation_group,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });
    
        var loading_group = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.loading_group') !!}')));
        jQuery('#loading_group').select2({
            data: loading_group,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });
      
        var profit_center = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.profit_center') !!}')));
        jQuery('#profit_center').select2({
            data: profit_center,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });
       
        var mrp_type = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.mrp_type') !!}')));
        jQuery('#mrp_type').select2({
            data: mrp_type,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });
       
        var sle = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.sle') !!}')));
        jQuery('#period_ind_for_sle').select2({
            data: sle,
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });
      
        jQuery('#cash_discount').select2({
            data: [
                {"id": 0, "text": "No"},
                {"id": 1, "text": "Yes"}
            ],
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });
       
        jQuery('store_location').select2({
            data: [
                {"id": 0, "text": "No"},
                {"id": 1, "text": "Yes"}
            ],
            width:'100%',
            placeholder: ' ',
            allowClear: true
        });

        jQuery(".attr-material-group").on("keyup", function(){
            genMaterialNo();
        });    

    jQuery('.btn-add').on('click', function() {
        //jQuery(".material-group-input").removeClass('has-success');
        jQuery(".attr-material-group").prop("required", false);
        //document.getElementById("data-form").reset();
        jQuery("#edit_id").val("");
            jQuery("#add-data-modal .modal-title").html("<i class='fa fa-plus'></i> Create Request");	
        jQuery("#add-data-modal").modal({backdrop:'static', keyboard:false});			
        jQuery("#add-data-modal").modal("show");		
    });

    jQuery('#form-initial').on('submit', function(e){
        e.preventDefault();
        basicDataPanel();
    });
    
    jQuery('#form-basic-data').on('submit', function(e){
        e.preventDefault();
        imagePanel();
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

    function initialPanel() {
        jQuery('.panel-initial').attr("data-toggle","tab");
        jQuery('.panel-initial').click();
        jQuery('.panel-basic-data').removeAttr("data-toggle");
        jQuery('.panel-image').removeAttr("data-toggle");
    }
  
    function basicDataPanel() {
        jQuery('.panel-basic-data').attr("data-toggle","tab");
        jQuery('.panel-basic-data').click();

        jQuery('.panel-initial').removeAttr("data-toggle");
        jQuery('.panel-image').removeAttr("data-toggle");
    }
  
    function imagePanel() {
        jQuery('.panel-image').attr("data-toggle","tab");
        jQuery('.panel-image').click();

        jQuery('.panel-initial').removeAttr("data-toggle");
        jQuery('.panel-basic-data').removeAttr("data-toggle");
    }

    function searchData() {
        // Declare variables 
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search_material");
        filter = input.value.toUpperCase();
        table = document.getElementById("data-table");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            } 
        }
    } 

    function showImage(src,target) {
        var fr=new FileReader();
        // when image is loaded, set the src of the image where you want to display it
        fr.onload = function(e) { target.src = this.result; };
        fr.readAsDataURL(src.files[0]);
        imgFiles.push(src.files[0]);
        jQuery.each(imgFiles, function(key, val){
            console.log(val.name);
            console.log(val.size);
            console.log(val.type);
        });
    }

    function binEncode(data) {
        var binArray = []
        var datEncode = "";

        for (i=0; i < data.length; i++) {
            binArray.push(data[i].charCodeAt(0).toString(2)); 
        } 
        for (j=0; j < binArray.length; j++) {
            var pad = padding_left(binArray[j], '0', 8);
            datEncode += pad + ' '; 
        }
        function padding_left(s, c, n) { if (! s || ! c || s.length >= n) {
            return s;
        }

        var max = (n - s.length)/c.length;
        for (var i = 0; i < max; i++) {
            s = c + s; } return s;
        }
        return binArray;
    }

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
        }
        return true;
    }

</script>            
@stop