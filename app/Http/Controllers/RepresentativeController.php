<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Representative;


class RepresentativeController extends Controller
{


public function representativelistAdd()
{
    return view('dataRepresentative.representativelistAdd');
}

public function representativelist()
{
    // return view('dataRepresentative.representativelist');
    $representatives = Representative::all();
    return view('dataRepresentative.representativelist', compact('representatives'));
}


public function edit()
{
    return view('dataRepresentative.edit');
}


public function store(Request $request)
{
    $validatedData = $request->validate([
        'type' => 'required|string|max:255',
        'Representative_name' => 'required|string|max:255',
        'Phone' => 'required|string|regex:/^[0-9+\s()-]+$/|max:20',
        'Email' => 'required|email|max:255',
        'Street' => 'required|string|max:255',
        'Barangay' => 'required|string|max:255',
        'Municipality' => 'required|string|max:255',
        'Province' => 'required|string|max:255',
        'Zipcode' => 'required|string|max:10',
        'Institution_Name' => 'required|string|max:255',
        'photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Handle file upload
    if ($request->hasFile('photo')) {
        $validatedData['photo'] = $request->file('photo')->store('representatives', 'public');
    }

    Representative::create($validatedData);

    return redirect()->route('dataRepresentative.representativelist')
                     ->with('success', 'Representative added successfully.');
}

}
