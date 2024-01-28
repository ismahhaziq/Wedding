<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakeUp extends Model
{
    use HasFactory;

    public $table = 'makeups';

    protected $fillable = [
        'title', 'description', 'price', 'user_id', 'image', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
