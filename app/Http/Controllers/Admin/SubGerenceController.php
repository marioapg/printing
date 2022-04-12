<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subgerence;

class SubGerenceController extends Controller
{
    public function index(Request $request)
    {
        $subgerences = Subgerence::select(['id', 'gerence_id', 'name'])
            ->load(['gerence'])
            ->get();

        return redirect()->route('subgerences_index',
            [
                'subgerences' => $subgerences
            ]
        );
    }

    public function ajax(Request $request)
    {
        $response = Subgerence::select(['id', 'gerence_id', 'name'])
                        ->where('gerence_id', $request->gerence_id)
                        ->get();

        return $response;
    }
}
