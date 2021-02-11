<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\ScheduledSession;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

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
        $sessions = ScheduledSession::orderByDesc('id')->paginate(15);
        return view ('admin.schedule.index')->with('sessions', $sessions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.schedule.create');
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
            "service" => ["required", Rule::in(['Basic Polish', 'Shellac', 'Acrylic'])],
            "scheduled_time" => "date_format:d.m.Y|required",
            "time" => "date_format:H:i"
        ]);

        $date = $validatedData['scheduled_time'] . " " . $validatedData['time'];
        $entry = new ScheduledSession();
        $entry->name = $validatedData['name'];
        $entry->phone = $validatedData['phone'];
        $entry->service = $validatedData['service'];
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
        return view ('admin.schedule.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        return view ('admin.schedule.delete');
    }
}
