<?php

namespace App\Http\Controllers;

use App\Models\IncidentContribution;
use App\Models\IncidentRequest;
use App\Models\Member;
use App\Models\Representative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncidentContributionController extends Controller
{
    public function getApprovedRequests()
    {
        return response()->json(
            IncidentRequest::where('status', 'approved')->with('member')->get()
        );
    }

    public function getIncidentById($id)
    {
        return response()->json(IncidentRequest::findOrFail($id));
    }

    public function getMembersByRepresentative(Request $request)
    {
        $repId = $request->input('rep_id');

        $members = Member::where('representative_id', $repId)
            ->with('incident_contribution') // Adjust as needed if this is a hasMany or hasOne
            ->get();

        return response()->json(['members' => $members]);
    }

    public function getMembersByIncident(Request $request)
{
    $repId = $request->input('rep_id');
    $incidentId = $request->input('incident_request_id');

    if (!$repId || !$incidentId) {
        return response()->json(['error' => 'rep_id and incident_request_id are required'], 400);
    }

    $members = DB::table('representatives as r')
        ->join('members as m', function ($join) {
            $join->on('m.representative_name', '=', 'r.Representative_name')
                 ->on('m.representative_type', '=', 'r.type');
        })
        ->leftJoin('incident_contributions as ic', function ($join) use ($incidentId) {
            $join->on('ic.member_id', '=', 'm.id')
                 ->where('ic.incident_request_id', '=', $incidentId);
        })
        ->where('r.id', $repId)
        ->select(
            'm.id as member_id',
            DB::raw("CONCAT(m.first_name, ' ', m.last_name) as name"),
            'm.representative_name',
            'm.representative_type',
            DB::raw("'$incidentId' as incident_request_id"),
            DB::raw("COALESCE(ic.status, 'unpaid') as status"),
            DB::raw("COALESCE(ic.amount, 0.00) as amount_paid")
        )
        ->get();

    return response()->json(['members' => $members]);
}

    public function getRepresentatives()
    {
          return Representative::select('id', 'Representative_name as name')->get();
    }

    public function storeContribution(Request $request)
    {
        $request->validate([
            'incident_request_id' => 'required|exists:incident_request,id',
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric|min:0.01',
        ]);

        IncidentContribution::updateOrCreate(
            [
                'incident_request_id' => $request->incident_request_id,
                'member_id' => $request->member_id
            ],
            [
                'amount' => $request->amount,
                'status' => 'paid'
            ]
        );

        return back()->with('success', 'Contribution recorded successfully.');
    }

    public function addContributionForm($member_id, $incident_id)
    {
        $member = Member::findOrFail($member_id);
        $incident = IncidentRequest::findOrFail($incident_id);
        return view('contributions.add', compact('member', 'incident'));
    }
}
