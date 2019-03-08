@extends('adminlte::page')

@section('title', 'FMDB - Create material')

@section('content')
<style>
    .select-img:hover {
        opacity: 0.5;
        cursor: pointer
    }

	.page {
		padding: 5px 30px 30px 30px;
		max-width: 800px;
		margin: 0 auto;
		font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
		background: #fff;
		color: #555;
    }
    
	img {
		border: none;
    }
    
	a:link,
	a:visited {
		color: #F0353A;
	}
	a:hover {
		color: #8C0B0E;
	}
	ul {
		overflow: hidden;
	}
	pre {
		background: #333;
		padding: 10px;
		overflow: auto;
		color: #BBB7A9;
	}
	.button {
		text-decoration: none;
		color: #F0353A;
		border: 2px solid #F0353A;
		padding: 6px 10px;
		display: inline-block;
		font-size: 18px;
	}
	.button:hover {
		background: #F0353A;
		color: #fff;
	}
	.demo {
		text-align: center;
		padding: 30px 0
	}
	.clear {
		clear: both;
	}

    .sp-lightbox {
        z-index: 9999;
    }

    .sp-wrap {
        max-width: 100% !important;
        background: none !important;
        border:none !important;
        float:none !important;
    }
</style>

<section class="content">
       <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="input-group">
                    <input type="text" class="form-control" id="search_material" placeholder="search material">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-flat btn-success btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                </div>
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
<div id="detail-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" >
		<div class="modal-content">
			<div class="modal-header">	
				<h4 class="modal-title">Group Material</h4>
			</div>
			<div class="modal-body">	
				<div class="row">
                    <div id="show-aterial-detail"></div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-close-group-material-modal" data-dismiss="modal">Close</button>
			</div>
		</div>
    </div>
