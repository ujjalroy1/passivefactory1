<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignedCaptcha extends Model
{
    use HasFactory;
  
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship with the BoughtPackage model
    public function boughtPackage()
    {
        return $this->belongsTo(BoughtPackage::class, 'bought_package_id');
    }



}
