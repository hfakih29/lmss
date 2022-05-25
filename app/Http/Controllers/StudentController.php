<?php

namespace App\Http\Controllers;

use App\Mail\StudentRegisterConfirmation;
use Mail;
use App\User;
use Exception;
use App\Models\Logs;
use App\Models\Books;
use App\Models\Issue;
use App\Models\Branch;
use App\Models\Student;
use App\Models\CreditCard;
use Illuminate\Http\Request;
use App\Models\StudentCategories;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __construct(){



	}

	public function index()
	{
		$conditions = array(
			'approved'	=> 0,
			'rejected'	=> 0
		);

		$member = Student::select('member_id', 'firstname', 'lastname')
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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$student = Student::find($id);
		if($student == NULL){
			throw new Exception('Invalid Student ID');
		}




		if($student->rejected == 1){
			unset($student->approved);
			unset($student->books_issued);
			$student->rejected = (bool)$student->rejected;

			return $student;
		}

		if($student->approved == 0){
			unset($student->rejected);
			unset($student->books_issued);
			$student->approved = (bool)$student->approved;

			return $student;
		}

		unset($student->rejected);
		unset($student->approved);

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


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id){
        $flag = (bool)$request->get('flag');

        $student = Student::findOrFail($id);

		if($flag){
			// if student is approved
	        $student->approved = 1;
		} else {
			// if student is rejected for some reason
			$student->rejected = 1;
		}

        $student->save();

        return "Student's approval/rejection status successfully changed.";
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */



	public function renderStudents(){
        $users =  User::where('verification_status','=',1)->get();

        return view('panel.approval',compact('users'));

	}

	public function renderApprovalStudents(){
		$users =  User::where('verification_status','=',0)->get();

		return view('panel.approval',compact('users'));

	}

	public function getRegistration(){
		$db_control = new HomeController;
		return view('public.registration');

	}

	public function postRegistration(Request $request){

		$validator = $request->validate([

				'name'			=> 'required',
				'cardnumber'	=> 'required',
				'expirationdate'=> 'required',
				'securitycode'	=> 'required',


		]);

		if(!$validator) {
			return Redirect::route('member-registration')
				->withErrors($validator)
				->withInput();   // fills the field with the old inputs what were correct

		} else {
			$CreditCard = CreditCard::create(array(
				'Name'			=> $request->get('name'),
				'CardNumber'	=> $request->get('cardnumber'),
				'expirationdate'=> $request->get('expirationdate'),
				'CVV'			=> $request->get('securitycode'),

			));

			if($CreditCard){
				$Student = Student::create(array(
					'firstname'			=> auth()->user()->firstname,
					'lastname'			=> auth()->user()->lastname,
					'email'				=> auth()->user()->email,
					'has_credit_card'	=> '1',

				));
				return Redirect::route('member-registration')
					->with('global', 'Your credit card info was added, you will be soon approved!');
			}
		}
	}

	public function userStatus($id,$status){

        $user = User::find($id);
        $user->verification_status = $status;
        if($status==1){
            $msg = "Your Registration is Confirm by Admin";
                }
        else{
            $msg = "Your Registration is Reject by Admin";
        }
        if($user->update()) {
            $dataa = array(
                'fname' => $user->firstname,
                'lname' => $user->lastname,
                'msg' => $msg,
            );

//            Mail::to($user->email)->send(new  StudentRegisterConfirmation($dataa));
        }

        return redirect()->back()->withErrors(['massage' => $msg]);



    }
    public function bookStatus($id,$status){

        $user = Books::find($id);
        $user->status = $status;
        if($status==1){
            $msg = "Your Book is Confirm by Admin";
        }
        else{
            $msg = "Your Book is Reject by Admin";
        }
        $user->update();


//            Mail::to($user->email)->send(new  StudentRegisterConfirmation($dataa));


        return redirect()->back()->withErrors(['massage' => $msg]);



    }
}
