<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\JobLog;
use App\Models\User;
use App\Models\Job;
use App\Models\JobStatus;

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
        $job = Job::create(
            [
                'name' => $request->name,
                'priority' => $request->priority,
                'delivery_date' => $request->delivery_date,
                'user_id' => $request->user_id,
                'description' => $request->description,
                'create_user_id' => auth()->user()->id
            ]
        );

        if ($request->file()) {
            $files = [];
            $req_files = $request->file('files');
            foreach ($req_files as $file) {
                $originalName = $file->getClientOriginalName();
                $fileName = time() . '_' . $originalName;
                $filePath = $file->storeAs('uploads/job/'.$job->id, $fileName, 'public');
                $save_file_path = ['path' => '/storage/' . $filePath, 'name' => $originalName];
                array_push($files, $save_file_path);
            }
            $job->files = $files;
            $job->save();
        }

        JobLog::create([
            'job_id' => $job->id,
            'type' => 1,
            'change' => 'Trabajo creado por usuario: '. auth()->user()->name,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('jobs.index');
    }

    public function show(Request $request)
    {
        $job = Job::findOrFail($request->job_id);

        return view('admin.jobs_show', ['job' => $job]);
    }

    public function edit(Request $request)
    {
        $job = Job::findOrFail($request->job_id);
        $responsables = User::select(['id', 'name'])
            ->role('user')
            ->get();
        $estatus = JobStatus::select(['id', 'name', 'color'])
            ->get();

        return view('admin.jobs_edit',
            [
                'job' => $job,
                'responsables' => $responsables,
                'estatus' => $estatus
            ]
        );
    }

    public function update(Request $request)
    {
        $job = Job::findOrFail($request->job_id);

        $job->name = $request->name;
        $job->priority = $request->priority;
        $job->delivery_date = $request->delivery_date;
        $job->user_id = $request->user_id;
        $job->description = $request->description;
        $job->job_status_id = $request->job_status_id;
        $job->tracking = $request->tracking;
        $hasChanges = $job->getDirty();
        $job->save();

        $files = $job->files ?? [];
        $changes = '';

        if (count($hasChanges)) {
            foreach ($hasChanges as $key => $value) {
                $changes .= $this->attributeName($key).', ';
            }
        }

        if ($request->files_del) {
            foreach ($request->files_del as $filedel) {
                $storageName = explode('/', $job->files[$filedel]->path)[5];
                Storage::disk('public')->delete('uploads/job/' . $job->id . '/' . $storageName);
                $files = Arr::except($files, $filedel);
            }

            $files = array_values($files);

            $job->files = $files;
            $changes .= $this->attributeName('files').' borrados, ';
            $job->save();
        }

        if ($request->file()) {
            $req_files = $request->file('files');
            foreach ($req_files as $file) {
                $originalName = $file->getClientOriginalName();
                $fileName = time() . '_' . $originalName;
                $filePath = $file->storeAs('uploads/job/' . $job->id, $fileName, 'public');
                $save_file_path = ['path' => '/storage/' . $filePath, 'name' => $originalName];
                array_push($files, $save_file_path);
            }
            $job->files = $files;
            $job->save();
            $changes .= $this->attributeName('files') . ' cargados, ';
        }

        if (count($hasChanges)) {
            JobLog::create([
                'job_id' => $job->id,
                'type' => 2,
                'change' => $changes. ' - Actualizado por usuario: ' . auth()->user()->name,
                'user_id' => auth()->user()->id
            ]);
        }

        return redirect()->route('jobs.show', $job->id);
    }

    public function attributeName(String $attr) : String
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
