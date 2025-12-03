<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    {{-- <h1>Create New Product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label>Name:</label>
        <input type="text" name="name"><br><br>

        <label>Price:</label>
        <input type="number" name="price"><br><br>

        <label>Description:</label>
        <textarea name="description"></textarea><br><br>

        <button type="submit">Create</button>
    </form> --}}

    <h1 class="mb-4 text-center">Create New Product</h1>

    <div class="container mt-4">
        <div class="card shadow-lg p-4">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Enter product name" value="{{ old('name') }}" />
                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                        placeholder="Enter price" value="{{ old('price') }}" />
                    @error('price')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3"
                            placeholder="Enter description" value="{{ old('description') }}"></textarea>
                        @error('description')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="card-body">
                        <label for="image" class="form-input-label mb-2">Product Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Create Product</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
