<?php

namespace App\Http\Controllers\User;

use App\Models\Job;
use App\Models\JobLog;
use App\Models\JobStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function edit(Request $request)
    {
        $job = Job::findOrFail($request->job_id);
        $estatus = JobStatus::select(['id', 'name', 'color'])
        ->get();

        return view(
            'user.jobs_edit',
            [
                'job' => $job,
                'estatus' => $estatus
            ]
        );
    }

    public function update(Request $request)
    {
        $job = Job::findOrFail($request->job_id);

        $status_from = $job->status->name;
        $job->job_status_id = $request->job_status_id;
        $job->tracking = $request->tracking;
        $hasChanges = $job->getDirty();
        $job->save();
        $job->refresh();

        $files = $job->files ?? [];
        $changes = '';

        if (count($hasChanges)) {
            foreach ($hasChanges as $key => $value) {
                $changes .= $this->attributeName($key) . ', ';

                if ($key === 'job_status_id') {
                    $changes .= 'de: ' . $status_from . ' a: ' . $job->status->name . ', ';
                }
            }
        }

        // if ($request->files_del) {
        //     foreach ($request->files_del as $filedel) {
        //         $storageName = explode('/', $job->files[$filedel]->path)[5];
        //         Storage::disk('public')->delete('uploads/job/' . $job->id . '/' . $storageName);
        //         $files = Arr::except($files, $filedel);
        //     }

        //     $files = array_values($files);

        //     $job->files = $files;
        //     $changes .= $this->attributeName('files') . ' borrados, ';
        //     $job->save();
        // }

        if ($request->file()) {
            $req_files = $request->file('files');
            foreach ($req_files as $file) {
                $originalName = $file->getClientOriginalName();
                $fileName = time() . '_' . $originalName;
                $filePath = $file->storeAs('uploads/job/' . $job->id, $fileName, 'public');
                $save_file_path = ['path' => '/storage/' . $filePath, 'name' => $originalName];
                array_push($files, $save_file_path);
                $changes .= ' ' . $originalName . ', ';
            }
            $job->files = $files;
            $job->save();
            $changes .= $this->attributeName('files') . ' cargados, ';
        }

        if ($changes !== '') {
            JobLog::create([
                'job_id' => $job->id,
                'type' => 3,
                'change' => $changes . ' - Actualizado por usuario: ' . auth()->user()->name,
                'user_id' => auth()->user()->id
            ]);
        }

        return redirect()->route('myjobs.show', $job->id);
    }

    public function attributeName(String $attr): String
    {
        switch ($attr) {
            case 'delivery_date':
                return 'Fecha de entrega';
                break;

            case 'name':
                return 'Nombre';
                break;

            case 'priority':
                return 'Prioridad';
                break;

            case 'description':
                return 'Descripción';
                break;

            case 'job_status_id':
                return 'Estatus';
                break;

            case 'files':
                return 'Archivos';
                break;

            case 'tracking':
                return 'Tracking';
                break;

            default:
                # code...
                break;
        }
    }
}
