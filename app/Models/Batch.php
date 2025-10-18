<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $table = 'batches';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'start_date'];

    /**
     * Many-to-many relationship with courses
     * A batch can have multiple courses
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'batch_course');
    }
}
