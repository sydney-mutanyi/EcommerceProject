<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $table='transactions';

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
