@extends('layout.index')


@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>Book copies available to Students</h3>
        </div>
        <div class="module-body">
<!--             <p>
                <strong>Combined</strong>
                -
                <small>table class="table table-striped table-bordered table-condensed"</small>
            </p> -->
            <div class="controls">
                <select class="" id="callNumber_fill">
                    @foreach($callNumber_list as $callNumber)
                        <option value="{{ $callNumber->callNumber }}">{{ $callNumber->callNumber }}</option>
                    @endforeach
                </select>
        </div>
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Copy Barcode</th>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>callNumber</th>
                        <th>available status</th>


                    </tr>
                </thead>
                <tbody >
                @foreach($copies as $row )
                    <tr class="text-center">
                        <td >{{$row->issue_id}}</td>
                        <td >{{$row->book_id}}</td>
                        <td >{{$row->title}}</td>
                        <td >{{$row->callNumber}}</td>
                        <td >{{$row->available_status}}</td>
</tr>
@endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@stop

@section('custom_bottom_script')
<script type="text/javascript">
    var callNumber_list = $('#callNumber_list').val();
</script>
@stop
