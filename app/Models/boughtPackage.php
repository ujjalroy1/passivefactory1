<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boughtPackage extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }
    public function assignedCaptcha()
    {
        return $this->hasOne(AssignedCaptcha::class, 'bought_package_id');
    }
}
