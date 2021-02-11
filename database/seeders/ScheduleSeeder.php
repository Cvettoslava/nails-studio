<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\ScheduledSession;
use Carbon\Carbon;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = ["Катя", "Ивана", "Дияна", "Силвия", "Славена"];
        $services = ['Basic Polish', 'Shellac', 'Acrylic'];
        
        foreach($users as $user) {
            $session = new ScheduledSession();
            $session->name = $user;
            $session->phone = "08" . rand(7, 9) . rand(1000000, 9999999);
            $session->service = $services[rand(0, 2)];
            $session->scheduled_time = new Carbon(rand(1, 28). '.02.2021 '.rand(8,17).":00");
            $session->save();
        }
        //
    }
}
