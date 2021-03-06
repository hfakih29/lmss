<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use App\Models\Books;
use App\Models\Issue;
use App\Models\Student;
use App\Models\CallNumber;
use App\Models\Requests;
use Illuminate\Http\Request;
use App\Models\BookCallNumbers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use Session;
use Exception;

class BooksController extends Controller
{
    public function __construct(){

		$this->filter_params = array('callNumber');

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$book_list = Books::select('book_id','title','author','ISBN','publisher','year','edition','book_call_Numbers.callNumber')
		->join('book_call_Numbers', 'book_call_Numbers.callNumber', '=', 'books.callNumber')
			->orderBy('book_id')->get();
		// dd($book_list);
		// $this->filterQuery($book_list);

		// $book_list = $book_list->get();

		for($i=0; $i<count($book_list); $i++){

	        $id = $book_list[$i]['book_id'];
	        $conditions = array(
	        	'book_id'			=> $id,
	        	'available_status'	=> 1
        	);

	        $book_list[$i]['total_books'] = Issue::select()
	        	->where('book_id','=',$id)
	        	->count();

	        $book_list[$i]['avaliable'] = Issue::select()
	        	->where($conditions)
	        	->count();
		}

        return $book_list;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$books = $request->all();

		// DB::transaction( function() use($books) {
//			 dd($books['number']);
			$db_flag = false;
			$user_id = Auth::id();
			$book_title = Books::create([
				'title'			=> $books['title'],
				'author'		=> $books['author'],
				'ISBN'			=> $books['ISBN'],
				'publisher'		=> $books['publisher'],
				'year'			=> $books['year'],
				'edition'		=> $books['edition'],
				'callNumber'	=> $books['callNumber'],
                

				'added_by'		=> $user_id
			]);
			// dd($book_title);

			$newId = $book_title->book_id;
			$newCallNumber = $book_title->callNumber;
			$newtitle = $book_title->title;
			// dd($newId);
			if(!$book_title){
				$db_flag = true;
			} else {
				$number_of_issues = $books['number'];

				for($i=0; $i<$number_of_issues; $i++){

					$issues = Issue::create([
						'issue_id'		=> rand(1234567890,12),
						'title'			=> $newtitle,
						'book_id'		=> $newId,
						'callNumber'	=> $newCallNumber,
						'added_by'		=> $user_id
					]);

					if(!$issues){
						$db_flag = true;
					}
				}
			}

			if($db_flag)
				return'Invalid update data provided';

		// });

		return "Books Added successfully to Database";

	}


	public function BookCallNumberStore(Request $request)
	{
		$bookcallnumber = BookCallNumbers::create($request->all());

		if (!$bookcallnumber) {

			return 'Book Call Number fail to save!';
		}else {

			return "Book Call Number Added successfully to Database";
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($string)
	{
		$book_list = Books::select('book_id','title','author','ISBN','publisher','year','edition','book_call_Numbers.callNumber')
		->join('book_call_Numbers', 'book_call_Numbers.callNumber', '=', 'books.callNumber')
			->where('title', 'like', '%' . $string . '%')
			->orWhere('author', 'like', '%' . $string . '%')
			->orWhere('year', 'like', '%' . $string . '%')
			->orderBy('book_id');

		$book_list = $book_list->get();

		foreach($book_list as $book){
			$conditions = array(
				'book_id'			=> $book->book_id,
				'available_status'	=> 1
			);

			$count = Issue::where($conditions)
				->count();

			$book->avaliability = ($count > 0) ? true : false;
		}

        return $book_list;
	}
	public function usersearch(Request $request)
	{  
		$string=$request->get('string');
		$book_list = Books::select('book_id','title','author','ISBN','publisher','year','edition','book_call_Numbers.callNumber')
		->join('book_call_Numbers', 'book_call_Numbers.callNumber', '=', 'books.callNumber')
			->where('title', 'like', '%' . $string . '%')
			->orWhere('author', 'like', '%' . $string . '%')
			->orWhere('year', 'like', '%' . $string . '%')
			->orderBy('book_id');

		$book_list = $book_list->get();

		foreach($book_list as $book){
			$conditions = array(
				'book_id'			=> $book->book_id,
				'available_status'	=> 1
			);

			$count = Issue::where($conditions)
				->count();

			$book->avaliability = ($count > 0) ? true : false;
		}

        return $book_list;
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$issue = Issue::find($id);
		if($issue == NULL){
			return 'Invalid Book ID';
		}

		$book = Books::find($issue->book_id);

		$issue->book_name = $book->title;
		$issue->author = $book->author;

		$issue->callNumber = CallNumber::find($book->callNumber)
			->callNumber;

		$issue->available_status = (bool)$issue->available_status;
		if($issue->available_status == 1){
			return $issue;
		}

		$conditions = array(
			'return_time'	=> 0,
			'book_issue_id'	=> $id,
		);
		$book_issue_log = Logs::where($conditions)
			->take(1)
			->get();

		foreach($book_issue_log as $log){
			$student_id = $log->student_id;
		}

		$student_data = Student::find($student_id);

		unset($student_data->email_id);
		unset($student_data->books_issued);
		unset($student_data->approved);
		unset($student_data->rejected);





        return $issue;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$Books = Books::find($id);
		$Books->delete();
		return response()->json([
		  'message' => 'Data deleted successfully!'
		]);
	}
	public function copyDelete($id)
	{
		DB::table('book_issues')->where('issue_id', $id)->delete();
		return response()->json([
		  'message' => 'Data deleted successfully!'
		]);
	}

	public function renderAddBookCallNumber(Type $var = null)
	{
        return view('panel.addbookcategory');
	}


    public function renderAddBooks() {
        $db_control = new HomeController();

        return view('panel.addbook')
            ->with('callNumber_list', $db_control->callNumber_list);
    }

    public function renderAllBooks() {
		$db_control = new HomeController();
		
		return view('panel.allbook')->with('callNumber_list', $db_control->callNumber_list);

	}
	public function renderAllBookCopies() {
		$db_control = new HomeController();


		$copies =  Issue::get();
		return view('panel.allbookcopies',compact('copies'))->with('callNumber_list', $db_control->callNumber_list);

	}

	public function renderApprovalBorrows(){
		$db_control = new HomeController;
		$requests =  Requests::get();
		return view('panel.borrowapproval',compact('requests'));

	}

	public function BookByCallNumber($callNumber)
	{
		$book_list = Books::select('book_id','title','author','ISBN','publisher','year','edition','book_call_Numbers.callNumber')
		->join('book_call_Numbers', 'book_call_Numbers.callNumber', '=', 'books.callNumber')
			->where('books.callNumber', $callNumber)->orderBy('book_id');

			$book_list = $book_list->get();

			for($i=0; $i<count($book_list); $i++){

				$id = $book_list[$i]['book_id'];
				$conditions = array(
					'book_id'			=> $id,
					'available_status'	=> 1
				);

				$book_list[$i]['total_books'] = Issue::select()
					->where('book_id','=',$id)
					->count();

				$book_list[$i]['available'] = Issue::select()
					->where($conditions)
					->count();
			}

			return $book_list;
	}

    public function searchBook(){
    	$db_control = new HomeController();

		return view('public.book-search')
			->with('callNumber_list', $db_control->callNumber_list);
    }
	public function upload(Request $request){
		$books = Books::all();
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            $books['image']=$filename;
        }

        return redirect()->back();
    }

}

