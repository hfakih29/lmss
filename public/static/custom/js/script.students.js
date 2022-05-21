function loadResults(){
    var url = "/member/create";

    var table = $('#students-table');
    
    var default_tpl = _.template($('#allstudents_show').html());

    $.ajax({
        url : url,
        success : function(data){
            console.log(data);
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="99">No Students approved</td></tr>');
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

$(document).ready(function(){

    loadResults();

});