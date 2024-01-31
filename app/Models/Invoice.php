<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

        public $table = 'invoices';

        protected $fillable = [
        'id', 'user_id', 'created_at', 'updated_at', 'status', 'date_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function services() {
        return $this->belongsToMany(Service::class);
    }

    public function caterings() {
        return $this->belongsToMany(Catering::class);
    }

        public function date()
    {
        return $this->belongsToMany(Date::class);
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
