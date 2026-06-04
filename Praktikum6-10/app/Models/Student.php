<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nim',
        'name',
        'address',
        'major_id'
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}