</div>
@stop
@section('js')
<script>
    var imgFiles = [];    

    jQuery(document).ready(function() {

        jQuery("#search_material").autocomplete({
            source: function (request, response) {
                if(jQuery('#search_material').val()) {
                    var search = jQuery.parseJSON(JSON.stringify(dataJson('{!! url('tm_material_auto_sugest') !!}?param=' + jQuery('#search_material').val())));
                    response (search)
                }
            },
            minLength: 3
        });

        jQuery('#search_material').on('change', function() {
            if(jQuery(this).val()) {
                initData(jQuery(this).val());
            } else {
                var table = $('#data-table').DataTable();
                table
                    .clear()
                    .draw();
            }
        });

    });

    function initData(param) {
        if ( jQuery.fn.DataTable.isDataTable('#data-table') ) {
            jQuery('#data-table').DataTable().destroy();
        }

        if(param) {
            var api = "{!! url('tm_material_grid') !!}";
            var table =   jQuery('#data-table').DataTable({
                ajax: {
                    url: api + '/' + (param ? param:''),
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
                            if(row.image) {
                                var key = row.no_material;
        
                                var content = '<img src="' + row.image + '" class="img-responsive select-img" title="show detail ' + row.material_name + '"  OnClick="showDetail(\'' + key + '\')">';
                            } else{
                                var content = '';
                            }    
                            return content;
                        } 
                    },
                    { 
                        "render": function (data, type, row) {
                            var key = row.no_material;

                            var content  = '<div class="row" style="padding-left:30px;padding-right:30px;padding-bottom:30px">';
                                content += '<div class="row">';
                                content += '    <div class="col-md-4"><b>Material Number</b></div>';
                                content += '    <div class="col-md-8">' + row.no_material + '</div>'
                                content += '</div>';
                                content += '<div class="row">';
                                content += '    <div class="col-md-4"><b>Nama Material</b></div>';
                                content += '    <div class="col-md-8"><a href="#" onClick="showDetail(\'' + key + '\')" title="show detail ' + row.material_name + '">' + row.material_name + '</a></div>';
                                content += '</div>';
                                content += '<div class="row">';
                                content += '    <div class="col-md-4"><b>Merk</b></div>';
                                content += '    <div class="col-md-8">' + (row.merk ? row.merk :'')+ '</div>';
                                content += '</div>';
                                content += '<div class="row">';
                                content += '    <div class="col-md-4"><b>Part Number</b></div>';
                                content += '    <div class="col-md-8">' + (row.part_number ? row.part_number:'') + '</div>';
                                content += '</div>';
                                content += '<div class="row">';
                                content += '    <div class="col-md-4"><b>Satuan</b></div>';
                                content += '    <div class="col-md-8">' + row.weight_unit + '</div>';
                                content += '</div>';
                                content += '<div class="row">';
                                content += '    <div class="col-md-4"><b>Keterangan:</b></div>';
                                content += '    <div class="col-md-12" style="font-size:11px;">' + (row.remarks ? row.remarks:'') + '</div>';
                                content += '</div>';
                                content += '</div>';

                            return content;
                        } 
                    },
                    { 
                        "render": function (data, type, row) {
                            var content = '<button OnClick="edit(this)" data-no_material="' + row.no_material + '" class="btn btn-flat btn-success btn-flat btn-block "><i class="fa fa-pencil"></i> Edit</button>';
                            return content;
                        } 
                    }
                ],
                columnDefs: [
                    { targets: [1]},
                ],
                "pageLength": 10,
                "searching": false,
                "sort": false,
                "lengthChange": false,
            });
        } else {

        }
    }

    function edit(param) {
        var no_material = jQuery(param).data('no_material');
        window.location.href = "{{ url('tm_materials') }}/" + no_material;
    }

    function searchData() {
        jQuery('.loading-event').fadeIn();
        var param = jQuery('#search_material').val();
        initData(param);
        jQuery('.loading-event').fadeOut()
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

    function showDetail(no_material) {
        jQuery('.loading-event').fadeIn();
        var content = '<div class="col-md-6">';
            content += '<div class="sp-wrap text-center">';

            var img_list = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.get_image_detail') !!}?no_document=' + no_material))); 
            //var img_list = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.get_image_detail') !!}?no_document=' + no_document))); 

            jQuery.each(img_list, function(key, val){
                content += '<a href="' + val.file_image + '"><img src="' + val.file_image + '" alt=""></a>';
            });
            content +='</div></div>';
           var detail= jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.tm_material') !!}?search=' + no_material)));

            content +='<div class="col-md-6">';
            content += '<table class="table table-condensed">';
            content += '<tr>';
            content += '    <td widh="180px"><b>Material Number</b></td>';
            content += '    <td>' + detail.no_material + '</td>'
            content += '</tr>';
            content += '<tr>';
            content += '    <td><b>Nama Material</b></td>';
            content += '    <td>' + detail.material_name + '</td>';
            content += '</tr>';
            content += '<tr>';
            content += '    <td><b>Merk</b></td>';
            content += '    <td>' + (detail.merk ? detail.merk :'')+ '</td>';
            content += '</tr>';
            content += '<tr>';
            content += '    <td><b>Part number</b></td>';
            content += '    <td>' + (detail.part_number ? detail.part_number :'')+ '</td>';
            content += '</tr>';
            content += '<tr>';
            content += '    <td><b>Satuan</b></td>';
            content += '    <td>' + detail.weight_unit + '</td>';
            content += '</td>';
            content += '<tr>';
            content += '    <td><b>Keterangan:</b></td>';
            content += '    <td>' + (detail.remarks ? detail.remarks:'') + '</td>';
            content += '</tr>';
            content += '<tr>';
            content += '    <td colspan="2"><button OnClick="edit(this)" data-no_document="' + detail.no_material + '" class="btn btn-flat btn-success btn-flat btn-block"><i class="fa fa-pencil"></i> Edit</button></td>';
            content += '</tr>';
            content += '</table>';
            content +='</div>';
        
        jQuery('#show-aterial-detail').html(content);
        jQuery('.sp-wrap').smoothproducts();
        jQuery("#detail-modal .modal-title").html("Detail " + detail.material_name );	
        jQuery("#detail-modal").modal({backdrop:'static', keyboard:false});			
        jQuery("#detail-modal").modal("show");	
        jQuery('.loading-event').fadeOut()	
    }
</script>            
@stop