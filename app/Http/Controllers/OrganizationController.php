<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
   

public function addorganization()
{
    return view('dataOrganization.addorganization');
}

public function organizationlist()
{
    return view('dataOrganization.organizationlist');
}


public function edit()
{
    return view('dataOrganization.edit');
}




}
