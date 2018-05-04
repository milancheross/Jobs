<?php

namespace App\Http\Controllers;

use App\Job;
use App\Mail\ModerationMail;
use Bogdanpet\Datatables\Datatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JobsController extends Controller
{

    public function create()
    {

        return view('createJob');
    }

    public function save(Job $job, Request $request)
    {

        $validateData = $request->validate([
            "title" => 'required|min:3|max:191',
            "email" => 'required|email',
            "description" => 'required'
        ]);

        $user_jobs = Job::where('user_id', Auth::id())->count();

        if ($user_jobs > 0) {
            $job->published = 1;
        }

        $job->title = $request->title;
        $job->email = $request->email;
        $job->description = $request->description;
        $job->user_id = Auth::id();
        $job->save();

        // Mail::to($request->email)->send(new ModerationMail());

        return redirect('/');
    }

    public function moderation(Datatable $datatable)
    {
        $jobs = Job::paginate(10);
        $datatable->setData($jobs);
        $datatable->setColumns(['id', 'title', 'email', 'description', 'published', 'actions']);
        $datatable->setActions([
            ['Approve', '/job/approve/{id}', ['class' => 'table-action']]
        ]);
        return view('moderation', compact('datatable'));
    }

    public function approve($id)
    {
        $job = Job::find($id);
        $job->published = 1;
        $job->update();
        return redirect('/jobs/moderation');
    }

}

