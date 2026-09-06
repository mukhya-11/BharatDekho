<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Festival;
use App\Models\Heritage;
use App\Models\Culture;
use App\Models\History;

class UploadController extends Controller
{
    // Show upload form
    public function create()
    {
        $states = State::orderBy('name')->get();

        return view('upload', compact('states'));
    }

    // Store uploaded data
    public function store(Request $request)
    {
        $request->validate([
            'state_id' => 'required|exists:states,id',
            'category' => 'required|in:festival,heritage,culture,history',
            'name' => 'required|max:255',
            'image_url' => 'nullable|max:500',
            'description' => 'required|max:1000',
        ]);

        $data = [
            'state_id' => $request->state_id,
            'name' => $request->name,
            'image_url' => $request->image_url,
            'description' => $request->description,
        ];

        switch ($request->category) {
            case 'festival':
                Festival::create($data);
                break;

            case 'heritage':
                Heritage::create($data);
                break;

            case 'culture':
                Culture::create($data);
                break;

            case 'history':
                History::create($data);
                break;
        }

        return redirect()->route('upload.create')->with('success', ucfirst($request->category) . ' uploaded successfully!');
    }
}