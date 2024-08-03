<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-list {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 20px;
        }
        .error-list ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .error-list li {
            margin-bottom: 5px;
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        .back-link a {
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>

        @if($errors->any())
        <div class="error-list">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{ route('product.update', ['product' => $product->id]) }}">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" id="product_name" name="product_name" placeholder="Product name" value="{{ $product->product_name }}" />
            </div>

            <div class="form-group">
                <label for="product_description">Product Description</label>
                <input type="text" id="product_description" name="product_description" placeholder="Product description" value="{{ $product->product_description }}" />
            </div>

            <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="text" id="qty" name="qty" placeholder="Product quantity" value="{{ $product->qty }}" />
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" placeholder="Product price" value="{{ $product->price }}" />
            </div>

            <div class="form-group">
                <input type="submit" value="Update" />
            </div>

            <div class="back-link">
                <a href="{{ route('product.index') }}">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
