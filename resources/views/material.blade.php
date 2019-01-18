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
            <span href="#" class="btn btn-flat btn-sm btn-success btn-add">&nbsp;<i class="glyphicon glyphicon-plus" title="Add new data"></i>&nbsp; Add</span>
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
                                    <li><a href="#panel-basic-data"  data-toggle="tab"  class="panel-basic-data" disabled>MATERIAL INFORMATION</a></li>
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
                                                                <select type="text" class="form-control" name="plant" id="plant" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">  
                                                            <div class="form-group">
                                                                <label for="location">Location</label>
                                                                <select type="text" class="form-control" name="location" id="location" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="mrp_controller">MRP Controller</label>
                                                                <select type="text" class="form-control" name="mrp_controller" id="mrp_controller" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>  
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="valuation_class">Valuation Class</label>
                                                                <select type="text" class="form-control" name="valuation_class" id="valuation_class" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>  
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="sector_industry">Industri sector</label>
                                                                <select type="text" class="form-control" name="industry_sector" id="industry_sector" required >
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  <div class="row">
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="material_type">Material Type</label>
                                                                <select type="text" class="form-control" name="material_type" id="material_type" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="store_location">Store Location</label>
                                                                <select type="text" class="form-control" name="store_location" id="store_location" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>  
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="sales_org">Sales Org</label>
                                                                <select type="text" class="form-control" name="sales_org" id="sales_org" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>  
                                                  </div>
                                                    <div class="row">
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="dist_channel">Distribution Channel</label>
                                                                <select type="text" class="form-control" name="dist_channel" id="dist_channel" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="division">Division</label>
                                                                <select type="text" class="form-control" name="division" id="division" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="general_item_category_group">General Item Category Group</label>
                                                                <select type="text" class="form-control" name="general_item_category_group" id="general_item_category_group" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                    </div>  
                                                    <div class="row">
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="cash_discount">Cash Discount</label>
                                                                <select type="text" class="form-control" name="cash_discount" id="cash_discount" required></select>
                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="tax_classification">Tax Classification</label>
                                                                <select type="text" class="form-control" name="tax_classification" id="tax_classification" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="account_assign">Account Assignment Group</label>
                                                                <select type="text" class="form-control" name="account_assign" id="account_assign" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                     </div>  
                                                    <div class="row">
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="item_category_group">Item Category Group</label>
                                                                <select type="text" class="form-control" name="item_category_group" id="item_category_group" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="availability_check">Availability Check</label>
                                                                <select type="text" class="form-control" name="availability_check" id="availability_check" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="transportation_group">Transportation Group</label>
                                                                <select type="text" class="form-control" name="transportation_group" id="transportation_group" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="loading_group">Loading Group</label>
                                                                <select type="text" class="form-control" name="loading_group" id="loading_group" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="profit_center">Profit Center</label>
                                                                <select type="text" class="form-control" name="profit_center" id="profit_center" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="mrp_type">MRP Type</label>
                                                                <select type="text" class="form-control" name="mrp_type" id="mrp_type" required>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-md-4"> 
                                                            <div class="form-group">
                                                                <label for="period_ind_for_sle">Period Ind. for SLE</label>
                                                                <select type="text" class="form-control" name="period_ind_for_sle" id="period_ind_for_sle" required>
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
                                                                <label for="part_no">Material name</label>
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
                                                                <input type="text" class="form-control" name="material_sap"  id="material_sap"  readonly>
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
                                                                <input type="text" class="form-control" name="gross_weight" id="gross_weight" >
                                                            </div>
                                                        </div> 
                                                         <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="net_weight">Net Weight</label>
                                                                <input type="text" class="form-control" name="net_weight" id="net_weight" >
                                                            </div>
                                                        </div> 
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                            <label for="volume">Volume</label>
                                                                <input type="text" class="form-control" name="volume" id="volume" >
                                                            </div>
                                                        </div> 
                                                      </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="size">Size/Dimension</label>
                                                                   <input type="text" class="form-control" name="size" id="size" >
                                                                </div>
                                                            </div> 
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="weight_unit">Weight Unit</label>
                                                                    <input type="text" class="form-control" name="weight_unit" id="weight_unit" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                 <label for="volume_unit">Volume Unit</label>
                                                                    <input type="text" class="form-control" name="volume_unit" id="volume_unit" >
                                                                </div>
                                                            </div> 
                                                      </div>
                                                       <h5>IMAGE</h5>
                                                       <div class="row">
                                                            <div class="col-md-4">
                                                                 <div class="form-group">
                                                                <label for="exampleInputFile">File input</label>
                                                                <input type="file" id="exampleInputFile" ultiple accept='image/*'>

                                                                <p class="help-block">*jpg, png</p>
                                                                </div>
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

         jQuery('#form-basic-data').on('submit', function(e) {
            e.preventDefault();
           jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //var form = jQuery('#form-initial').not(':submit').clone().hide().appendTo('#form-basic-data');
            var param = jQuery("#form-initial, #form-basic-data").serialize();
            
            jQuery.ajax({
				url:"{{ url('material_user/post') }}",
				method:"POST",
				data: param,
				beforeSend:function(){},
				success:function(result){
                    var data = jQuery.parseJSON(result);
                    if(data.code == '201'){
                        jQuery("#add-data-modal").modal("hide");
                        //jQuery("#data-table").DataTable().ajax.reload();
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
            
            
        })


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
</script>            
@stop