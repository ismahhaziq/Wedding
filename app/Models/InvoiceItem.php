<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    public $table = 'invoice_items';

    protected $fillable = [
        'id',
        'title',
        'price',
        'invoice_id',
        'total_guests',
        'total_amount',
        'selected_package_id',
        'created_at',
        'updated_at',
    ];
}


   