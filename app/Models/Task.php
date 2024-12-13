<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $Table = 'tasks';
    
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'status',

    ];
}
