<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Event;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotingController extends Controller
{
    public function show(Event $event)
    {
        $event->load('candidates');
        
       $hasVoted = Vote::where('user_id', auth()->id())->where('event_id', $event->id)->exists();

       return view('voting.show',compact('event','hasVoted'));

      
    }

    public function vote(Request $request, Event $event)
    {
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id'
        ]);
        
        $candidate = Candidate::find($request->candidate_id);
        if(!$candidate || $candidate->event_id !== $event->id){
            return back()->with('error', 'kandidat tidak valid untuk event ini');
        }

        $existingVote = Vote::where('user_id',Auth::id())->where('event_id', $event->id)->first();

        if($existingVote) {
            return back()->with('error','Anda hanya bisa memberikan satu suara');
        }
        Vote::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
            'candidate_id' => $request->candidate_id
        ]);
        return back()->with('success','suara anda berhasil dicatat');

    }
}