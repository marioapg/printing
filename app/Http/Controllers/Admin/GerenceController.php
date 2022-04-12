<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gerence;

class GerenceController extends Controller
{
    public function index(Request $request)
    {
        $gerences = Gerence::select(['id', 'name'])->get();

        return view('admin.gerences_index',
            [
                'gerences' => $gerences
            ]
        );
    }
}
