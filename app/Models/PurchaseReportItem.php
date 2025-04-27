<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseReportItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_report_id',
        'date',
        'reference',
        'supplier_id',
        'status',
        'total',
        'paid',
        'due',
        'payment_status',
    ];

    public function purchaseReport()
    {
        return $this->belongsTo(PurchaseReport::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
