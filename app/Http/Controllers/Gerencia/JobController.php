<?php

namespace App\Http\Controllers\Gerencia;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::select(
            ['id', 'user_id', 'name', 'priority', 'job_status_id', 'delivery_date', 'created_at']
        )
        ->whereHas('salesGerence', function($query) {
            return $query->where('gerence_id', auth()->user()->gerence_id);
        })
        ->with(['status', 'user', 'salesGerence', 'gerence'])
        ->get();

        return view('gerencia.jobs_index', ['jobs' => $jobs]);
    }

    public function show(Request $request)
    {
        $job = Job::findOrFail($request->job_id);

        return view('gerencia.jobs_show', ['job' => $job]);
    }
}
