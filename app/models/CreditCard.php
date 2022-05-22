<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $fillable = array('id', 'Name','CardNumber','expirationdate','CVV');
    public $timestamps = false;

	protected $table = 'credit_cards';
}
