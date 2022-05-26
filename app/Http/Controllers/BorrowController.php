<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Logs;
use App\Models\Books;
use App\Models\Issue;
use App\Models\Student;
use App\Models\BookIssue;
use App\Models\Requests;
use App\Models\CreditCard;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use DB;

class BorrowController extends Controller
{
    public function __construct(){

		

	}

	public function index()
	{
		$conditions = array(
			'approved'	=> 0,
			'rejected'	=> 0
		);

		$requests = Requests::select('request_id','issue_id', 'firstname', 'lastname','email','title','callNumber')
            
			->where($conditions)
			->orderBy('request_id');

		// $this->filterQuery($member);
		$requests = $requests->get();
        return $requests;
	}



	public function create()
	{
		$conditions = array(
			'approved'	=> 1,
			'rejected'	=> 0
		);

		$requests = Requests::select('request_id','issue_id', 'firstname', 'lastname','title','callNumber')
			->where($conditions)
			->orderBy('request_id');

		$requests = $requests->get();
        return $requests;
	}

    public function borrowRequest($id){
		$useremail=Student::where('email', '=',auth()->user()->email)->first();
		if($useremail==null ){
			return  Redirect()->back()
					->with('global', 'You are not registered as a member yet!');}
		if($useremail->approved ==1 ){
			$book=Books::find($id);
			$bookcopy = Issue::where('book_id',$id)->where('available_status', '!=', 0)->first();
			
				$Requests = Requests::create(array(
					'firstname'		=> auth()->user()->firstname,
					'lastname'		=> auth()->user()->lastname,
					'email'			=> auth()->user()->email,
					'issue_id'		=> $bookcopy['issue_id'],		
					'book_id'		=> $book['book_id'],
					'title'			=> $book['title'],
					'callNumber'	=> $book['callNumber'],
					
				));
	
					return Redirect()->back()
						->with('global', 'Your book request was sent, you will be soon approved!');
		}


					return  Redirect()->back()
					->with('global', 'You are not accepted as a member yet!');
			}
	
	
	
	public function show($id){
		$requests = Requests::find($id);
		if($requests == NULL){
			throw new Exception('Invalid requests ID');
		}




		if($requests->rejected == 1){
			unset($requests->approved);
			$requests->rejected = (bool)$requests->rejected;

			return $requests;
		}

		if($requests->approved == 0){
			unset($requests->rejected);
			$requests->approved = (bool)$requests->approved;

			return $requests;
		}

		unset($requests->rejected);
		unset($requests->approved);

		$student_issued_books = Logs::select('book_issue_id', 'issued_at')
			->where('student_id', '=', $id)
			->orderBy('created_at', 'desc')
			->take($student->books_issued)
			->get();

		foreach($student_issued_books as $issued_book){
			$issue = Issue::find($issued_book->book_issue_id);
			$book = Books::find($issue->book_id);
			$issued_book->name = $book->title;

			$issued_book->issued_at = date('d-M', strtotime( $issued_book->issued_at));
		}

		$student->issued_books = $student_issued_books;

		return $student;
	}
	public function borrowapproved(Request $request, $id){
		$Requests = Requests::find($id);
		$useremail=Student::where('email', '=',$Requests->email)->first();

		$Logs = Logs::create(array(
			'book_issue_id'		=> $Requests['issue_id'],
			'student_id'		=> $useremail['member_id'],
			'issue_by'			=> auth()->user()->id,
			'issued_at'			=> date('Y-m-d H:i'),		
			'return_time'		=> 0,
			
			
		));


			$book = Issue::where('issue_id', $Requests['issue_id'])->where('available_status', '!=', 0)->first();
			// changing the availability status
			$book_issue_update = Issue::where('issue_id', $Requests['issue_id'])->where('issue_id', $book->issue_id)->first();
			$book_issue_update->available_status = 0;
			$book_issue_update->save();

			// increasing number of books issed by student
			$student = Student::find($useremail['member_id']);
			$student->books_issued = $student->books_issued + 1;
			$student->save();
		
	        $Requests->approved = 1;

			$Requests->save();
		return Redirect()->back()->with('global', 'Book Issued Successfully!');

    
	}
	public function borrowrejected(Request $request, $id){

        $Requests = Requests::find($id);
			$Requests->rejected = 1;
		
			$Requests->save();

        return Redirect()->back()->with('global', 'Book request rejected!');
	}
		}
	


