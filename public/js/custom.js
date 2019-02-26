function dataJson(url) {
    var mydata = [];
    jQuery.ajax({
        url: url,
        async: false,
        dataType: 'json',
        success: function (json) {
            mydata = json.data;
        }
    });

    var json = jQuery.parseJSON(JSON.stringify(mydata));
    return json;
}

function makeSelect(param) {
    var make;
    make = 'table=' + param.param.table;
    make += '&table=' + param.param.table;
    make += '&id=' + param.param.id;
    make += '&text=' + param.param.text;

    if (param.param.where) {
        jQuery.each(param.param.where, function (key, val) {
            make += '&wheres[]=' + val.field + ',' + val.comparison + ',' + val.value;
        })
    }
    
    var mydata = [];
    jQuery.ajax({
        type: "GET",
        url: param.url + '?' + make,
        async: false,
        dataType: 'json',
        success: function (json) {
            mydata = json.data;
        }
    });

    var data = jQuery.parseJSON(JSON.stringify(mydata));
    return data;
}

function makeSelectFromgeneralData(param) {
    var data = makeSelect({
        url: param.url,
        param: {
            table: 'tm_general_data',
            where: [
                { field: 'general_code', comparison: 'equal', value: param.code }
            ],
            id: 'description_code',
            text: 'description'
        }
    });    
    return data;    
}


function notify(param) {
    Command: toastr[param.type](param.message)

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}