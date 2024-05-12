<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $table = 'complaint'; 


    public function scopeWithCountOfReports($query)
        {
            return $query->select('landlordPhoneNo')
                ->selectRaw('COUNT(*) as report_count')
                ->groupBy('landlordPhoneNo');
        }

  

}
