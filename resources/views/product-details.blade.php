<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Product Details</h1>
        <div class="card mt-4">
            <div class="card-body">
                <h3 class="card-title">{{ $product->name }}</h3>
                <p class="card-text"><strong>Price:</strong> RM{{ $product->price }}</p>
                <p class="card-text"><strong>Details:</strong> {{ $product->details }}</p>
                <p class="card-text"><strong>Published:</strong> {{ $product->publish === 'yes' ? 'Yes' : 'No' }}</p>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="/" class="btn btn-primary">Back to Products</a>
        </div>
    </div>
</body>

</html>
