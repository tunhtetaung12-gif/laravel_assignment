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
    {{-- <div>
        <h1>{{ $product->name }}</h1>

        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Price:</strong> {{ $product->price }} Ks</p>

        <a href="{{ route('products.index') }}">Back</a>

    </div> --}}
   <div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">Product Details</h2>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th style="width: 30%;">Field</th>
                    <th>Value</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $product->name }}</td>
                </tr>

                <tr>
                    <th>Description</th>
                    <td>{{ $product->description }}</td>
                </tr>

                <tr>
                    <th>Price</th>
                    <td>{{ $product->price }} Ks</td>
                </tr>

                <tr>
                    <th>Product Image</th>
                    <td><img src="{{ asset('productImages/' . $product->image)}}" alt="{{ $product->image}}" style="width: 100px; height:auto" /></td>
                </tr>
            </tbody>
        </table>

        <div>
            <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm mt-2">
                Back to Products
            </a>
        </div>

    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
