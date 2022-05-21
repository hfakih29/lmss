function loadResults(){
    var url =  "/borrow";

    var table = $('#borrowapproval-table');
    
    var default_tpl = _.template($('#approvalborrow_show').html());

    $.ajax({
        url : url,
        success : function(data){
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="99">No pending requests for these filters</td></tr>');
            } else {
                table.html('');
                for (var Borrow in data) {
                    table.append(default_tpl(data[Borrow]));
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



function approveBorrow(issueID, flag, btn) {
    var module_body = btn.parents('.module-body'),
        table = $('#borrowapproval-table');

    console.log(flag);

    $.ajax({
        type : 'POST',
        data : { 
            _method : "PUT", 
            flag : flag,
            _token:_token
        },
        url : '/borrow/' + issueID,
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


    $(document).on("click",".issue-status",function(){
        var selectedRow = $(this).parents('tr'),
            issueID = selectedRow.data('issue-id')
            flag = $(this).data('status');
        
        console.log(issueID);
        console.log(flag);
        
        approveBorrow(issueID, flag, $(this));
    });
    
    loadResults();

});