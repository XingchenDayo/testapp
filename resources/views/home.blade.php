<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <style>
        .form-container {
            display: none;
            width: 90%;
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container.active {
            display: block;
        }

        .form-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .form-container input {
            display: block;
            width: 90%;
            padding: 10px;
            margin: auto;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-container input:focus {
            outline: none;
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.2);
        }

        .form-container button[type="submit"] {
            display: block;
            width: 90%;
            padding: 12px;
            margin: 20px auto;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .form-container button[type="submit"]:hover {
            background: #357abd;
        }

        .switch-btn {
            display: block;
            width: fit-content;
            margin: 10px auto;
            padding: 8px 15px;
            background: none;
            border: none;
            color: #4a90e2;
            font-size: 14px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .switch-btn:hover {
            color: #357abd;
            text-decoration: underline;
        }
    </style> --}}
    <style>
        /* table style */
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1em;
            text-align: left;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .btn {
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            color: #fff;
            font-size: 0.9em;
        }

        .btn-info {
            background-color: #007bff;
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>

    {{-- @auth --}}
    {{-- <form action="/logout" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form> --}}
    {{-- <h2>Welcome {{ auth()->user()->name }}</h2> --}}
    {{-- create a product --}}
    {{-- <div class="container mt-5">
        <h2 class="text-center mb-4">Add New Product</h2>

        <form action="/addProduct" method="POST" class="p-4 border rounded bg-light shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Product Name" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="number" name="price" class="form-control" placeholder="Enter Product Price" required>
            </div>

            <div class="mb-3">
                <label for="details" class="form-label">Product Details</label>
                <textarea name="details" class="form-control" rows="4" placeholder="Enter Product Details" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Publish</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" id="publish_yes" name="publish" value="yes" class="form-check-input"
                        required>
                    <label for="publish_yes" class="form-check-label">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="publish_no" name="publish" value="no" class="form-check-input"
                        required>
                    <label for="publish_no" class="form-check-label">No</label>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Create Product</button>
        </form>
    </div> --}}
    <div class="container my-5">
        <h1 style="margin-bottom: 100px">Welcome !</h1>


        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Products list</h2>

            <a href="/add-product" class="btn btn-primary">Add Product</a>
        </div>
        <div class="d-flex justify-content-end align-items-center mb-3">
            <form action="{{ url('/products') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search products..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Details</th>
                    <th>Publish</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->details }}</td>
                        <td>{{ $product->publish === 'yes' ? 'Published' : 'Unpublished' }}</td>
                        <td class="text-center">
                            <!-- Show Details -->
                            <a href="/show-product/{{ $product->id }}" class="btn btn-info btn-sm me-2">View</a>

                            <!-- Edit Product -->
                            <a href="/edit-product/{{ $product->id }}" class="btn btn-warning btn-sm me-2">Edit</a>

                            <!-- Delete Product -->
                            <form action="/delete-product/{{ $product->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- @else
        <div class="form-container active" id="registerForm">
            <h2>Welcome</h2>

            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <label for="name">Username:</label>
                <input type="text" name="name" placeholder="Name" required>
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Email" required>
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Register</button>
            </form>
            <button class="switch-btn" onclick="switchForm('loginForm')">go to Login</button>
        </div>

        <div class="form-container" id="loginForm">
            <h2>Welcome</h2>

            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <label for="name">UserName:</label>
                <input type="text" name="name" placeholder="Name" required>
                <label for="name">Password:</label>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <button class="switch-btn" onclick="switchForm('registerForm')">go to Register</button>
        </div>

    @endauth --}}
    {{-- 
    <script>
        function switchForm(formId) {
            const forms = document.querySelectorAll('.form-container');
            forms.forEach(form => form.classList.remove('active'));
            document.getElementById(formId).classList.add('active');
        }
    </script> --}}
</body>

</html>
