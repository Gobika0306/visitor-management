<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile_no',
        'visitee',
        'date of visit',
        'purpose of visit',
        'checkin_time',
        'checkout_time',

    ];
}
