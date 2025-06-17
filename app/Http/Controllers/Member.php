<?php

namespace App\Http\Controllers;

use App\Models\IncidentContribution;
use App\Models\IncidentRequest;

use App\Models\Representative;
use Illuminate\Http\Request;

class Member extends Model
{
    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    // Optional: Define relationship back if needed
    public function incidentRequests()
    {
        return $this->hasMany(IncidentRequest::class);
    }


}
