<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvitationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class InvitationController extends Controller
{
    public function sendInvitation(InvitationRequest $request)
    {
        $email = $request->input('email');
        $client = $request->input('client');
        $inviterName = Auth::user()->name; // Get the name of the currently authenticated user
        $role = Auth::user()->roles->first()->name ?? null; // Get the role of the currently authenticated user
        $role = ucfirst($role); // Capitalize the first letter of the role

        Mail::to($email)->queue(new \App\Mail\InvitationMail($email, $client, $inviterName, $role));
    }

    public function acceptInvitation(Request $request)
    {
        Log::info('here in controller');

        $user = User::whereEmail($request->input('email'))->whereName($request->input('name'))->first();

        if($user)
            {
                return redirect()->route('login')->with('error', 'You have already accepted the invitation. Please log in.');
            }
            else
            {
                User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                ]);
            }

        return redirect()->route('login')->with('success', 'Invitation accepted successfully. Please log in.');
    }
}
