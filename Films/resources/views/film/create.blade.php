<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Film</title>
</head>
<body>
    <h1>Add New Film</h1>

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



    <form action="{{ route('films.store') }}" method="POST">
    @csrf
    <label for="cim">Film Title:</label>
    <input type="text" id="cim" name="cim" required>

    <label for="rendezo">Director:</label>
    <input type="text" id="rendezo" name="rendezo" required>

    <label for="kiadas">Publication Year:</label>
    <input type="integer" id="kiadas" name="kiadas" required min="1000" max="1999">

    <label for="genre_id">Genre:</label>
    <select id="genre_id" name="genre_id" required>
        <option value="">Select a Genre</option>
        @foreach ($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->mufaj }}</option>
        @endforeach
    </select>   

    <button type="submit">Save</button>
</form>

</body>
</html>
