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
                $content = $stateModel->festivals()->get();
                break;

            case 'history':
                $content = $stateModel->history()->get();
                break;

            case 'heritage':
                $content = $stateModel->heritage()->get();
                break;

            case 'culture':
                $content = $stateModel->culture()->get();
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