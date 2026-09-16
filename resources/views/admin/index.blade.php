<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
    <div>
        <a href="/">Home</a>
    </div>
    <div>
        <form action="/product/create" method="GET">
            @csrf
            <button type="submit">Create Product</button>
        </form>

    </div>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image URL</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id}}</td>
                <td>{{ $product->name }}</td>
                <td>@if ($product->image_url)
                    <img src="/storage/{{ $product->image_url }}" alt="{{ $product->name }}" width="100">
                @else
                    No image
                @endif</td>
                <td>{{ $product->price }}</td>
                <td>
                    <form action="/product/edit/{{$product->id}}" method="GET">
                        @csrf
                        <button type="submit">Edit</button>
                    </form>
                    <form action="/product/delete/{{$product->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form> 
                </td>
            </tr>
            @endforeach
    </table>
</body>
</html>