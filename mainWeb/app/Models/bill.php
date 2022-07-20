<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    protected $fillable = [

        'bill_no',
        'buyer_no',
        'seller_no',
        'date_published',
        'tax_amount',
    ];
    use HasFactory;
}
