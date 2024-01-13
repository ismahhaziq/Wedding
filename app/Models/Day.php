<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public $table = 'days';
    
    protected $fillable = [
        'id', 'day_name', 'created_at', 'updated_at'
    ];
}
