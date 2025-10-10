<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
  

class payment extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'enrollment_id',
        'amount',
        'paid_date',
    ];
    use HasFactory;
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
    

}
