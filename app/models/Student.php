<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = array('firstname','lastname','email','approved','has_credit_card');

    public $timestamps = false;

	protected $table = 'students';
	protected $primaryKey = 'member_id';

	protected $hidden = array();

}
