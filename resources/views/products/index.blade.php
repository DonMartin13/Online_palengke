<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .alert {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #c3e6cb;
        }

        .products-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .product-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 10px;
            width: 250px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            box-sizing: border-box;
        }

        .product-card img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #f4f4f4;
            margin-bottom: 10px;
        }

        .product-card h2 {
            margin: 10px 0;
            font-size: 18px;
            color: #333;
        }

        .product-card p {
            margin: 5px 0;
            color: #555;
        }

        .product-card .price {
            font-size: 16px;
            color: #007bff;
        }

        .reserve-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            border: none;
            font-size: 14px;
            align-self: center;
        }

        .reserve-btn:hover {
            background-color: #0056b3;      
        }
    </style>

</head>
    <body>
        <div class="container">
            <h1>Products</h1>
            @if(session()->has('success'))
            <div class="alert">
                {{session('success')}}
            </div>
            @endif
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <img src="https://www.deped.gov.ph/wp-content/uploads/placeholder.png" alt="Product Image">
                        <h2>{{$product->product_name}}</h2>
                        <p><strong>Description:</strong> {{$product->product_description}}</p>
                        <p><strong>Quantity:</strong> {{$product->qty}}</p>
                        <p class="price"><strong>Price:</strong> ${{$product->price}}</p>
                        <a href="{{route('product.reserve', ['product' => $product])}}" class="reserve-btn">Add to Basket</a>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>

