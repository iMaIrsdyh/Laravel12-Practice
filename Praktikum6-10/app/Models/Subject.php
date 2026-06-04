<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'sks'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}