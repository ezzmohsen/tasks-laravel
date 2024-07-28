<!-- resources/views/products/create.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Add New Product</title>
</head>

<body>
    <h1>Add New Product</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Product Creation Form -->
    <form action="{{ route('products.store') }}" method="POST">
        @csrf <!-- CSRF token for security -->

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ old('description') }}</textarea><br><br>



        <label for="stock">In Stock:</label>
        <input type="checkbox" id="stock" name="stock" value="1" {{ old('stock') ? 'checked' : '' }}><br><br>

        <label for="unit_price">Unit Price:</label>
        <input type="number" id="unit_price" name="unit_price" step="0.01" value="{{ old('unit_price') }}"
            required><br><br>

        <button type="submit">Add Product</button>
    </form>
</body>

</html>