@extends('adminlte::page')

@section('title', 'FMDB')

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

    #search_material {
        text-transform: uppercase;
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
        initData();  

/*         var callback = function(request, response) {
        var searchText = request.item;
        // Set searchField somehow here
        $.ajax({  
            type: "GET",  
            dataType: "text",  
            url: "SearchCallback.aspx?searchText=" + searchText + "&searchField=" + searchField,
            success: function (data)
            {
                var splitData =  data.split(",");
                response(splitData);
            });      
        });
    }; */

/*     $( ".searchTextBox" ).autocomplete({
        source: callback,
        autoFill: true
    }); */

        var search = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.auto_sugest') !!}')));
        jQuery("#search_material").autocomplete({
            source: search,
            minLength: 3
        });
        
        jQuery('.btn-add').on('click', function() {
            window.location.href = "{{ url('material_user/create') }}";
        });

    });

    function initData(param) {
        if ( jQuery.fn.DataTable.isDataTable('#data-table') ) {
            jQuery('#data-table').DataTable().destroy();
        }

        if(param) {
            var api = '{!! route('get.material_user_grid_search') !!}';
        } else {
            var api = '{!! route('get.material_user_grid') !!}';
        }

        var table =   jQuery('#data-table').DataTable({
        ajax: {
            url: api + '?search=' + (param ? param:''),
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
                    if(row.file_image) {
                        var key = row.no_document;
  
                        var content = '<img src="' + row.file_image + '" class="img-responsive select-img" title="show detail ' + row.material_name + '"  OnClick="showDetail(\'' + key + '\',\'' + row.src + '\')">';
                    } else{
                        var content = '';
                    }    
                    return content;
                } 
            },
            { 
                "render": function (data, type, row) {
                    var key = row.no_document;

                    var content  = '<div class="row" style="padding-left:30px;padding-right:30px;padding-bottom:30px">';
                        content += '<div class="row">';
                        content += '    <div class="col-md-4"><b>Material Number</b></div>';
                        content += '    <div class="col-md-8">' + row.no_material + '</div>'
                        content += '</div>';
                        content += '<div class="row">';
                        content += '    <div class="col-md-4"><b>Nama Material</b></div>';
                        content += '    <div class="col-md-8"><a href="#" onClick="showDetail(\'' + key + '\',\'' + row.src + '\')" title="show detail ' + row.material_name + '">' + row.material_name + '</a></div>';
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
                     if(row.src === '0') {
                        var content = '<button OnClick="extend(this)" data-no_document="' + (row.no_document ? row.no_document:row.no_material) + '" class="btn btn-flat btn-sm btn-default btn-flat btn-block">Extend</button>';
                            content +='<span href="#" class="btn btn-flat btn-sm btn-default btn-flat btn-block ">Read to PO</span>';
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
        "pageLength": 10,
        "searching": false,
        "sort": false,
        "lengthChange": false,
      });
    }

    function searchData() {
        jQuery('.loading-event').fadeIn();
        var param = jQuery('#search_material').val();
        initData(param);
        jQuery('.loading-event').fadeOut()
    }

    function showDetail(no_document, status) {
        jQuery('.loading-event').fadeIn();
        var content = '<div class="col-md-6">';
            content += '<div class="sp-wrap text-center">';

            var img_list = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.get_image_detail') !!}?no_document=' + no_document)));    
            jQuery.each(img_list, function(key, val){
                content += '<a href="' + val.file_image + '"><img src="' + val.file_image + '" alt=""></a>';
            });
            content +='</div></div>';
           var detail= jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.tr_material') !!}?search=' + no_document)));

            content +='<div class="col-md-6">';
            content += '<table class="table table-condensed">';
            content += '<tr>';
            content += '    <td widh="180px"><b>Material Number</b></td>';
            content += '    <td>' + detail[0].no_material + '</td>'
            content += '</tr>';
            content += '<tr>';
            content += '    <td><b>Nama Material</b></td>';
            content += '    <td>' + detail[0].material_name + '</td>';
            content += '</tr>';
            content += '<tr>';
            content += '    <td><b>Merk</b></td>';
            content += '    <td>' + (detail[0].merk ? detail[0].merk :'')+ '</td>';
            content += '</tr>';
            content += '<tr>';
            content += '    <td><b>Part number</b></td>';
            content += '    <td>' + (detail[0].part_number ? detail[0].part_number :'')+ '</td>';
            content += '</tr>';
            content += '<tr>';
            content += '    <td><b>Satuan</b></td>';
            content += '    <td>' + detail[0].weight_unit + '</td>';
            content += '</td>';
            content += '<tr>';
            content += '    <td><b>Keterangan:</b></td>';
            content += '    <td>' + (detail[0].remarks ? detail[0].remarks:'') + '</td>';
            content += '</tr>';
            if(status === '1') {
                 content += '<tr>';
                content += '    <td colspan="2"><span class="label label-warning">Requested</span></td>';
                content += '</tr>';
            } else {
                content += '<tr>';
                if(row.src === '0') {
                  var  content = '<button OnClick="extend(this)" data-no_document="' + (row.no_document ? row.no_document:row.no_material) + '" class="btn btn-flat btn-sm btn-default btn-flat btn-block">Extend</button>';
                    content +='<span href="#" class="btn btn-flat btn-sm btn-default btn-flat btn-block ">Read to PO</span>';
                }else{
                    var content = '<span class="label label-warning">Requested</span>';
                }
                content += '</tr>';
            }   

            content += '</table>';
            content +='</div>';
        
        jQuery('#show-aterial-detail').html(content);
        jQuery('.sp-wrap').smoothproducts();
        jQuery("#detail-modal .modal-title").html("Detail " + detail[0].material_name );	
        jQuery("#detail-modal").modal({backdrop:'static', keyboard:false});			
        jQuery("#detail-modal").modal("show");	
        jQuery('.loading-event').fadeOut()	
    }
</script>            
@stop