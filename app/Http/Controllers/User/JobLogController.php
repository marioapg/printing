<?php

namespace App\Http\Controllers\User;

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
        $user = auth()->user();

        JobLog::create(
            [
                'job_id' => $job->id,
                'type' => 3,
                'change' => 'Comentario usuario: '.$user->name.', click para ver',
                'comment' => $request->comment,
                'user_id' => $user->id
            ]
        );

        Session::flash('flash_message', 'Comentario guardado');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('myjobs.show', $job->id);
    }
}
