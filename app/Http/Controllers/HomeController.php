<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs=Job::wherePublished(1)->orderBy('created_at','desc')->get();
        return view('home',compact('jobs'));
        }
}
