<!-- resources/views/books/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films List</title>
</head>
<body>
    <h1>Films List</h1>

    <form action="{{ route('films.index') }}" method="GET">
        <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Search by title, author, or genre">
        <button type="submit">Search</button>
    </form>

    @if ($films->isEmpty())
        <p>No films found.</p>
    @else
        <ul>
            @foreach ($films as $film)
                <li>
                    {{ $film->cim }} by {{ $film->rendezo }} ({{ $film->kiadas }}) - Genre: {{ $film->mufaj }}

                    <form action="{{ route('films.destroy', $film->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red;">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
