<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mr_number',
        'phone_number',
    ];

    public static function GenerateMRNumber()
    {
        $year = date('y');
        $random = strtoupper(Str::random(4));

        $existing_mr_numbers = Patient::pluck('mr_number')->toArray();

        do {
            $mr_number = 'HE' . $year . $random;
        } while (in_array($mr_number, $existing_mr_numbers));

        return $mr_number;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
