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
                        <th>Roll Number</th>
                        <th>Branch</th>
                        <th>Category</th>
                        <th>Email ID</th>
                        <th>Books Issued</th>
                    </tr>
                </thead>
                <tbody id="students-table">
                    <tr class="text-center">
                        <td colspan="99">Loading...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <input type="hidden" name="" id="branches_list" value="{{ json_encode($branch_list) }}">
    <input type="hidden" name="" id="student_categories_list" value="{{ json_encode($student_categories_list) }}">
    <input type="hidden" id="_token"  data-form-field="token"  value="{{ csrf_token() }}">

</div>
@stop

@section('custom_bottom_script')
<script type="text/javascript">
     var branches_list = $('#branches_list').val(),
        categories_list = $('#student_categories_list').val(),
        _token = $('#_token').val();
</script>
<script type="text/javascript" src="{{ asset('static/custom/js/script.students.js') }}"></script>
<script type="text/template" id="allstudents_show">
    @include('underscore.allstudents_show')
</script>
@stop