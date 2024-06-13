<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photography;
use App\Http\Requests\StorePhotographyRequest;
use App\Http\Requests\UpdatePhotographyRequest;
use App\Http\Controllers\Controller;
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
        $categories = [
            'Landscape',
            'Portrait',
            'Wildlife',
            'Street',
            'Architectural',
            'Fashion',
            'Sports',
            'Macro',
            'Travel',
            'Documentary'
        ];
        return view('admin.photo.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotographyRequest $request)
    {
        //dd($request->all());
        //validazione
        $validated = $request->validated();

        //creazione
        $validated['image'] = Storage::put('uploads', $request->image);

        //dd($validated);

        Photography::create($validated);

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
        $categories = [
            'Landscape',
            'Portrait',
            'Wildlife',
            'Street',
            'Architectural',
            'Fashion',
            'Sports',
            'Macro',
            'Travel',
            'Documentary'
        ];
        return view('admin.photo.edit', compact('photography', 'categories'));
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
        //dd($request->all());

        //aggiorniamo
        $photography->update($validated);

        //rindiriziamo
        return to_route('admin.photographys.index')->with('message', 'Photography update successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photography $photography)
    {
        if ($photography->image && !Str::startsWith($photography->image, 'https://')) {
            Storage::delete($photography->image);
        }
        $photography->delete();
        return to_route('admin.photographys.index')->with('message', 'Photography destroye successfully.');
    }
}
