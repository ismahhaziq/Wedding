<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public $table = 'services';

        protected $fillable = [
        'id', 'title', 'price', 'status', 'image', 'user_id'. 'created_at', 'updated_at'
    ];
}
