<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Organizer;

class OrgController extends Controller
{
    public function create(Request $request) {
        Organizer::create($request->all());
        return redirect()->route('admin.organizer');
    }

    public function showLoginForm()
    {
        return view('auth.login_org');
    }

    public function login(Request $request)
    {

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication succeeded
            return redirect()->route('organizer.dashboard'); // Redirect to your dashboard or another route
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
            // dd('Authentication failed');
        }
    }

    /**
     * Show the dashboard after successful login.
     */
    public function dashboard()
    {
        return view('organizer.dashboard'); // Adjust the view file path based on your structure
    }

    /**
     * Log the user out and redirect to the login form.
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.login_org'); // Change this to your login route
    }
}
