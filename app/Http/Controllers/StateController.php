<?php

namespace App\Http\Controllers;

use App\Models\State;


class StateController extends Controller
{
    /**
     * Show a state's section (history, heritage, festivals, culture).
     */
    public function section($state, $section)
    {
        // Find state by slug (e.g. "manipur")
        $stateModel = State::where('slug', $state)->firstOrFail();

        switch ($section) {

            case 'festivals':
                $content = $stateModel->festivals()
                    ->with('picture')
                    ->get();
                break;

            case 'history':
                $content = $stateModel->history()
                    ->with('picture')
                    ->get();
                break;

            case 'heritage':
                $content = $stateModel->heritage()
                    ->with('picture')
                    ->get();
                break;

            case 'culture':
                $content = $stateModel->culture()
                    ->with('picture')
                    ->get();
                break;

            default:
                abort(404);
        }

        return view('states.section', [
            'state'   => $stateModel->name,
            'section' => $section,
            'content' => $content,
        ]);
    }
}