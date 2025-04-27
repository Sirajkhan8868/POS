<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'customer_id',
        'status',
        'payment_status'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function items()
    {
        return $this->hasMany(SaleReportItem::class);
    }
}
