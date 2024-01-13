<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catering extends Model
{
    use HasFactory;

    public $table = 'caterings';

    protected $fillable = [
        'id', 'title', 'price', 'description', 'created_at', 'updated_at'
    ];
}
