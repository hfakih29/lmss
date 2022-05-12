<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Exception;

class AccountController extends Controller
{
    	### Sign In
	/* After submitting the sign-in form */
	public function postSignIn(Request $request) {
		$validator = $request->validate([
				'username' 	=> 'required',
				'password'	=> 'required'

		]);
		if(!$validator) {
			// Redirect to the sign in page
			return Redirect::route('account-login')
				->withErrors($validator)
				->withInput();   // redirect the input

		} else {

			$remember = ($request->has('remember')) ? true : false;
			$auth = Auth::attempt(array(
				'username' => $request->get('username'),
				'password' => $request->get('password'),
				
			), $remember);
		} 

		if($auth) {
			if(auth()->user()->is_admin == 1){
				return Redirect::intended('home');
			}
			return Redirect::route('account-userlogin');
		} else {
			
			return Redirect::route('account-login')
				->with('global', 'Wrong Username or Password.');
		}

		return Redirect::route('account-login')
			->with('global', 'There is a problem. Have you activated your account?');
	}

	/* Submitting the Create User form (POST) */
	public function postCreate(Request $request) {
		//dd($request->all());
		$validator = $request->validate([

				'username'		=> 'required|max:20|min:3|unique:users',
				'email' 		=> 'required|string|email|max:255|unique:users',
				'password'		=> 'required',
				'password_confirmation'=> 'required|same:password'
		]);

		if(!$validator) {
			return Redirect::route('account-create')
				->withErrors($validator)
				->withInput();   // fills the field with the old inputs what were correct

		} else {
			// create an account
			$firstname	= $request->get('firstname');
			$lastname	= $request->get('lastname');
			$username	= $request->get('username');
			$email		= $request->get('email');
			$password 	= $request->get('password');

			$userdata = User::create([
				'firstname' => $firstname,
				'lastname' 	=> $lastname,
				'username' 	=> $username,
				'email' 	=> $email,
				'password' 	=> Hash::make($password)	// Changed the default column for Password
			]);

			if($userdata) {			


				return Redirect::route('account-sign-in')
					->with('global', 'Your account has been created.');				
			}
		}
	}

	public function getSignIn() {
		return view('account.signin');
	}

	/* Viewing the form (GET) */
	public function getCreate() {
		return view('account.create');
	}
	
	/* Viewing the form (GET) */
	public function getLogin() {
		return view('account.login');
	}
	public function getUserHome() {
		return view('account.UserHome');
	}
	

	### Sign Out
	public function getSignOut() {
		Auth::logout();
		return Redirect::route('account-sign-in');
	}

}
