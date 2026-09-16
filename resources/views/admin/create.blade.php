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

<form action="/product/store" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" placeholder="Name" required>
    <label for="image_url">Image:</label>
    <input type="file" name="image_url" placeholder="Image" accept="image/*" required>
    <label for="price">Price:</label>
    <input type="number" name="price" placeholder="Price" required>
    <label for="description">Description:</label>
    <input type="text" name="description" placeholder="Description" >
    <button type="submit">Create</button>
</form>