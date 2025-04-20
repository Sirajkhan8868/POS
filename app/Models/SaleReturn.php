<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference', 'customer', 'date', 'tax', 'discount', 'shipping', 'total_amount', 'status'
    ];

    public function items()
    {
        return $this->hasMany(SaleReturnItem::class);
    }
}
