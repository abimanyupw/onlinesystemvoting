<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $title = 'Dashboard';
        $Users = User::all();
        $Events = Event::all();
        $Votes = Vote::all();
        $activeEventCount = Event::where('start_time','<=',Carbon::now())->where('end_time', '>=',Carbon::now())->count();
        
        return view('dashboard.index',compact('title','Users','Events','Votes','activeEventCount'));
    }   
}