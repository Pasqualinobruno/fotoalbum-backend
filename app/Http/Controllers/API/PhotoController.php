<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photography;


class PhotoController extends Controller
{
    public function index()
    {
        return response()->json([
            'results' => Photography::with(['category', 'albums'])->orderByDesc('id')->paginate(),
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
