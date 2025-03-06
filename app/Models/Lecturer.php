<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lecturer extends Model
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
}
