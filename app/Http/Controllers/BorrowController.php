<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Logs;
use App\Models\Books;
use App\Models\Issue;
use App\Models\Student;
use App\Models\BookIssue;
use App\Models\CreditCard;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

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

		$BookIssue = BookIssue::select('issue_id', 'firstname', 'lastname','title','ISBN','callNumber')
            
			->where($conditions)
			->orderBy('member_id');

		// $this->filterQuery($member);
		$member = $member->get();
		// dd($member);
        return $member;
	}



	public function create()
	{
		$conditions = array(
			'approved'	=> 1,
			'rejected'	=> 0
		);

		$member = Student::select('member_id', 'firstname', 'lastname','email','books_issued')
			->where($conditions)
			->orderBy('member_id');

		// $this->filterQuery($member);
		$member = $member->get();
		// dd($member);
        return $member;
	}

    public function borrowRequest(Request $request){

		$validator = $request->validate([

				'bookID'		=> 'required',
				'title'	        => 'required',
				'author'        => 'required',
                'ISBN'          => 'required',
				


		]);

		if(!$validator) {
			return Redirect::route('account-userlogin')
				->withErrors($validator)
				->withInput();   // fills the field with the old inputs what were correct

		} else {
			$CreditCard = CreditCard::create(array(
				'book_id'		=> $request->get('bookID'),
				'book title'	=> $request->get('title'),
				'book author'=> $request->get('author'),
				'ISBN'			=> $request->get('ISBN'),
				
			));

				return Redirect::route('account-userlogin')
					->with('global', 'Your credit card info was added, you will be soon approved!');
			}
		}
	}


