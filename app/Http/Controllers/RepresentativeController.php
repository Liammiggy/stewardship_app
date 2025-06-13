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


// public function edit()
// {
//     return view('dataRepresentative.edit');
// }

public function edit($id)
{
    $representative = Representative::findOrFail($id);
    return view('dataRepresentative.edit', compact('representative'));
}


public function update(Request $request, $id)
{
    $validated = $request->validate([
        'type' => 'required|string',
        'Representative_name' => 'required|string',
        'Phone' => 'required|string',
        'Email' => 'required|email',
        'Street' => 'required|string',
        'Barangay' => 'required|string',
        'Municipality' => 'required|string',
        'Province' => 'required|string',
        'Zipcode' => 'required|string',
        'Institution_Name' => 'required|string',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $rep = Representative::findOrFail($id);
    $rep->fill($validated);

    if ($request->hasFile('photo')) {
        $filename = time() . '.' . $request->photo->extension();
        $request->photo->storeAs('public/photos', $filename);
        $rep->photo = $filename;
    }

    $rep->save();

    return redirect()->route('dataRepresentative.representativelist')->with('success', 'Representative updated successfully.');
}

 public function getRepresentatives($type)
{
    switch ($type) {
        case 'Pastor':
            $reps = Representative::where('type', 'Pastor')->pluck('Representative_name');
            break;
        case 'Institution':
            $reps = Representative::where('type', 'Institution')->pluck('Representative_name');
            break;
        case 'Individual':
            $reps = Representative::where('type', 'Individual')->pluck('Representative_name');
            break;
        default:
            $reps = collect();
    }

    return response()->json($reps);
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
