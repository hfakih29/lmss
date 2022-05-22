<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallNumber extends Model
{
    protected $fillable = array('callNumber');

    public $timestamps = false;

	protected $table = 'book_call_Numbers';
	protected $primaryKey = 'id';

	protected $hidden = array();
}
