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
                    <span href="#" onclick="showDetail('729896','1')" class="btn btn-flat btn-sm btn-success">Detail</span>
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
    <div class="modal-dialog" width="900px">
		<div class="modal-content">
			<div class="modal-header">	
				<h4 class="modal-title">Group Material</h4>
			</div>
			<div class="modal-body">	
				<div class="box-body">
                   <div class="col-md-6">
                        <div class="sp-wrap text-center">
                            <a href="{{ asset('vendor/smooth-products/images/')  }}/1.jpg"><img src="{{ asset('vendor/smooth-products/images/')  }}/1_tb.jpg" alt=""></a>
                            <a href="{{ asset('vendor/smooth-products/images/')  }}/2.jpg"><img src="{{ asset('vendor/smooth-products/images/')  }}/2_tb.jpg" alt=""></a>
                            <a href="{{ asset('vendor/smooth-products/images/')  }}/3.jpg"><img src="{{ asset('vendor/smooth-products/images/')  }}/3_tb.jpg" alt=""></a>
                        </div>
                   </div>
                   <div class="col-md-6"></div>
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

      /*   var search = jQuery.parseJSON(JSON.stringify(dataJson('{!! route('get.auto_sugest') !!}')));
        jQuery("#search_material").autocomplete({
            source: search
        });  */

        jQuery('.sp-wrap').smoothproducts();

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
                    if(row.file_image) {
                        if(row.src === '0') {
                            var key = row.material_no;
                        } else {
                            var key = row.no_document;
                        }
                        var content = '<img src="' + row.file_image + '" class="img-responsive select-img" title="show detail ' + row.material_name + '"  OnClick="showDetail(\'' + key + '\',\'' + row.src + '\')">';
                    } else{
                        var content = '';
                    }    
                    return content;
                } 
            },
            { 
                "render": function (data, type, row) {
                    if(row.src === '0') {
                        var key = row.material_no;
                    } else {
                        var key = row.no_document;
                    }

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
        "pageLength": 10,
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

    function showDetail(no_document, status) {
        console.log(no_document);
        console.log(status);
        jQuery("#detail-modal .modal-title").html("Machine Bla Bla");	
        jQuery("#detail-modal").modal({backdrop:'static', keyboard:false});			
        jQuery("#detail-modal").modal("show");		
    }
</script>            
@stop