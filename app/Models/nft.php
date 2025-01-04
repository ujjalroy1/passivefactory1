<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nft extends Model
{
    use HasFactory;

    public function suggestion()
    {
        return $this->hasOne(suggestion::class,'nft_id','id');
    }
}
