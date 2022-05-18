<?php

// class HomeController extends BaseController {
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentCategories;

use App\Models\Branch;

use App\Models\Categories;
use Exception;

class HomeController extends Controller
{

    public $callNumber_list = array();
    public $branch_list = array();
    public $student_categories_list = array();

    public function __construct() {
        $this->callNumber_list = Categories::select()->orderBy('callNumber')->get();
        $this->branch_list = Branch::select()->orderBy('id')->get();
        $this->student_categories_list = StudentCategories::select()->orderBy('cat_id')->get();
    }

	public function home(){	
		return view('panel.index')
            ->with('callNumber_list', $this->callNumber_list)
            ->with('branch_list', $this->branch_list)
            ->with('student_categories_list', $this->student_categories_list);
	}
}
