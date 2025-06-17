<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentContribution extends Model
{
    protected $fillable = [
        'incident_request_id', 'member_id', 'amount', 'status'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function incidentRequest()
    {
        return $this->belongsTo(IncidentRequest::class);
    }
}

