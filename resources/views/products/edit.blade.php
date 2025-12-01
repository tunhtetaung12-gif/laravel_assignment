<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf

        <label>Name:</label>
        <input type="text" name="name" value="{{ $product->name }}">

        <label>Price:</label>
        <input type="number" name="price" value="{{ $product->price }}">

        <label>Description:</label>
        <textarea name="description">{{ $product->description }}</textarea>

        <button type="submit">Update</button>
    </form>

</body>

</html>
