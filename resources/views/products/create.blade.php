<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Create New Product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label>Name:</label>
        <input type="text" name="name"><br><br>

        <label>Price:</label>
        <input type="number" name="price"><br><br>

        <label>Description:</label>
        <textarea name="description"></textarea><br><br>

        <button type="submit">Create</button>
    </form>

</body>

</html>
