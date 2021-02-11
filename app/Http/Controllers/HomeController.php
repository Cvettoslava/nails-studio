<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduledSession;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome(){
        $latest_scheduled_sessions = ScheduledSession::orderByDesc('scheduled_time')
                                    ->limit(6)
                                    ->get();
        return view('welcome')->with('sessions', $latest_scheduled_sessions);
    }
}
