@extends('layout.index')

@section('custom_top_script')
@stop

@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>Borrow requests pending for approval</h3>
        </div>
         <div class="module-body">
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Copy ID</th>
                        <th>Book title</th>                       
                        <th>Call Number</th>
                        <th>Approve</th>
                    </tr>
                </thead>
                <tbody id="borrowapproval-table" >


                </tbody>
            </table>
        </div>
        <input type="hidden" id="_token"  data-form-field="token"  value="{{ csrf_token() }}">
    </div>
    <script type="text/template" id="approvalborrow_show">
    @foreach($requests as $row )
    @if($row->approved ==0 &&  $row->rejected ==0)
    <tr class="text-center">
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
                    @endif
                    @endforeach
  </script>
</div>@section('custom_bottom_script')
<script type="text/javascript">
    var _token = $('#_token').val();
</script>
<script type="text/javascript" src="{{asset('static/custom/js/script.borrow-approval.js') }}"></script>
@stop


@stop

