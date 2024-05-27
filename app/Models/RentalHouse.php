<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalHouse extends Model
{
    use HasFactory;

    protected $table = 'rental_house'; 

    protected $fillable = [
        'sem',
        'session',
        'accoType',
        'accoAddress',
        'accoCity',
        'accoPoscode',
        'accoState',
        'emergencyContactNo',
        'userID',
    ];

    // Define the relationship where a RentalHouse belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class, 'userID'); // Specify the foreign key if it's different from user_id
    }
}
