<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Specialist;
use App\Models\Service;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\AdminMiddleware::class);
    }

    public function dashboard(){
        return view('admin.dashboard');
    }
    public function createService(){
        $specialists = Specialist::all();

        return view ('admin.createService')->with ('specialists', $specialists);
    }

    public function storeService(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|max:50",
            "price" => "required",
            "duration" => ["required"],
        ]);

        $entry = new Service();
        $entry->name = $validatedData['name'];
        $entry->price = $validatedData['price'];
        $entry->duration = $validatedData['duration'];
        $entry->save();

        return redirect()->route('home');
    }


    public function editService($id)
    {
        /*$services = Service::all();
        $specialists = Specialist::with('services')->get();*/

        $service = Service::find($id);

        echo $service;
    
        return view('admin.editService')->with('service', $service);//->with ('services',$services)->with ('specialists',$specialists);
    }

    public function updateService(Request $request, $id)
    {
        $validatedData = $request->validate([
            "name" => "required|max:50",
            "price" => "required",
            "duration" => ["required"],
        ]);

        $entry = Service::find($id);
        $entry->name = $validatedData['name'];
        $entry->price = $validatedData['price'];
        $entry->duration = $validatedData['duration'];
        $entry->save();

        return redirect()->route('home');
    }

    public function destroyService($id)
    {
        $service = Service:: find($id);
        $service->delete();

        return redirect()->route('home');
    }

    public function deleteService($id)
    {
        $service = Service:: find($id);
        return view ('admin.deleteService')-> with ('service', $service );
    }
}
