<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'syllabus', 'duration'];

    /**
     * Many-to-many relationship with batches
     * A course can belong to multiple batches
     */
    public function batches()
    {
        return $this->belongsToMany(Batch::class, 'batch_course');
    }
}
