function loadResults(){
    var url =  "/member" ;


    var table = $('#approval-table');
    
    var default_tpl = _.template($('#approvalstudents_show').html());

    $.ajax({
        url : url,
        success : function(data){
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="99">No requests for approval</td></tr>');
            } else {
                table.html('');
                for (var student in data) {
                    table.append(default_tpl(data[student]));
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




function approveMember(memberID, flag, btn) {
    var module_body = btn.parents('.module-body'),
        table = $('#approval-table');

    console.log(flag);

    $.ajax({
        type : 'POST',
        data : { 
            _method : "PUT", 
            flag : flag,
            _token:_token
        },
        url : '/member/' + memberID,
        success: function(data) {
            module_body.prepend(templates.alert_box( {type: 'success', message: data} ));
            loadResults();
        },
        error: function(xhr, msg){
            module_body.prepend(templates.alert_box( {type: 'danger', message: msg} ));     
        },
        beforeSend: function() {
            table.css({'opacity' : '0.4'});
        },
        complete: function() {
            table.css({'opacity' : '1.0'});
        }
    });
}

$(document).ready(function(){



    $(document).on("click",".member-status",function(){
        var selectedRow = $(this).parents('tr'),
            memberID = selectedRow.data('member-id')
            flag = $(this).data('status');
        
        console.log(memberID);
        console.log(flag);
        
        approveMember(memberID, flag, $(this));
    });
    
    loadResults();

});