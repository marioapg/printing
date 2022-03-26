<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::select(
            ['id', 'user_id', 'name', 'priority', 'job_status_id', 'delivery_date', 'created_at']
        )->with(['status', 'user'])
            ->get();

        return view('admin.jobs_index', ['jobs' => $jobs]);
    }

    public function create()
    {
        $responsables = User::select(['id', 'name'])
            ->role('user')
            ->get();

        return view('admin.jobs_create', ['responsables' => $responsables]);
    }

    public function store(Request $request)
    {
        $job = Job::create($request->all());

        return redirect()->route('jobs.index');
    }
}
