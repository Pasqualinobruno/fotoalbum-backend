<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\StoreAlbumsRequest;
use App\Http\Requests\UpdateAlbumsRequest;
use App\Models\Album;
use App\Http\Controllers\Controller;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.albums.index', ['albums' => Album::orderByDesc('id')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumsRequest $request)
    {
        //dd($request->all());
        //validiamo i dati
        $validated = $request->validated();
        //dd($validated);
        //creamo la categoria
        Album::create($validated);
        //pagina di ritorno dopo la creazione con messaggio
        return to_route('admin.albums.index')->with('message', 'Album created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        $album->load('photographies');
        return view('admin.albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('admin.albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumsRequest $request, Album $album)
    {
        //dd($request->all());
        //validazione
        $validated = $request->validated();
        //dd($request->all($validated));
        //aggiorniamo i dati
        $album->update($validated);
        //ritorniamo alla rotta index con un messaggio
        return to_route('admin.albums.index')->with('message', 'Album update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return to_route('admin.albums.index')->with('message', 'Album destroye successfully.');
    }
}
