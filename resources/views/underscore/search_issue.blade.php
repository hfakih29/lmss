<div class="" style="background:#000000; color:#ffffff"><center>Book Details</center></div>
<dl class="dl-horizontal">
    <dt>Book Name</dt>
    <dd><%= obj.title %></dd>
    <dt>Author</dt>
    <dd><%= obj.author %></dd>
    <dt>Book CallNumber</dt>
    <dd><%= obj.callNumber %></dd>
    <dt>Available Status</dt>
    <dd><%= obj.available_status %></dd>
</dl>

<%
    if(obj.hasOwnProperty('student')){
%>
<div class="" style="background:#9400D3; color:#000000"><center>Student Details</center></div>
<dl class="dl-horizontal">
    <dt>Student ID</dt>
    <dd><%= obj.student.member_id %></dd>
    <dt>Student Name</dt>
    <dd><%= obj.student.firstname %> <%= obj.student.lastname %></dd>
</dl>
<%
    }
%>
