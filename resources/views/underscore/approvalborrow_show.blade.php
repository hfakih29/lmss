<tr >
<td >{{$row->request_id}}</td>
                        <td >{{$row->firstname}}</td>
                        <td >{{$row->lastname}}</td>
                        <td >{{$row->email}}</td>
                        <td >{{$row->issue_id}}</td>
                        <td >{{$row->title}}</td>
                        <td >{{$row->callNumber}}</td>
                        <td>

                        <a href="{{route('borrow.approved',['id'=>$row->request_id])}}" class="btn btn-success ">Accept</a>
                        <a href="{{route('borrow.rejected',['id'=>$row->request_id])}}" class="btn btn-danger ">Decline</a></td>
</tr>