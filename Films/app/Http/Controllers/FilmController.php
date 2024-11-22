<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function create()
    {
        $genres = Genre::all();
        return view('film.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cim' => ['required', 'string', 'max:255'],
            'rendezo' => ['required', 'string', 'max:255'],
            'kiadas' => ['required', 'integer'],
            'genre_id' => ['required', 'integer'],
        ]);

        try {
            Film::create([
                'cim' => $request->cim,
                'rendezo' => $request->rendezo,
                'kiadas' => $request->kiadas,
                'genre_id' => $request->genre_id,
                'mufaj' => Genre::find($request->genre_id)->mufaj,
            ]);


            return redirect()->route('films.create')->with('success', 'Film stored successfully.');
        } catch (\Exception $e) {
            \Log::error('Failed to store book: ' . $e->getMessage());

            return redirect()->route('films.create')->with('error', 'Failed to store film. Error: ' . $e->getMessage());
        }
    }


    public function index(Request $request)
    {

        $search = $request->input('search');

        $films = Film::when($search, function ($query, $search) {
            return $query->where('cim', 'like', "%{$search}%")
                ->orWhere('rendezo', 'like', "%{$search}%")
                ->orWhere('mufaj', 'like', "%{$search}%");
        })->get();


        return view('film.index', compact('films', 'search'));
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete(); 

        return redirect()->route('films.index')->with('success', 'Film deleted successfully.');
    }


    public function show($id)
    {
        $film = Film::findOrFail($id);
        $genres = Genre::all();

        return view('film.show', compact('films', 'genres'));
    }
}
