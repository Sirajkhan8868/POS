<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleReturnItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_return_id', 'product_name', 'stock', 'quantity', 'net_unit_price', 'discount', 'tax', 'subtotal'
    ];

    public function saleReturn()
    {
        return $this->belongsTo(SaleReturn::class);
    }
}
