<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, softDeletes;

    protected $dates = ['deleted_at'];
    public function patient(){
       return $this->belongsTo(Patient::class);
    }

    public function hospital(){
       return $this->belongsTo(Hospital::class);
    }
}
