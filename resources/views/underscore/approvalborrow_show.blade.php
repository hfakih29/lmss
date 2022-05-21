<tr data-borrow-id="<%= obj.issue_id %>">
	<td><%= obj.issue_id %></td>
	<td><%= obj.firstname %></td>
	<td><%= obj.lastname %></td>
	<td><%= obj.title %></td>
	<td><%= obj.ISBN %></td>
	<td><%= obj.callNumber %></td>

	<td>
		<a class="btn btn-success borrow-status" data-status="1">Approve</a>
		<a class="btn btn-danger borrow-status" data-status="0">Reject</a>
	</td>
</tr>