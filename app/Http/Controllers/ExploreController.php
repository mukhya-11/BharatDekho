<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Heritage;
use App\Models\Festival;
use App\Models\Culture;

class ExploreController extends Controller
{
    public function index(Request $request, $section)
    {
        $models = [
            'history' => History::class,
            'heritage' => Heritage::class,
            'festivals' => Festival::class,
            'culture' => Culture::class,
        ];

        abort_unless(isset($models[$section]), 404);

        $model = $models[$section];

        $items = $model::with('state')
            ->orderBy('name')
            ->paginate(10);

        if ($request->ajax()) {
            return response()->json($items);
        }

        return view('explore-section', compact('items', 'section'));
    }
}