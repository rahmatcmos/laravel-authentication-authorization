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

    public function editEvent($id)
    {
        $event = \App\Event::findOrFail($id);
        $this->authorize('edit-event', $event);
        return "Anda sedang mengakses halaman edit event " . $event->name;
    }

    public function joinEvent($id)
    {
        $event = \App\Event::findOrFail($id);
        $this->authorize('join-event', $event);
        return "Anda sedang mengakses halaman join event " . $event->name;
    }
}
