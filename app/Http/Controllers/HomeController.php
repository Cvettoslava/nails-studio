<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduledSession;
//use DB;
use App\Models\Service;
use App\Models\Specialist;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = Service::all();
        $specialists = Specialist::with('services')->get();
        return view('home')->with('services', $services)->with('specialists', $specialists);
    }

    public function contact()
    {
        return view('contact');
    }

    public function welcome(){
        $latest_scheduled_sessions = ScheduledSession::orderByDesc('scheduled_time')->with('service')
                                    ->limit(6)
                                    ->get();
                                   
        return view('welcome')->with('sessions', $latest_scheduled_sessions);
    }

    public function nailServices(){
        $services = Service::all();
        $specialists = Specialist::with('services')->get();
        
        return view('nailServices')->with('services', $services)->with('specialists', $specialists);        
    }
    public function hairServices(){
        $services = Service::all();
        $specialists = Specialist::with('services')->get();
        
        return view('nailServices')->with('services', $services)->with('specialists', $specialists);        
    }
    public function skinServices(){
        $services = Service::all();
        $specialists = Specialist::with('services')->get();
        
        return view('nailServices')->with('services', $services)->with('specialists', $specialists);        
    }

}
