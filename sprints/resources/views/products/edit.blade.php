<!DOCTYPE html>
<html>

<head>
    <title>Edit Product</title>

</head>

<body>
    <h1>Edit Product</h1>


    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Product Update Form -->
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Specify that this is a PUT request for updating -->

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"
            required>{{ old('description', $product->description) }}</textarea><br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" value="{{ old('price', $product->price) }}"
            required><br><br>

        <label for="stock">In Stock:</label>
        <input type="checkbox" id="stock" name="stock" value="1" {{ old('stock', $product->stock) ? 'checked' : '' }}><br><br>

        <label for="unit_price">Unit Price:</label>
        <input type="number" id="unit_price" name="unit_price" step="0.01"
            value="{{ old('unit_price', $product->unit_price) }}" required><br><br>

        <button type="submit">Update Product</button>
    </form>
</body>

</html>