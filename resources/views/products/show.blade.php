<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>

<body>
    <div>
        <h1>{{ $product->name }}</h1>

        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Price:</strong> {{ $product->price }} Ks</p>

        <a href="{{ route('products.index') }}">Back</a>

    </div>
</body>

</html>
