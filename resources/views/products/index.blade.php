<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Panel</title>
</head>
<body>
    <nav>
        <a href="/user/register">Register</a>
        <a href="/user/login">Login</a>
    </nav>
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
                    <form action="/product/view/{{$product->id}}" method="GET">
                        @csrf
                        <button type="submit">View Details</button>
                    </form>
                </td>
            </tr>
            @endforeach
    </table>
</body>
</html>