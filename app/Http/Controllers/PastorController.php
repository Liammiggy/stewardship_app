<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pastor;

class PastorController extends Controller
{
   

public function addpastor()
{
    return view('dataPastor.addpastor');
}

public function pastorlist()
{
    return view('dataPastor.pastorlist');
}


public function edit()
{
    return view('dataPastor.edit');
}




}
