<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfitLoss extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'sale_return_id',
        'purchase_id',
        'purchase_return_id',
        'start_date',
        'end_date',
    ];


    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }


    public function saleReturn()
    {
        return $this->belongsTo(SaleReturn::class);
    }


    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function purchaseReturn()
    {
        return $this->belongsTo(PurchaseReturn::class);
    }
}
