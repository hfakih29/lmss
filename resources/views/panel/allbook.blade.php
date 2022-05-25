@extends('layout.index')
@section('custom_top_script')
@stop

@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>Books available to Students</h3>
        </div>
        <div class="module-body">
<!--             <p>
                <strong>Combined</strong>
                -
                <small>table class="table table-striped table-bordered table-condensed"</small>
            </p> -->
{{--            <div class="controls">--}}
{{--                <select class="" id="callNumber_fill">--}}
{{--                <option value="none">none</option>--}}
{{--                    @foreach($callNumber_list as $callNumber)--}}
{{--                        <option value="{{ $callNumber->id }}">{{ $callNumber->callNumber }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Publisher</th>
                        <th>Year</th>
                        <th>Edition</th>
                        <th>Available</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody id="all-books">
                    <tr class="text-center">
                       @foreach($books as $row)
                           <td>{{$row->id}}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->author}}</td>
                            <td>{{$row->ISBN}}</td>
                            <td>{{$row->publisher}}</td>
                            <td>{{$row->year}}</td>
                            <td>{{$row->edition}}</td>
                        @if($row->status==0)
                            <th style="color: red">Not Available</th>
                            @else
                                <th style="color: green"> Available</th>
                            @endif
                            @if($row->status==0)
                                <th style="color: red">Not Available</th>
                            @else
                                <th style="color: green"> Available</th>
                            @endif
                            <td >
                                @if($row->status==0)
                                    <a href="{{route('book.status',['id'=>$row->id,'status'=>'1'])}}" class="btn btn-primary">Accept</a>
                                @endif
                                <a href="{{route('book.status',['id'=>$row->id,'status'=>'2'])}}" class="btn btn-danger">Reject</a></td>



                        @endforeach
                    </tr>
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
<script type="text/javascript" src="{{asset('static/custom/js/script.addbook.js') }}"></script>
<script type="text/template" id="allbooks_show">
    @include('underscore.allbooks_show')
</script>
@stop
