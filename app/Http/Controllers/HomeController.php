<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('home');
    }

    public function settings()
    {
        if (Gate::allows('be-organizer')) {
          return view('settings.organizer');
        }

        if (Gate::allows('be-participant')) {
          return view('settings.participant');
        }
    }

    public function premium()
    {
        $this->authorize('premium-access');
        return 'Halaman premium...';
    }
}
