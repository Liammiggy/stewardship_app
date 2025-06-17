<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Representative;
use Carbon\Carbon;




class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $members = Member::orderBy('created_at', 'Asc')->get();
    return view('dataMahasiswa.index', compact('members'));
    }


//      public function memberlist()
// {
//     $mahasiswa = Mahasiswa::orderBy('created_at', 'Asc')->get();
//     return view('dataMahasiswa.memberlist', compact('mahasiswa'));
// }

public function bulkupload()
{
    return view('dataMahasiswa.bulkupload');
}

public function addpayment()
{
    return view('dataMahasiswa.addpayment');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dataMahasiswa.create');
    }

      public function edit()
    {

        return view('dataMahasiswa.edit');
    }


public function store(Request $request)
{
    $validated = $request->validate([
        'photo' => 'nullable|image|max:2048',
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'last_name' => 'required|string|max:255',
        'suffixes' => 'nullable|string|max:10',
        'parents_name' => 'nullable|string|max:255',
        'immediate_contact' => 'nullable|string|max:255',
        'address' => 'required|string|max:255',
        'geography' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:255',
        'facebook' => 'nullable|string|max:255',
        'birthday' => 'nullable|date',
        'membership_type' => 'required|string',
        'representative_type' => 'required|in:Pastor,Institution,Individual',
        'representative_name' => 'required|string|max:255',
        'beneficiaries_1' => 'nullable|array',
        'beneficiaries_2' => 'nullable|string|max:255',
    ]);

    // Check for duplicate member
    $duplicate = Member::where('first_name', $validated['first_name'])
        ->where('middle_name', $validated['middle_name'])
        ->where('last_name', $validated['last_name'])
        ->exists();

    if ($duplicate) {
        return redirect()->back()
            ->withInput()
            ->withErrors(['duplicate' => 'A member with the same name already exists.']);
    }

    if ($request->hasFile('photo')) {
        $validated['photo'] = $request->file('photo')->store('photos', 'public');
    }

    $validated['age'] = $request->birthday ? Carbon::parse($request->birthday)->age : null;
    $beneficiaries = $request->input('beneficiaries', []);
    $validated['beneficiary_1'] = $beneficiaries[0] ?? null;
    $validated['beneficiary_2'] = $beneficiaries[1] ?? null;
    $validated['beneficiary_3'] = $beneficiaries[2] ?? null;
    $validated['beneficiary_4'] = $beneficiaries[3] ?? null;
    $validated['beneficiary_5'] = $beneficiaries[4] ?? null;
    $validated['beneficiary_6'] = $beneficiaries[5] ?? null;

    Member::create($validated);

    return redirect()->route('dataMahasiswa.index')->with('success', 'Member successfully added!');


}


// public function getMembers(Request $request) {
//     $search = $request->search;

//     $results = DB::table('members')
//         ->where('name', 'LIKE', "%{$search}%")
//         ->pluck('name'); // Or ->get() for full records

//     return response()->json($results);
// }


public function getMembers(Request $request)
{
    $search = $request->input('search');

    $members = DB::table('members')
        ->select(
            'id',
            DB::raw("CONCAT_WS(' ', first_name, middle_name, last_name, suffixes) AS full_name")
        )
        ->when($search, function ($query, $search) {
            $query->where(DB::raw("CONCAT_WS(' ', first_name, middle_name, last_name, suffixes)"), 'like', '%' . $search . '%');
        })
        ->get();

    return response()->json($members);
}

public function countMembers()
{
    $total = DB::table('members')->count();
    return response()->json(['total' => $total]);
}

public function countMemberTypes()
{
    $counts = DB::table('members')
        ->select(
            DB::raw("SUM(CASE WHEN membership_type = 'initial' THEN 1 ELSE 0 END) as initial_count"),
            DB::raw("SUM(CASE WHEN membership_type = 'renewal' THEN 1 ELSE 0 END) as renewal_count")
        )
        ->first();

    return response()->json([
        'initial' => $counts->initial_count,
        'renewal' => $counts->renewal_count,
    ]);
}




public function incidentContribution()
{
    return $this->hasOne(IncidentContribution::class);
}


public function getByRepresentative(Request $request)
{
    $request->validate([
        'rep_name' => 'required|string'
    ]);

    $members = Member::where('representative_name', $request->rep_name)
        ->select('id', 'first_name', 'last_name', 'address', 'representative_name')
        ->get()
        ->map(function ($member) {
            return [
                'id' => $member->id,
                'full_name' => $member->first_name . ' ' . $member->last_name,
                'address' => $member->address,
                'representative_name' => $member->representative_name,
            ];
        });

    return response()->json(['members' => $members]);
}


}
