<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genre Form</title>
</head>
<body>

<h1>Add New Genre</h1>

@if(session('success'))
<p style="color: green;">{{ session('success') }}</p>
@endif

@if(session('error'))
<p style="color: red;">{{ session('error') }}</p>
@endif

@if($errors->any())
<ul style="color: red;">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

    <form action="{{ route('genre.store') }}" method="POST">
        @csrf
        <label for="mufaj">Genre:</label>
        <input type="text" id="mufaj" name="mufaj" required>
        <button type="submit">Save</button>
    </form>
</body>
</html>
