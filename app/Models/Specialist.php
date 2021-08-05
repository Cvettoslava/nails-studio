<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\ScheduledSession;
use App\Models\Service;

class Specialist extends Model
{
    use HasFactory;
    public function services()
    {
        return $this->belongsToMany(Service::class,'service_specialist', 'specialist_id', 'service_id');
    }
}