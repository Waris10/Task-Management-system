<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    //Makes all fields fillable
    protected $guarded = [];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
