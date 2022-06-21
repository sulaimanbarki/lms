<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // one subject belongs to one department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
