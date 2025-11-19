<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Squad extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
    ];

    public function users()
    {
        $this->hasMany(Student::class);
    }
}
