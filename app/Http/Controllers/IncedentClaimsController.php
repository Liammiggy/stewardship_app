<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncedentClaims;

class IncedentClaimsController extends Controller
{
   

public function addincidentrequest()
{
    return view('dataIncedentClaims.addincidentrequest');
}

public function incidentlist()
{
    return view('dataIncedentClaims.incidentlist');
}


public function claimsreleasing()
{
    return view('dataIncedentClaims.claimsreleasing');
}

public function edit()
{
    return view('dataIncedentClaims.edit');
}




}
