<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photography;
use App\Http\Requests\StorePhotographyRequest;
use App\Http\Requests\UpdatePhotographyRequest;
use App\Http\Controllers\Controller;


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
        return view('admin.photo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotographyRequest $request)
    {
        //
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
