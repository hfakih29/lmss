@extends('layout.index')

@section('custom_top_script')
@stop

@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>All Approved Students</h3>
        </div>
        
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email ID</th>
                        <th>Books Issued</th>
                    </tr>
                </thead>
                <tbody >
                <tbody >
                @foreach($students as $row )
                    <tr class="text-center">
                        <td >{{$row->member_id}}</td>
                        <td >{{$row->firstname}}</td>
                        <td >{{$row->lastname}}</td>
                        <td >{{$row->email}}</td>
                        <td >{{$row->books_issued}}</td>

                        <td >
                        <a href="{{route('user.status',['id'=>$row->member_id])}}" class="btn btn-danger">Block</a></td>
                    </tr>
                @endforeach
                </tbody>
                </tbody>
            </table>
        </div>
    </div>
   

</div>
@stop

@section('custom_bottom_script')

<script type="text/javascript" src="{{ asset('static/custom/js/script.students.js') }}"></script>
<script type="text/template" id="allstudents_show">
    @include('underscore.allstudents_show')
</script>
@stop