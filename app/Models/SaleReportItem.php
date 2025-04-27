<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleReportItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_report_id',
        'date',
        'reference',
        'sale_id',
        'status',
        'total',
        'paid',
        'due',
        'payment_status'
    ];


    public function saleReport()
    {
        return $this->belongsTo(SaleReport::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
