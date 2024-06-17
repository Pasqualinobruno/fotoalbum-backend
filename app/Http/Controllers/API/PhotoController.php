<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photography;


class PhotoController extends Controller
{

    public function index(Request $request)
    {
        $query = Photography::with(['category', 'albums'])->orderByDesc('id');

        if ($request->has('inEvidence') && $request->inEvidence === 'true') {
            $query->where('evidence', 1);
        }

        if ($request->has('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        return response()->json([
            'results' => $query->paginate(5)
        ]);
    }


    public function show($id)
    {
        $photo = Photography::with(['category', 'albums'])->where('id', $id)->first();
        if ($photo) {
            return response()->json([
                'success' => true,
                'results' => $photo
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => "404 Not Found"
            ]);
        }
    }
}
