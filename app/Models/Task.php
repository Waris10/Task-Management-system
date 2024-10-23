<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    //Makes all fields fillable (so you don't have to always come back to add more fields)
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}