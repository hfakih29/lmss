function loadResults(){

    var url = config.path.ajax 
            + "/books?callNumber=" + $('#callNumber_fill').val();

    var table = $('#all-books');
    
    var default_tpl = _.template($('#allbooks_show').html());

    $.ajax({
        url : url,
        success : function(data){
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="99">No Books with this call number</td></tr>');
            } else {
                table.html('');
                for (var book in data) {
                    table.append(default_tpl(data[book]));
                }
            }
        },
        beforeSend : function(){
            table.css({'opacity' : 0.4});
        },
        complete : function() {
            table.css({'opacity' : 1.0});
        }
    });
}

$(document).ready(function(){

    $("#callNumber_fill").change(function(){
        loadResults();
    });

    $(document).on("click","#addbookcallnumber",function(){

        var form = $(this).parents('form'),
            module_body = $(this).parents('.module-body'),
            sendJSON ={},
            send_flag = true,
            f$ = function(selector) {
                return form.find(selector);
            };

        callNumber = f$('input[data-form-field~=callNumber]').val();
        _token = f$('input[data-form-field~=token]').val();

        if(callNumber == ""){
            module_body.prepend(templates.alert_box( {type: 'danger', message: 'Call Number Field is Required'} ));
            send_flag = false;
        }
        
        if(send_flag == true){

            $.ajax({
                type : 'POST',
                data : {
                    callNumber : callNumber, _token:_token
                },
                url : '/bookcallnumber',
                success: function(data) {                    
                    module_body.prepend(templates.alert_box( {type: 'success', message: data} ));
                    clearform();
                },
                error: function(xhr,status,error){
                    var err = eval("(" + xhr.responseText + ")");
                    module_body.prepend(templates.alert_box( {type: 'danger', message: err.error.message} ));
                },
                beforeSend: function() {
                    form.css({'opacity' : '0.4'});
                },
                complete: function() {
                    form.css({'opacity' : '1.0'});
                }
            });
        }
    }); // add books to database

    $(".alert_box").hide().delay(5000).fadeOut();

    loadResults();

});

function clearform(){
    $('#callNumber').val('');
}