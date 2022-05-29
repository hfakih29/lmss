@extends('layout.index')

@section('custom_top_script')
@stop

@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>Add Books</h3>
        </div>
        <div class="module-body">
            <form class="form-horizontal row-fluid" >
                @csrf
                <div class="control-group">
                    <label class="control-label">Title Of Book</label>
                    <div class="controls">
                        <input type="text" id="title" data-form-field="title" placeholder="Enter the title of the book here..." class="span8">
                        <input type="hidden"  data-form-field="token"  value="{{ csrf_token() }}">
                        <input type="hidden"  data-form-field="auth_user"  value="{{ auth()->user()->id }}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Author Name</label>
                    <div class="controls">
                        <input type="text" id="author" data-form-field="author" placeholder="Enter the name of author for the book here..." class="span8">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">ISBN</label>
                    <div class="controls">
                        <input type="text" id="ISBN" data-form-field="ISBN" placeholder="Enter the book ISBN here..." class="span8">
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Publisher</label>
                    <div class="controls">
                        <input type="text" id="publisher" data-form-field="publisher" placeholder="Enter the book Publisher here..." class="span8">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Year</label>
                    <div class="controls">
                        <input type="number" id="year" data-form-field="year" placeholder="Enter the book Year here..." class="span8">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Edition</label>
                    <div class="controls">
                        <input type="text" id="edition" data-form-field="edition" placeholder="Enter the book Edition here..." class="span8">
                    </div>
                </div>

                
                <div class="control-group">
                    <label class="control-label" for="basicinput">Call Number</label>
                    <div class="controls">
                        <select tabindex="1" id="callNumber" data-form-field="callNumber" data-placeholder="Select Call Number.." class="span8">
                            @foreach($callNumber_list as $callNumber)
                                <option value="{{ $callNumber->callNumber }}">{{ $callNumber->callNumber }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Number of issues</label>
                    <div class="controls">
                        <input type="number" id="number" data-form-field="number" placeholder="How many issues are there?" class="span8">
                    </div>
                </div>
                
               
                <div class="control-group">
                    <div class="controls">
                        <button type="button" class="btn btn-inverse" id="addbooks">Add Books</button>
                        
                    </div>
                </div>
                
            </form>
        </div>
    </div>    
</div>
@stop
@section('custom_bottom_script')

    <script type="text/javascript" src="{{ asset('static/custom/js/script.addbook.js') }}"></script>

@stop