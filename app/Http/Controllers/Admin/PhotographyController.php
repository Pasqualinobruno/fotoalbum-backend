<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photography;
use App\Http\Requests\StorePhotographyRequest;
use App\Http\Requests\UpdatePhotographyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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

        Photography::created($validated);

        //pagina di ritorno dopo la creazione con messaggio
        return to_route('admin.photo.index')->with('success', 'Photography created successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotographyRequest $request, Photography $photography)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photography $photography)
    {
        //
    }
}
