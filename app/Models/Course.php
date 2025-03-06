<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Course extends Model
{
    protected $guarded = ['*'];
    protected $keyType = 'string'; // UUIDs are stored as strings
    public $incrementing = false;  // Disable auto-incrementing
    protected $primaryKey = 'id';  // Define primary key as 'id'

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid(); // Automatically generate UUID
        });
    }

    protected $casts = [
        'prerequisite_courses' => 'array', // Automatically converts JSON to array
    ];

    public function dependentCourses(): BelongsToMany
    {
        return $this->belongsToMany(
            Course::class,
            'course_prerequisites',
            'prerequisite_id',
            'course_id'
        );
    }

    // Prerequisite courses that this course depends on
    public function prerequisiteCourses(): BelongsToMany
    {
        return $this->belongsToMany(
            Course::class,
            'course_prerequisites',
            'course_id',
            'prerequisite_id'
        );
    }
}
