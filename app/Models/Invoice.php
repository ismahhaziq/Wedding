<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

        public $table = 'invoices';

        protected $fillable = [
        'id', 'service_id', 'catering_id', 'created_at', 'updated_at'
    ];

    // Invoice.php

public function services() {
    return $this->belongsToMany(Service::class);
}

public function caterings() {
    return $this->belongsToMany(Catering::class);
}

}
