<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    public $table = 'dates';

    protected $fillable = [
        'id', 'date', 'user_id', 'created_at', 'updated_at', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class);
    }
}
