<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCallNumbers extends Model
{
    protected $fillable = ['callNumber'];
    protected $table = 'book_call_numbers';
    
}
