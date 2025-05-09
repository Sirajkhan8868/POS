<?php
namespace App\Http\Controllers;

use App\Models\QuotationItem;
use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationItemController extends Controller
{
    public function store(Request $request, $quotation_id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'net_unit_price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
        ]);

        $quotation = Quotation::findOrFail($quotation_id);

        $item = new QuotationItem();
        $item->quotation_id = $quotation->id;
        $item->product_id = $request->product_id;
        $item->quantity = $request->quantity;
        $item->net_unit_price = $request->net_unit_price;
        $item->discount = $request->discount ?? 0;
        $item->tax = $request->tax ?? 0;
        $item->subtotal = ($request->quantity * $request->net_unit_price) - $request->discount + $request->tax;
        $item->save();

        // Recalculate and save the grand total for the quotation
        $this->updateGrandTotal($quotation);

        return redirect()->route('quotations.show', $quotation_id)->with('success', 'Item added to quotation!');
    }

    public function update(Request $request, $quotation_id, $item_id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'net_unit_price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
        ]);

        $quotation = Quotation::findOrFail($quotation_id);
        $item = QuotationItem::findOrFail($item_id);

        $item->product_id = $request->product_id;
        $item->quantity = $request->quantity;
        $item->net_unit_price = $request->net_unit_price;
        $item->discount = $request->discount ?? 0;
        $item->tax = $request->tax ?? 0;
        $item->subtotal = ($request->quantity * $request->net_unit_price) - $request->discount + $request->tax;
        $item->save();

        // Recalculate and save the grand total for the quotation
        $this->updateGrandTotal($quotation);

        return redirect()->route('quotations.show', $quotation_id)->with('success', 'Item updated!');
    }

    public function destroy($quotation_id, $item_id)
    {
        $item = QuotationItem::findOrFail($item_id);
        $item->delete();

        // Recalculate and save the grand total for the quotation
        $this->updateGrandTotal(Quotation::findOrFail($quotation_id));

        return redirect()->route('quotations.show', $quotation_id)->with('success', 'Item removed from quotation!');
    }

    private function updateGrandTotal($quotation)
    {
        $total = $quotation->items->sum('subtotal');
        $taxPercentage = $quotation->tax ?? 0;
        $discountPercentage = $quotation->discount ?? 0;
        $shipping = $quotation->shipping ?? 0;

        $totalTaxAmount = ($total * $taxPercentage) / 100;
        $totalDiscountAmount = ($total * $discountPercentage) / 100;

        $grandTotal = $total + $totalTaxAmount - $totalDiscountAmount + $shipping;

        // Update the grand total in the quotation
        $quotation->grand_total = $grandTotal;
        $quotation->save();
    }
}
