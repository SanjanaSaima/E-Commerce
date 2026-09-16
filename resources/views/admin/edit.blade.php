<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    
<form action="/product/update/{{ $product->id }}" method="POST" enctype="multipart/form-data">
@method('PUT')    
@csrf
    
    <label for="name">Name:</label>
    <input type="text" name="name" placeholder="Name" value="{{ $product->name }}" required>
    <label for="image_url">Image:</label>
    <input type="file" name="image_url" placeholder="Image" accept="image/*">
    <label for="price">Price:</label>
    <input type="number" name="price" placeholder="Price" value="{{ $product->price }}" required>
    <label for="description">Description:</label>
    <input type="text" name="description" placeholder="Description" value="{{ $product->description }}">
    <button type="submit">Update</button>
</form>
</body>
</html>