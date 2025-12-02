<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    {{-- <div>
        <h1>Hello... This is Category Page.</h1>

        @foreach ($categories as $category)
            <p>{{ $category['id'] }} : {{ $category['name'] }}</p>
        @endforeach
    </div> --}}

    <div>
        <h1>Categories List</h1>
        <a href="{{route('categories.create')}}">+Create</a>
        @foreach ($data as $category)
            <p>{{$category['id']}} : {{$category['name']}}</p>
            <a href="{{route('categories.edit', ['id' => $category->id])}}">Edit</a>
        @endforeach
    </div>
</body>

</html>
