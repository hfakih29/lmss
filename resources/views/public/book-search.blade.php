@extends('account.index')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">



	<div class="container">
		<br/>
		<div class="row justify-content-center">
			<div class="module span9">
				
				<div class="module-body">
					<form class="form-horizontal row-fluid">
						<div class="control-group">
							<label class="control-label">Name or author<br>of the book</label>
							<div class="controls">
								<textarea class="span14" rows="1"></textarea>
							</div>
						</div>

						<div class="control-group">
							<div class="controls" id="search_book_button">
								<a class="btn btn-default">Search Book</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="row" style="display: none;">
			<div class="module span12">
				<div class="module-body">
		            <table class="table table-striped table-bordered table-condensed">
		                <thead>
		                    <tr>
						<th>Book ID</th>
                        <th>Book Title</th>
						<th>ISBN</th>
                        <th>Author</th>                       
                        <th>Publisher</th>
						<th>Edition</th>
                        <th>Year</th>
                        <th>call number</th>
                        <th>Available</th>
		                    </tr>
		                </thead>
		                <tbody id="book-results"></tbody>
		            </table>
				</div>
			</div>
		</div>

	





@section('custom_bottom_script')
<script type="text/javascript">
    var callNumber_list = $('#callNumber_list').val();
</script>
<script type="text/javascript" src="{{  asset('static/custom/js/script.searchbook.js') }}"></script>

<script type="text/template" id="search_book">
    @include('underscore.search_book')
</script>
@stop
