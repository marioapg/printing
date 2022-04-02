<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobLog;
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

        if ($request->file()) {
            $files = [];
            $req_files = $request->file('files');
            foreach ($req_files as $file) {
                $originalName = $file->getClientOriginalName();
                $fileName = time() . '_' . $originalName;
                $filePath = $file->storeAs('uploads/job/'.$job->id.'/', $fileName, 'public');
                $save_file_path = ['path' => '/storage/' . $filePath, 'name' => $originalName];
                array_push($files, $save_file_path);
            }
            $job->files = $files;
            $job->save();
        }

        JobLog::create([
            'job_id' => $job->id,
            'type' => 1,
            'change' => 'Trabajo creado'
        ]);

        return redirect()->route('jobs.index');
    }

    public function show(Request $request)
    {
        $job = Job::findOrFail($request->job_id);

        return view('admin.jobs_show', ['job' => $job]);
    }
}
