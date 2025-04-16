<form method="POST" action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}">
    @csrf
    @if(isset($product)) @method('PUT') @endif

    <label>Product Name:</label><br>
    <input type="text" name="product_name" value="{{ old('product_name', $product->product_name ?? '') }}"><br><br>

    <label>Product Code:</label><br>
    <input type="text" name="product_code" value="{{ old('product_code', $product->product_code ?? '') }}"><br><br>

    <label>Category:</label><br>
    <select name="catagory_id">
        <option value="">-- Select Category --</option>
        @foreach($catagories as $cat)
            <option value="{{ $cat->id }}" {{ (old('catagory_id', $product->catagory_id ?? '') == $cat->id) ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select><br><br>

    <label>Unit:</label><br>
    <select name="unit_id">
        <option value="">-- Select Unit --</option>
        @foreach($units as $unit)
            <option value="{{ $unit->id }}" {{ (old('unit_id', $product->unit_id ?? '') == $unit->id) ? 'selected' : '' }}>
                {{ $unit->name }}
            </option>
        @endforeach
    </select><br><br>

    <label>Cost:</label><br>
    <input type="number" step="0.01" name="cost" value="{{ old('cost', $product->cost ?? '') }}"><br><br>

    <label>Price:</label><br>
    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price ?? '') }}"><br><br>

    <label>Quantity:</label><br>
    <input type="number" name="quantity" value="{{ old('quantity', $product->quantity ?? '') }}"><br><br>

    <label>Alert Quantity:</label><br>
    <input type="number" name="alert_quantity" value="{{ old('alert_quantity', $product->alert_quantity ?? 0) }}"><br><br>

    <label>Tax (%):</label><br>
    <input type="number" step="0.01" name="tax" value="{{ old('tax', $product->tax ?? '') }}"><br><br>

    <label>Tax Type:</label><br>
    <input type="text" name="tax_type" value="{{ old('tax_type', $product->tax_type ?? '') }}"><br><br>

    <label>Note:</label><br>
    <textarea name="note">{{ old('note', $product->note ?? '') }}</textarea><br><br>

    <button type="submit">{{ isset($product) ? 'Update' : 'Create' }}</button>
</form>
