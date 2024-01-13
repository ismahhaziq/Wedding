<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Checklist extends Model
{
    public $table = 'checklists';

    protected $fillable = [
        'id', 'title', 'content_type', 'content', 'user_id', 'created_at', 'updated_at'
    ];

        public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
