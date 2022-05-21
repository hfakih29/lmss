<?php

// class HomeController extends BaseController {
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CallNumber;
use Exception;

class HomeController extends Controller
{

    public $callNumber_list = array();


    public function __construct() {
        $this->callNumber_list = CallNumber::select()->orderBy('callNumber')->get();
       
    }

	public function home(){	
		return view('panel.index')
            ->with('callNumber_list', $this->callNumber_list);

	}
}
