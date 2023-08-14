<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'email', 'currency', 'amount', 'plan_id', 'gateway', 'status', 'payment_gateway',
        'expiry_date', 'response'
    ];

    public function latest($column = 'created_at')
    {
        return $this->orderBy($column, 'desc');
    } 

}
