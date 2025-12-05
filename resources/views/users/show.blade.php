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
    <h1 class="mb-4 text-center">User Details</h1>

    <div class="container mt-4">
        <div class="card shadow-lg p-4">

            <div class="mb-3">
                <strong>Name:</strong> {{ $user->name }}
            </div>

            <div class="mb-3">
                <strong>Email:</strong> {{ $user->email }}
            </div>

            <div class="mb-3">
                <strong>Address:</strong> {{ $user->address }}
            </div>

            <div class="mb-3">
                <strong>Phone:</strong> {{ $user->phone }}
            </div>

            <div class="mb-3">
                <strong>Gender:</strong> {{ $user->gender }}
            </div>

            <div class="mb-3">
                <strong>Status:</strong> {{ $user->status ? 'Active' : 'Inactive' }}
            </div>

            <div class="mb-3">
                <strong>Profile Image:</strong><br>
                @if ($user->image)
                    <img src="{{ asset('userImages/' . $user->image) }}" style="height:150px;">
                @else
                    <span>No image uploaded</span>
                @endif
            </div>

            <div class="mt-3">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
            </div>


        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

</html>
