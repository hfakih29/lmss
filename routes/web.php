<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsFormController;

Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

Route::get('/', function () {
    return view('welcome');
});

// Unauthenticated group
Route::group(array('before' => 'guest'), function() {

	// CSRF protection
	Route::group(array('before' => 'csrf'), function() {

		// Create an account (POST)
		Route::post('/create', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));

		// Sign in (POST)
		Route::post('/sign-in', array(
			'as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'
		));


		// Sign in (POST)
		Route::post('/member-registration', array(
			'as' => 'member-registration-post',
			'uses' => 'StudentController@postRegistration'
		));



			Route::get('/pic', array(
		'as' 	=> 'account-pic-upload',
		'uses'	=> 'AccountController@upload'
	));

	});

	// Sign in (GET)
	Route::get('/', array(
		'as' 	=> 'account-sign-in',
		'uses'	=> 'AccountController@getSignIn'
	));

	// Create an account (GET)
	Route::get('/create', array(
		'as' 	=> 'account-create',
		'uses' 	=> 'AccountController@getCreate'
	));
	// Create an account (GET)
	Route::get('/login', array(
		'as' 	=> 'account-login',
		'uses' 	=> 'AccountController@getLogin'
	));
	Route::get('/profile', array(
		'as' 	=> 'account-profile',
		'uses' 	=> 'AccountController@getProfile'
	));
	Route::get('/Userprofile', array(
		'as' 	=> 'account-Userprofile',
		'uses' 	=> 'AccountController@getUserProfile'
	));

	// Student Registeration form
	Route::get('/member-registration', array(
		'as' 	=> 'member-registration',
		'uses' 	=> 'StudentController@getRegistration'
	));
	Route::post('/borrow-request', array(
		'as' => 'borrow-request-post',
		'uses' => 'BorrowController@borrowRequest'
	));
    // Render search books panel
    Route::get('/book', array(
        'as' => 'search-book',
        'uses' => 'BooksController@searchBook'
    ));

});

// Main books Controlller left public so that it could be used without logging in too
Route::resource('/books', 'BooksController');



// Authenticated group
// Route::group(array('before' => 'auth'), function() {
Route::group(['middleware' => ['auth']] , function() {

	// Home Page of Control Panel
	Route::get('/home',array(
		'as' 	=> 'home',
		'uses'	=> 'HomeController@home'
	));
	Route::post('/pic', array(
		'as' 	=> 'account-pic-upload',
		'uses'	=> 'AccountController@upload'
	));



	// Render Add Books panel
    Route::get('/add-books', array(
        'as' => 'add-books',
        'uses' => 'BooksController@renderAddBooks'
	));
	// Home Page of User
	Route::get('/Userhome', array(
		'as' 	=> 'account-userlogin',
		'uses' 	=> 'AccountController@getUserHome'
	));
	Route::get('/add-book-callNumber', array(
        'as' => 'add-book-callNumber',
        'uses' => 'BooksController@renderAddBookCallNumber'
	));

	Route::post('/bookcallnumber', 'BooksController@BookCallNumberStore')->name('bookcallnumber.store');


	// Render All Books panel
    Route::get('/all-books', array(
        'as' => 'all-books',
        'uses' => 'BooksController@renderAllBooks'
	));
	Route::get('/all-book-copies', array(
        'as' => 'all-book-copies',
        'uses' => 'BooksController@renderAllBookCopies'
	));

	Route::get('/bookBycallnumber/{callNumber}', array(
        'as' => 'bookBycallnumber',
        'uses' => 'BooksController@BookByCallNumber'
    ));

	// Students
    Route::get('/registered-students', array(
        'as' => 'registered-students',
        'uses' => 'StudentController@renderStudents'
    ));

    // Render students approval panel
    Route::get('/students-for-approval', array(
        'as' => 'students-for-approval',
        'uses' => 'StudentController@renderApprovalStudents'
	));
    Route::get('/admin/user/status/{id}', array(
        'as' => 'user.status',
        'uses' => 'StudentController@userStatus'
    ));
	Route::get('/borrow/approved/{id}', array(
        'as' => 'borrow.approved',
        'uses' => 'BorrowController@borrowapproved'
    ));
	Route::get('/borrow/rejected/{id}', array(
        'as' => 'borrow.rejected',
        'uses' => 'BorrowController@borrowrejected'
    ));
	Route::get('/borrowrequest/{id}', array(
        'as' => 'borrow.request',
        'uses' => 'BorrowController@borrowRequest'
    ));
	Route::get('/bookcopydelete/{id}', array(
        'as' => 'copy.delete',
        'uses' => 'BooksController@copyDelete'
    ));
	Route::get('/borrow-for-approval', array(
        'as' => 'borrow-for-approval',
        'uses' => 'BooksController@renderApprovalBorrows'
	));



    // Main students Controlller resource
	Route::resource('/member', 'StudentController');

	  // Main Book issues Controlller resource
	  Route::resource('/borrow', 'BorrowController');



    // Issue Logs
    Route::get('/issue-return', array(
        'as' => 'issue-return',
        'uses' => 'LogController@renderIssueReturn'
    ));

    // Render logs panel
    Route::get('/currently-issued', array(
        'as' => 'currently-issued',
        'uses' => 'LogController@renderLogs'
    ));


    // Main Logs Controlller resource
    Route::resource('/issue-log', 'LogController');

	// Sign out (GET)
    Route::get('/sign-out', array(
    	'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'
    ));



});
