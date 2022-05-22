

<tr data-member-id="<%= obj.member_id %>">
	<td><%= obj.member_id %></td>
	<td><%= obj.firstname %></td>
	<td><%= obj.lastname %></td>

	<td>
		<a class="btn btn-success member-status" data-status="1">Approve</a>
		<a class="btn btn-danger member-status" data-status="0">Reject</a>
	</td>
</tr>