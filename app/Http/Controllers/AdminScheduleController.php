<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\ScheduledSession;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\Service;
use App\Models\Specialist;

class AdminScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\AdminMiddleware::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = ScheduledSession::orderBy('scheduled_time')->paginate(15);
        echo $sessions;
        return view ('admin.schedule.index')->with('sessions', $sessions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialists = Specialist::with('services')->get();
        $services = Service::all();

        return view ('admin.schedule.create')->with ('specialists', $specialists)->with ('services', $services);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|max:50",
            "phone" => "required|regex:/^08\d{8}$/i",
            "service_id" => ["required"],
            "specialist_id" => ["required"],
            "scheduled_time" => "date_format:d.m.Y|required",
            "time" => "date_format:H:i"
        ]);

        $date = $validatedData['scheduled_time'] . " " . $validatedData['time'];
        $entry = new ScheduledSession();
        $entry->name = $validatedData['name'];
        $entry->phone = $validatedData['phone'];
        $entry->service_id = $validatedData['service_id'];
        $entry->specialist_id = $validatedData['specialist_id'];
        $entry->scheduled_time = new Carbon($date);
        $entry->name = $validatedData['name'];
        $entry->save();

        return redirect()->route('schedule.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Service::all();
        $specialists = Specialist::with('services')->get();

        $session = ScheduledSession:: find($id);
        $time = Carbon::createFromFormat('Y-m-d H:i:s', $session->scheduled_time)->format('H:i');

        echo $session;
    
        return view('admin.schedule.edit')->with('session', $session)->with('time', $time)->with ('services',$services)
        ->with ('specialists',$specialists);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            "name" => "required|max:50",
            "phone" => "required|regex:/^08\d{8}$/i",
            "service_id" => ["required"],
            "specialist_id" => ["required"],
            "scheduled_time" => "date_format:d.m.Y|required",
            "time" => "date_format:H:i"
        ]);

        $date = $validatedData['scheduled_time'] . " " . $validatedData['time'];
        $entry = ScheduledSession::find($id);
        $entry->name = $validatedData['name'];
        $entry->phone = $validatedData['phone'];
        $entry->service_id = $validatedData['service_id'];
        $entry->specialist_id = $validatedData['specialist_id'];
        $entry->scheduled_time = new Carbon($date);
        $entry->name = $validatedData['name'];
        $entry->save();

        return redirect()->route('schedule.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = ScheduledSession:: find($id);
        $session->delete();

        return redirect()->route('schedule.index');
    }

    public function delete($id)
    {
        $session = ScheduledSession:: find($id);
        return view ('admin.schedule.delete')-> with ('session', $session );
    }
}
