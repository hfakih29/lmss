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
                @foreach($requests as $row )
                   <tr class="text-center">
                    
                       
                   @include('underscore.approvalborrow_show')
                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <input type="hidden" id="_token"  data-form-field="token"  value="{{ csrf_token() }}">
    </div>
  
</div>@section('custom_bottom_script')
<script type="text/javascript">
    var _token = $('#_token').val();
</script>
<script type="text/javascript" src="{{asset('static/custom/js/script.borrow-approval.js') }}"></script>
<script type="text/template" id="approvalborrow_show">
    @include('underscore.approvalborrow_show')
</script>
@stop


@stop

