<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'property'; 

    protected $primaryKey = 'propertyID';

    protected $fillable = [
        'propertyName',
        'propertyType',
        'propertyAddress',
        'city',
        'poscode',
        'state',
        'noPeople',
        'gender',
        'race',
        'bedroom',
        'bathroom',
        'propertyFurnish',
        'propertyImage',
        'propertyRentPrice', 
        'propertyDesc',
        'ownerPhoneNo',
    ];

 
    public function complaints()
    {
        return $this->hasMany(Complaint::class, 'ownerPhoneNo', 'landlordPhoneNo');
    }
}


