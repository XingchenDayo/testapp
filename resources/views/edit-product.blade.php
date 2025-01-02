<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Product</h2>
        <form action="/products/{{ $product->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}"
                    placeholder="Product Name" required>
            </div>

            <div class="mb-3">
                <label for="details" class="form-label">Product Details</label>
                <textarea name="details" class="form-control" rows="4" placeholder="Product Details" required>{{ $product->details }}</textarea>
            </div>


            <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="number" name="price" class="form-control" value="{{ $product->price }}"
                    placeholder="Product Price" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Publish</label>
                <div class="form-check form-check-inline">
                    <input type="radio" id="publish_yes" name="publish" value="yes" class="form-check-input"
                        {{ $product->publish == 'yes' ? 'checked' : '' }} required>
                    <label for="publish_yes" class="form-check-label">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="publish_no" name="publish" value="no" class="form-check-input"
                        {{ $product->publish == 'no' ? 'checked' : '' }} required>
                    <label for="publish_no" class="form-check-label">No</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
