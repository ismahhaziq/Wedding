<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakeUp extends Model
{
    use HasFactory;

    public $table = 'makeups';

    protected $fillable = [
        'title', 'description', 'price', 'image'
    ];
}
