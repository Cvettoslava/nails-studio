<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ScheduledSession;
use App\Models\Specialist;


class Service extends Model
{
    use HasFactory;
    
    public function ScheduledSessions()
    {
        return $this->hasMany(ScheduledSession::class);
    }

    public function specialists()
    {
        return $this->belongsToMany(Specialist::class,'service_specialist');
    }

    public function category()
    {
        
        return $this->belongsTo(Category::class);
    }

}
