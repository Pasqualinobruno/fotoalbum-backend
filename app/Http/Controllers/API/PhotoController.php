<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photography;

class PhotoController extends Controller
{
    public function index(Request $request)
    {
        // Query base per recuperare le fotografie con le relazioni category e albums
        $query = Photography::with(['category', 'albums'])->orderByDesc('id');

        // Filtro per inEvidence
        if ($request->has('inEvidence') && $request->inEvidence === 'true') {
            $query->where('evidence', 1);
        }

        // Filtro per la ricerca
        if ($request->has('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        // Filtro per la categoria
        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        // Restituzione dei risultati con paginazione
        return response()->json([
            'success' => true,
            'results' => $query->paginate(5)
        ]);
    }

    public function show($id)
    {
        // Recupero della singola fotografia con le relazioni category e albums
        $photo = Photography::with(['category', 'albums'])->find($id);

        if ($photo) {
            return response()->json([
                'success' => true,
                'results' => $photo
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Fotografia non trovata",
            ], 404);
        }
    }
}
