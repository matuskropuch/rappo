<?php

namespace App\Http\Controllers;

use App\Rapper;
use App\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();

        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $rapper = Rapper::findOrFail($id);

        return view('albums.create', compact('rapper'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $filename = "album-{$request->name}." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $relative_path = "images/albums/" . $filename;
        $path = $request->file('image')->storeAs(
            'public/images/albums',
            $filename
        );

        auth()->user()->albums()->create([
            'name' => $request->name,
            'rapper_id' => $id,
            'released_at' => $request->released_at,
            'image' => $relative_path,
            'info' => $request->info
        ]);

        return redirect()->route('rappers.show', Rapper::find($id)->nickname);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        $rappers = Rapper::all();

        return view('albums.edit', compact('album', 'rappers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);
        $album->update(
            $request->only('name', 'rapper_id', 'released_at', 'info')
        );

        return redirect()->route('albums.show', $album->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);

        return view('albums.show', compact('album'));
    }
}
