<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    // Specify which fields are mass assignable
    protected $fillable = [
        'title',
        'description',
        'completed',
    ];
}
