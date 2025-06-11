<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representative;

class RepresentativeController extends Controller
{


public function representativelistAdd()
{
    return view('dataRepresentative.representativelistAdd');
}

public function representativelist()
{
    return view('dataRepresentative.representativelist');
}


public function edit()
{
    return view('dataRepresentative.edit');
}




}
