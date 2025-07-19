<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Models\Event;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ResultController extends Controller
{
    public function show(Event $event)
    {
    $candidatesWithVotes = Candidate::withCount('votes')->where('event_id' . $event->Id)->orderByDesc('votes_count')->get();

    $title = 'Hasil' . $event->title;
    $eventEnded = $event->end_time->isPast();
    $totalVotes = $event->votes()->count();
    return view('results.show',compact('title','event','candidatesWithVotes','eventEnded','totalVotes'));
    }

    public function index()
    {
        
        $title = 'Event';
        $Users = User::all();
        $Events = Event::all();
        $Votes = Vote::all();
        $activeEventCount = Event::where('start_time','<=',Carbon::now())->where('end_time', '>=',Carbon::now())->count();
        
        return view('results.index',compact('title','Users','Events','Votes','activeEventCount'));
    }   
}