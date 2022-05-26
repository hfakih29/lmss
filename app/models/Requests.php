<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $fillable = array('firstname','lastname','email','issue_id','book_id','title','callNumber','approved','rejected');

  

	protected $table = 'borrow_request';
	protected $primaryKey = 'request_id';

	protected $hidden = array();

}
