<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\IncidentRequest;

class IncedentClaimsController extends Controller
{

public function create()
{
    return view('dataIncedentClaims.create');
}



public function store(Request $request)
{
    $request->validate([
        'member_id' => 'required|exists:members,id',
        'incident_title' => 'required|string|max:255',
        'incident_type' => 'required|string|max:255',
        'daterequested' => 'required|date',
        'status' => 'nullable|string',
        'representative_type' => 'nullable|string',
        'representative_name' => 'nullable|string',
        'reason' => 'nullable|string',

    ]);

    $incident = new IncidentRequest();
    $incident->member_id = $request->member_id;
    $incident->incident_title = $request->incident_title;
    $incident->incident_type = $request->incident_type;
    $incident->daterequested = $request->daterequested;
    $incident->status = $request->status;
    $incident->representative_type = $request->representative_type;
    $incident->representative_name = $request->representative_name;
    $incident->reason = $request->reason;
    $incident->save();



    return redirect()->route('dataIncedentClaims.incidentlist')->with('success', 'Incident saved!');
}





public function incidentlist()
{
    // return view('dataIncedentClaims.incidentlist');

    // $incidents = IncidentRequest::all();
    $incidents = IncidentRequest::with('member')->get();
    return view('dataIncedentClaims.incidentlist', compact('incidents'));

}


public function claimsreleasing()
{
    return view('dataIncedentClaims.claimsreleasing');
}

public function edit()
{
    return view('dataIncedentClaims.edit');
}
public function printpreview()
{
    return view('dataIncedentClaims.printpreview');
}




}
