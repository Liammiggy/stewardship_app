<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contribution;

class ContributionController extends Controller
{
   

public function addcontribution()
{
    return view('dataContribution.addcontribution');
}

public function add_Incedent_contribution()
{
    return view('dataContribution.add_Incedent_contribution');
}


public function add_Incedent_contribution_payment()
{
    return view('dataContribution.add_Incedent_contribution_payment');
}




public function contributionlist()
{
    return view('dataContribution.contributionlist');
}


public function edit()
{
    return view('dataContribution.edit');
}
public function printpreview()
{
    return view('dataContribution.printpreview');
}




}
