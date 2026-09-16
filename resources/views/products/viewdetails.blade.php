<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Product Details</h1>
        <p><strong>ID:</strong> {{ $product->id }}</p>
        <p><strong>Name:</strong> {{ $product->name }}</p>
        <p><strong>Image URL:</strong> 
            @if ($product->image_url)
                <img src="/storage/{{ $product->image_url }}" alt="{{ $product->name }}" width="100">
            @else
                No image
            @endif  
        </p>
        <p><strong>Price:</strong> {{ $product->price }}</p>
        <p><strong>Description:</strong> {{ $product->description }}</p>
        <a href="/">Back to Products</a>
    </div>
</body>
</html>