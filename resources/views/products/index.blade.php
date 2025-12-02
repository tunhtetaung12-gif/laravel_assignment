<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Products</title>
</head>

<body>
    {{-- <h1>Product List</h1>
    <a href="{{ route('products.create') }}">Create New Product</a>
    @foreach ($products as $product)
        <p>{{ $product->id }} : {{ $product->name }}</p>
        <p>Price: {{ $product->price }} Ks</p>

        <a href="{{ route('products.show', ['id' => $product->id]) }}">show</a>
        <a href="{{ route('products.edit', ['id' => $product->id]) }}">edit</a><br><br>
        <form action="{{ route('products.delete',['id'=>$product->id])}}" method="POST">
            @csrf
            <button type="submit">Delete</button>
        </form>
    @endforeach --}}

    <div class="container mt-5">

    <h1 class="mb-4 text-center">Product List</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create New Product</a>

    <table class="table table-striped">
        <thead class="table table-striped table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price (Ks)</th>
                <th style="width: 220px;">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>

                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">
                            Show
                        </a>

                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('products.delete', $product->id) }}"
                              method="POST"
                              style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
