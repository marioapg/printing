<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::select(
            ['id', 'user_id', 'name', 'priority', 'job_status_id', 'delivery_date', 'created_at']
        )->with(['status', 'user'])
            ->get();

        return view('user.jobs_index', ['jobs' => $jobs]);
    }

    public function show(Request $request)
    {
        $job = Job::findOrFail($request->job_id);

        return view('user.jobs_show', ['job' => $job]);
    }
}
