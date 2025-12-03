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
    {{-- <div>
        <h1>Category Create</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <input type="text" placeholder="Enter Category Name" name="name"/>
            <button type="submit">create</button>
            <a href="{{ route('categories.index') }}">Back</a>
        </form>
    </div> --}}

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">+ Category Create</div>
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <label for="name" class="form-input-label mb-2">Category Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Enter Category Name" name="name" value="{{ old('name') }}" />
                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="card-body">
                    <label for="image" class="form-input-label mb-2">Category Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary btn-sm me-2">Create</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
