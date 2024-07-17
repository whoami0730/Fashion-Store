<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #12263a;
            margin: 0;
            margin-bottom: 10px;
            text-transform: capitalize;
        }
        .header h2 {
            color: #777;
            margin: 0;
        }
        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        .product-image {
            width: 100%;
            max-width: 200px;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #eff;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Hi {{ $mailData['order']->name }}</h1>
            <h2>Your Order Dispatch For Delivery</h2>
        </div>
        <div class="content">
            <p>Thank you for your order. Here are the details of your purchase:</p>
            <img src="{{ $message->embed(public_path('storage/ProductImage/'. $mailData['order']->image)) }}" alt="Product Image" class="product-image">
            <p><strong>Product Name : </strong>{{ $mailData['order']->product_name }}</p>
            <p><strong>Product Price : </strong> ₹ {{ $mailData['order']->price }}</p>
            <p><strong>Product Qty : </strong>{{ $mailData['order']->qty }} </p>
            <p><strong>Product Total Amount : </strong> ₹ {{ $mailData['order']->qty * $mailData['order']->price }}  </p>
            <p><strong>Product Description : </strong>{{ $mailData['order']->description }} </p>
            
            <p><a href="{{ url('https://fashionstore.buddyledtv.com/public') }}" class="button">Visit Fashion Store </a></p>
        </div>
    </div>
</body>
</html>
