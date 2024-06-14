<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photography;
use App\Http\Requests\StorePhotographyRequest;
use App\Http\Requests\UpdatePhotographyRequest;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Category;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotographyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(Photography::all());
        return view('admin.photo.index', ['photographys' => Photography::orderByDesc('id')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $albums = Album::all();

        return view('admin.photo.create', compact('categories', 'albums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotographyRequest $request)
    {
        //dd($request->all());
        //validazione
        $validated = $request->validated();


        $validated['image'] = Storage::put('uploads', $request->image);

        //dd($validated);
        //creazione
        $photography = Photography::create($validated);
        $photography->albums()->attach($validated['albums']);

        //pagina di ritorno dopo la creazione con messaggio
        return to_route('admin.photographys.index')->with('message', 'Photography created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photography $photography)
    {
        return view('admin.photo.show', compact('photography'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photography $photography)
    {

        $categories =  Category::all();
        $albums =  Album::all();

        return view('admin.photo.edit', compact('photography', 'categories', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotographyRequest $request, Photography $photography)
    {
        //dd($request->all());

        //validazione
        $validated = $request->validated();
        //aggiornamento dell'immagine
        if ($request->has('image')) {
            if ($photography->image) {
                Storage::delete($photography->image);
            }
            $image_path = Storage::put('upload', $request->image);
            $validated['image'] = $image_path;
        }
        //dd($request->all($validated));

        //aggiorniamo
        $photography->update($validated);

        if ($request->has('albums')) {
            $photography->albums()->sync($validated['albums']);
        }

        //rindiriziamo
        return to_route('admin.photographys.index')->with('message', 'Photography update successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photography $photography)
    {
        //controlla l'immagine e la elimina
        if ($photography->image && !Str::startsWith($photography->image, 'https://')) {
            Storage::delete($photography->image);
        }
        //cancella la nostra foto 
        $photography->delete();
        return to_route('admin.photographys.index')->with('message', 'Photography destroye successfully.');
    }
}
