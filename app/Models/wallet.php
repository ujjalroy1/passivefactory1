<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(user::class,'account_id','account_id');
    }
}
