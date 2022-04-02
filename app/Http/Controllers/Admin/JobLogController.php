<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobLog;
use App\Models\Job;
use Session;

class JobLogController extends Controller
{
    public function store(Request $request)
    {
        $job = Job::findOrFail($request->job_id);

        JobLog::create(
            [
                'job_id' => $job->id,
                'type' => 2,
                'change' => 'Comentario Admin, click para ver',
                'comment' => $request->comment,
            ]
        );

        Session::flash('flash_message', 'Comentario guardado');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('jobs.show', $job->id);
    }

    public function show(Request $request)
    {
        return JobLog::findOrFail($request->comment_id)->comment;
    }
}
