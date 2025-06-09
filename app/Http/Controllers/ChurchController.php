<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Church;

class ChurchController extends Controller
{
   

public function addchurch()
{
    return view('dataChurch.addchurch');
}

public function churchlist()
{
    return view('dataChurch.churchlist');
}


public function edit()
{
    return view('dataChurch.edit');
}




}
