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
		Route::post('/student-registration', array(
			'as' => 'student-registration-post',
			'uses' => 'StudentController@postRegistration'
		));		
		
			Route::get('/pic', array(
		'as' 	=> 'account-pic-upload',
		'uses'	=> 'AccountController@upload'
	));
		Route::post('/bookpic', array(
			'as' 	=> 'account-bookpic-upload',
			'uses'	=> 'BooksController@upload'
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
	Route::get('/student-registration', array(
		'as' 	=> 'student-registration',
		'uses' 	=> 'StudentController@getRegistration'
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

	Route::prefix('admin')->group(function(){
 
		Route::get('/add-Book', [BooksController::class, 'addcategory'])->name('add.category');
		Route::get('/list-category', [BooksController::class, 'listcategory'])->name('list.category');
		Route::post('/store-Book', [BooksController::class, 'storeBook'])->name('store.book');
		 
		});

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
	
	  // Render students approval panel
	  Route::get('/settings', array(
        'as' => 'settings',
        'uses' => 'StudentController@Setting'
	));
	
	  // Render students approval panel
	  Route::post('/setting', array(
        'as' => 'settings.store',
        'uses' => 'StudentController@StoreSetting'
    ));

    // Main students Controlller resource
	Route::resource('/student', 'StudentController');
	
	Route::post('/studentByattribute', array(
        'as' => 'studentByattribute',
        'uses' => 'StudentController@StudentByAttribute'
    ));

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