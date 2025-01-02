<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Add New Product</h2>
        <form action="/add-product" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" placeholder="Product Name" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="number" name="price" class="form-control" placeholder="Product Price" required>
            </div>
            <div class="mb-3">
                <label for="details" class="form-label">Product Details</label>
                <textarea name="details" class="form-control" rows="4" placeholder="Enter Product Details" required></textarea>
            </div>
            <div class="mb-3">
                <label for="publish" class="form-label">Publish</label>
                <div>
                    <input type="radio" id="publish_yes" name="publish" value="yes" required>
                    <label for="publish_yes">Yes</label>
                    <input type="radio" id="publish_no" name="publish" value="no" required>
                    <label for="publish_no">No</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Product</button>
            <a href="/" class="btn btn-danger">Cancel</a>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
