<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function showVoterIdForm()
    {
        return view('voting.enter');
    }

    public function validateVoterId(Request $request)
    {
        $request->validate([
            'voter_id' => 'required|string|exists:users,voter_id',
        ]);

        session(['voter_id' => $request->voter_id]);
        return redirect()->route('voting.page');
    }

    public function showVotingPage()
    {
        if (!session()->has('voter_id')) {
            return redirect()->route('voter.enter')->with('error', 'Please enter your Voter ID.');
        }

        $candidates = Candidate::all();
        return view('voting.page', compact('candidates'));
    }

    public function submitVote(Request $request)
    {
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id',
        ]);

        $voterId = session('voter_id');

        if (Vote::where('voter_id', $voterId)->exists()) {
            return redirect()->back()->with('error', 'You have already voted!');
        }

        Vote::create([
            'voter_id' => $voterId,
            'candidate_id' => $request->candidate_id,
        ]);

        session()->forget('voter_id');
        return redirect()->route('voter.enter')->with('success', 'Thank you for voting!');
    }
}
