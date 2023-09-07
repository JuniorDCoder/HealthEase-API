<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'specialty',
        'phone_number',
    ];

    public function hospital(){
       return $this->belongsTo(Hospital::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
