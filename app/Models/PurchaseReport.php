<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'supplier_id',
        'status',
        'payment_status',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function items()
    {
        return $this->hasMany(PurchaseReportItem::class);
    }
}
