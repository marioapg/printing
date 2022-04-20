<?php

namespace App\Http\Controllers\AGerencia;

use Session;
use App\Models\Job;
use App\Models\JobLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobLogController extends Controller
{
    public function store(Request $request)
    {
        $job = Job::findOrFail($request->job_id);
        $user = auth()->user();

        JobLog::create(
            [
                'job_id' => $job->id,
                'type' => 2,
                'change' => 'Comentario Admin, click para ver',
                'comment' => $request->comment,
                'user_id' => $user->id
            ]
        );

        Session::flash('flash_message', 'Comentario guardado');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('agerence.jobs.show', $job->id);
    }
}
