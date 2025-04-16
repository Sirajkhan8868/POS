<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Catagory;
use App\Models\Unit;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_code',
        'catagory_id',
        'barcode_symbology',
        'cost',
        'price',
        'quantity',
        'alert_quantity',
        'tax',
        'tax_type',
        'unit_id',
        'note',
    ];

    public function catagory()
    {
        return $this->belongsTo(Catagory::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
