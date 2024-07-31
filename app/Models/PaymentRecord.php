<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'full_name', 'email', 'telephone_number',
        'card_type', 'card_number', 'security_code', 'amount_payable','product_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
