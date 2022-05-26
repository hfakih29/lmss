<tr>
	
<td >{{$row->title}}</td>
<td >{{$row->author}}</td>
<td >{{$row->ISBN}}</td>
<td >{{$row->publisher}}</td>
<td >{{$row->year}}</td>
<td >{{$row->edition}}</td>
<td >{{$row->callNumber}}</td>
<td><%= obj.avaliability %>
<a href="{{route('borrow.request',['id'=>$row->book_id])}}" class="btn btn-success ">Request for borrow</a></td>

</tr> 