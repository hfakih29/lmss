@extends('layout.index')

@section('custom_top_script')
@stop

@section('content')
<div class="content">
    <div class="module">

        <b></b>
        <div class="module-head">
            @if($errors->any())
                <h3 style="color: green">{{$errors->first()}}</h3>
            @else
                <h3>Members waiting for their approval to access Library</h3>
            @endif

        </div>

            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Approve</th>
                    </tr>
                </thead>
                <tbody >
                @foreach($users as $row )
                    <tr class="text-center">
                        <td >{{$row->id}}</td>
                        <td >{{$row->firstname}}</td>
                        <td >{{$row->lastname}}</td>

                        <td >
                            @if($row->verification_status==0)
                            <a href="{{route('user.status',['id'=>$row->id,'status'=>'1'])}}" class="btn btn-primary">Approved</a>
                            @endif
                        <a href="{{route('user.status',['id'=>$row->id,'status'=>'2'])}}" class="btn btn-danger">Block</a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <input type="hidden" id="_token"  data-form-field="token"  value="{{ csrf_token() }}">
</div>

@stop

@section('custom_bottom_script')
<script type="text/javascript">
    var _token = $('#_token').val();
</script>
<script type="text/javascript" src="{{asset('static/custom/js/script.student-approval.js') }}"></script>
<script type="text/template" id="approvalstudents_show">
    @include('underscore.approvalstudents_show')
</script>
@stop
