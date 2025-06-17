<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class IncidentRequest  extends Model
{
    protected $table = 'incident_request'; // ✅ match your table name

    protected $fillable = [
        'member_id',
        'incident_title',
        'incident_type',
        'daterequested',
        'status',
        'representative_type',
        'representative_name',
        'reason',
    ];



//     public function member()
// {
//     return $this->belongsTo(Member::class, 'member_id');
// }

// public function member()
// {
//     return $this->belongsTo(Member::class);
// }

public function member()
{
    return $this->belongsTo(Member::class);
}


}

