<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Admincontroller extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            
            if ($usertype == 'user') {
                return view('dashboard'); // Pass user data to the view
            } else if ($usertype == 'admin') {
                return view('admin.adminpanel'); // Pass user data to the view
            }
        }
    }
    public function judge() {
        return view('admin.judge');
    }

    public function committee() {
        return view('admin.committee');
    }

    public function organizer() {
        return view('admin.organizer');
    }
    
    public function event() {
        return view('admin.event');
    }
}
