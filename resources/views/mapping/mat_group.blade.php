@extends('adminlte::page')
@section('title', 'FMDB - Mapping Material Group')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-4">
            <span style="font-size:24px">Menu</span>
        </div>
        <div class="col-xs-8" align="right">
            <span href="#" class="btn btn-sm btn-flat btn-success btn-add {{ (isset($access['CREATE']) ? '':'hide') }}">&nbsp;<i class="glyphicon glyphicon-plus" title="Add new data"></i>&nbsp; Add</span>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="data-table" class="table table-bordered table-hover table-condensed" width="100%">
                        <thead>
                            <tr>
                                <th width="">Mat Group</th>
                                <th width="">Valuation Class</th>
                                <th>Material Type</th>
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
                        <div class="col-xs-12">
                            <label class="control-label" for="name">Material Group</label>
                            <select class="form-control" name='mat_group' id="mat_group" requried>
                                <option></option>
                            </select>
                        </div>
                        <div class="col-xs-12">
                            <label class="control-label" for="name">Valuation Class</label>
                            <select class="form-control" name='valuation_class' id="valuation_class" requried>
                                <option></option>
                            </select>
                        </div>
                        <div class="col-xs-12">
                            <label class="control-label" for="name">Material Type</label>
                            <select class="form-control" name='material_type' id="material_type" requried>
                                <option></option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-flat btn-success" style="margin-right: 5px;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
@section('js')
<script>
    var attribute = [];
    jQuery(document).ready(function() {
        jQuery('#data-table').DataTable({
            ajax: '{!! route("get.mappingmatgroup_grid") !!}',
            columns: [{
                    data: 'mat_group',
                    name: 'mat_group'
                },
                {
                    data: 'valuation_class',
                    name: 'valuation_class'
                },
                {
                    data: 'material_type',
                    name: 'material_type'
                },
                {
                    "render": function(data, type, row) {
                        var content = '<button class="btn btn-flat btn-xs btn-success btn-action btn-edit {{ (isset($access['UPDATE ']) ? '':'hide ') }}" title="edit data ' + row.name + '" onClick="edit(' + row.menu_code + ')"><i class="fa fa-pencil"></i></button>';
                        content += '<button class="btn btn-flat btn-xs btn-danger btn-action btn-activated {{ (isset($access['DELETE ']) ? '':'hide ') }}" style="margin-left:5px"  onClick="inactive(' + row.menu_code + ')"><i class="fa fa-trash"></i></button>';

                        return content;
                    }
                }
            ],
            columnDefs: [{
                targets: [3],
                className: 'text-center',
                orderable: false
            }, ]
        });

        var plant = makeSelectFromgeneralData({
            url: "{{ url('/select2') }}",
            code: 'mat_group'
        });

        jQuery('#mat_group').select2({
            data: plant,
            width: '100%',
            placeholder: ' ',
            allowClear: true
        })
       
        var plant = makeSelectFromgeneralData({
            url: "{{ url('/select2') }}",
            code: 'material_type'
        });

        jQuery('#material_type').select2({
            data: plant,
            width: '100%',
            placeholder: ' ',
            allowClear: true
        });
        var plant = makeSelectFromgeneralData({
            url: "{{ url('/select2') }}",
            code: 'valuation_class'
        });

        jQuery('#valuation_class').select2({
            data: plant,
            width: '100%',
            placeholder: ' ',
            allowClear: true
        });

        jQuery('.btn-add').on('click', function() {
            document.getElementById("data-form").reset();
            jQuery('#code').prop('disabled', false);
            jQuery("#edit_id").val("");
            jQuery("#add-data-modal").modal({
                backdrop: 'static',
                keyboard: false
            });
            jQuery("#add-data-modal .modal-title").html("<i class='fa fa-plus'></i> Create new data");
            jQuery("#add-data-modal").modal("show");
        });

        jQuery('.btn-edit').on('click', function() {
            jQuery("#add-data-modal").modal({
                backdrop: 'static',
                keyboard: false
            });
            jQuery("#add-data-modal .modal-title").html("<i class='fa fa-pencil'></i> Edit data");
            jQuery("#add-data-modal").modal("show");
        });

        jQuery('#data-form').on('submit', function(e) {
            e.preventDefault();
            var param = jQuery(this).serialize();
            jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            jQuery.ajax({
                url: "{{ url('mappingmatgroup/post') }}",
                method: "POST",
                data: param,
                beforeSend: function() {
                    jQuery('.loading-event').fadeIn();
                },
                success: function(result) {
                    if (result.status) {
                        jQuery("#add-data-modal").modal("hide");
                        jQuery("#data-table").DataTable().ajax.reload();
                        notify({
                            type: 'success',
                            message: result.message
                        });
                    } else {
                        notify({
                            type: 'warning',
                            message: result.message
                        });
                    }
                },
                complete: function() {
                    jQuery('.loading-event').fadeOut();
                }
            });


        })
    });

    function edit(id) {
        document.getElementById("data-form").reset();
        jQuery("#edit_id").val(id);
        jQuery('#code').prop('disabled', true);
        var result = jQuery.parseJSON(JSON.stringify(dataJson("{{ url('menu/edit/?id=') }}" + id)));
        jQuery("#edit_id").val(result.menu_code);
        jQuery("#code").val(result.menu_code);
        jQuery("#name").val(result.menu_name);
        jQuery("#url").val(result.url);
        jQuery("#sorting").val(result.sorting);
        jQuery("#add-data-modal .modal-title").html("<i class='fa fa-edit'></i> Update data " + result.menu_name);
        jQuery("#add-data-modal").modal("show");
    }

    function inactive(id) {
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
            url: "{{ url('menu/inactive') }}",
            method: "POST",
            data: {
                id: id
            },
            beforeSend: function() {
                jQuery('.loading-event').fadeIn();
            },
            success: function(result) {
                if (result.status) {
                    jQuery("#data-table").DataTable().ajax.reload();
                    notify({
                        type: 'success',
                        message: result.message
                    });
                } else {
                    notify({
                        type: 'warning',
                        message: result.message
                    });
                }
            },
            complete: function() {
                jQuery('.loading-event').fadeOut();
            }
        });
    }

    function active(id) {
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
            url: "{{ url('menu/active') }}",
            method: "POST",
            data: {
                id: id
            },
            beforeSend: function() {
                jQuery('.loading-event').fadeIn();
            },
            success: function(result) {
                if (result.status) {
                    jQuery("#data-table").DataTable().ajax.reload();
                    notify({
                        type: 'success',
                        message: result.message
                    });
                } else {
                    notify({
                        type: 'warning',
                        message: result.message
                    });
                }
            },
            complete: function() {
                jQuery('.loading-event').fadeOut();
            }
        });
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