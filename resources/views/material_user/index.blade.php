@extends('adminlte::page')

@section('title', 'FMDB')

@section('content')
<style>
    .select-img:hover {
        opacity: 0.5
    }
</style>
<section class="content">
       <div class="row">
              <div class="col-md-9 col-md-offset-1">
                    <div class="input-group">
                        <input type="text" class="form-control" onChange="searchData()" id="search_material" placeholder="search material">
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-flat btn-success btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                    </div>
                </div>
                <div class="col-md-1" align="left">
                    <span href="#" class="btn btn-flat btn-sm btn-success btn-add" style="display:none">&nbsp;<i class="glyphicon glyphicon-plus" title="Request new material"></i>&nbsp;Add</span>
                </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
             <table id="data-table" class="table table-condensed" style="background-color:white" width="100%">
                <thead>
                    <tr>
                        <th width="18%">Material list</th>
                        <th></th>
                        <th width="10%"></th>
                    </tr>
                </thead>
                    <tbody></tbody>
                </table>
          </div>
        </div>
      </div>
</section>
@stop
@section('js')
<script>
    var imgFiles = [];    
    jQuery(document).ready(function() {
      initData();  

      var search = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.auto_sugest') !!}')));
      jQuery("#search_material").autocomplete({
        source: search
      });


        jQuery('.btn-add').on('click', function() {
            window.location.href = "{{ url('material_user/create') }}";

        });
    });

    function initData(param) {
        if ( jQuery.fn.DataTable.isDataTable('#data-table') ) {
            jQuery('#data-table').DataTable().destroy();
        }

        var table =   jQuery('#data-table').DataTable({
        ajax: {
            url:'{!! route('get.tm_material') !!}' + '?search='+ (param ? param:''),
            dataFilter: function(data){
                var json = jQuery.parseJSON( data );
                json.recordsTotal = json.recordsTotal;
                json.recordsFiltered = json.recordsFiltered;
                json.data = json.list;
                totalData = jQuery.parseJSON(data);
                if(totalData.data.length > 0) {
                    jQuery('.btn-add').hide();
                }else{
                    jQuery('.btn-add').show();
                }

                return data;
            },
        },
        columns: [
            {  
                "render": function (data, type, row) {
                    if(row.img) {
                        var content = '<img src="' + row.img + '" class="img-responsive">';
                    } else{
                        var content = '';
                    }    
                    return content;
                } 
            },
            { 
                "render": function (data, type, row) {
                    var content  = '<div class="row" style="padding-left:30px;padding-right:30px;padding-bottom:30px">';
                        content += '<div class="row">';
                        content += '    <div class="col-md-4"><b>Material Number</b></div>';
                        content += '    <div class="col-md-8">' + row.no_material + '</div>'
                        content += '</div>';
                        content += '<div class="row">';
                        content += '    <div class="col-md-4"><b>Nama Material</b></div>';
                        content += '    <div class="col-md-8">' + row.material_name + '</div>';
                        content += '</div>';
                        content += '<div class="row">';
                        content += '    <div class="col-md-4"><b>Merk</b></div>';
                        content += '    <div class="col-md-8">' + (row.merk ? row.merk :'')+ '</div>';
                        content += '</div>';
                        content += '<div class="row">';
                        content += '    <div class="col-md-4"><b>Satuan</b></div>';
                        content += '    <div class="col-md-8">' + row.weight_unit + '</div>';
                        content += '</div>';
                        content += '<div class="row">';
                        content += '    <div class="col-md-4"><b>Keterangan:</b></div>';
                        //content += '    <div class="col-md-12" style="font-size:11px;"> Generator - Max Power: 5.500 watt - Rated Power: 5.000 watt - Rated Ampere: 22.7 A - Voltage: 220 Volt   Frekuensi: 50 Hz- DC Output: 12 Volt / 8.3 A - Phasa: Single </br> Engine - Type: 4 stroke, OHV, Air Cooled - Engine Model: GX 390 - Displacement: 389 CC - Max. Power Output: 13 HP / 3.600 RPM - Starting System: Electric + Recoil Starting / Engkol Tarik- Fuel: Gasoline- Fuel Tank Capacity: 28 Litre - Oil Engine Capacity: 1.100 ml - Noise Level: 72 dB - Dimension: 77 x 56 x 57 cm - Gross Weight: 97 kg</div>';
                        content += '    <div class="col-md-12" style="font-size:11px;">' + (row.remarks ? row.remarks:'') + '</div>';
                        content += '</div>';
                        content += '</div>';

                    return content;
                } 
            },
            { 
                 "render": function (data, type, row) {
                     if(row.src == 1) {
                        var content = '<span href="#" class="btn btn-flat btn-sm btn-default btn-flat btn-block">Extend</span><span href="#" class="btn btn-flat btn-sm btn-default btn-flat btn-block ">Read to PO</span>';
                     }else{
                        var content = '<span class="label label-warning">Requested</span>';
                     }
                    return content;
                } 
            }
        ],
        columnDefs: [
            { targets: [1]},
        ],
        "pageLength": 8,
        "searching": false,
        "sort": false,
        "lengthChange": false,
      });
    }

    function searchData() {
        var param = jQuery('#search_material').val();
        initData(param);
    }

    function searchDataTable() {
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
</script>            
@stop