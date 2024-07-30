<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve a Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .error-messages {
            color: red;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="string"],
        input[type="date"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
        .image-template {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        .image-template img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reserve a Product</h1>

        <div class="error-messages">
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <form method="post" action="{{route('product.save')}}">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="string" id="product_name" name="product_name" placeholder="Product name" value="{{$product->product_name}}"/>
            </div>

            <div class="form-group">
                <label for="product_description">Product Description</label>
                <input type="string" id="product_description" name="product_description" placeholder="Product description" value="{{$product->product_description}}"/>
            </div> 

            <div class="form-group">
                <label for="qty">Product Quantity</label>
                <input type="text" id="qty" name="qty" placeholder="Product quantity" value="{{$product->qty}}"/>
            </div>

            <div class="form-group">
                <label for="price">Product Price</label>
                <input type="text" id="price" name="price" placeholder="Product price" value="{{$product->price}}"/>
            </div>

            <div class="form-group image-template">
                <label>Product Image</label>
                <img src="path_to_image_template.jpg" alt="Product Image Template"/>
            </div>

            <div class="form-group">
                <label for="reserve_date">Reserve Date</label>
                <input type="date" id="reserve_date" name="reserve_date"/>
            </div>

            <button type="submit" class="submit-btn">Save Product</button>
        </form>

        <h1>Reserve {{$product->product_name}}</h1>

        <form method="post" action="">
            <div class="form-group">
                <label for="reserve_qty">Enter Quantity:</label>
                <input type="text" id="reserve_qty" name="qty" placeholder="Product quantity"/>
            </div>

            <div class="form-group">
                <label for="reserve_date">When to Reserve:</label>
                <input type="date" id="reserve_date" name="reserve_date"/>
            </div>

            <button type="submit" class="submit-btn">Reserve Now</button>
        </form>
    </div>
</body>
</html>
