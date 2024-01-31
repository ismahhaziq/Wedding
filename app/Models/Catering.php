<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catering extends Model
{
    use HasFactory;

    public $table = 'caterings';

    protected $fillable = [
        'id', 'title', 'price', 'user_id', 'description', 'created_at', 'updated_at'
    ];

        public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function date()
    {
        return $this->belongsTo(Date::class, 'date_id');
    }
}
