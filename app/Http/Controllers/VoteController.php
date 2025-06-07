<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function validateUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|string',
        ]);

        $user = User::where('custom_id', $request->user_id)->first();

        if (!$user || $user->has_voted) {
            return redirect()->route('home')->with('error', 'User ID invalid or already used.');
        }

        $request->session()->put('validated_user_id', $user->custom_id);

        return redirect()->route('home')->with('success', 'Validation successful. Please proceed with your nomination.');
    }

    public function submitVote(Request $request)
    {
        $request->validate([
            'user_id' => 'required|string',
            'candidate_name' => 'required|string|max:255',
        ]);

        $user = User::where('custom_id', $request->user_id)->first();

        if (!$user || $user->has_voted) {
            return redirect()->route('home')->with('error', 'User ID invalid or already used.');
        }

        $candidate = Candidate::firstOrCreate(['name' => $request->candidate_name]);
        $candidate->increment('votes');

        $user->update(['has_voted' => true]);

        $request->session()->forget('validated_user_id');

        return redirect()->route('home')->with('success', 'Your nomination has been submitted successfully.');
    }
}
