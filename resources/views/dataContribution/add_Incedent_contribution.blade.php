@extends('layouts.app')
@section('title', 'Incident Contributions')

@section('contents')
<style>
    table.table-custom tr:nth-child(even) { background-color: #f9f9f9; }
    table.table-custom tr:nth-child(odd) { background-color: #ffffff; }
    table.table-custom td, table.table-custom th {
        padding-top: 6px;
        padding-bottom: 6px;
        vertical-align: middle;
    }
    .badge-active {
        background-color: #28a745;
        color: #fff;
        padding: 5px 10px;
        border-radius: 12px;
    }
    .badge-inactive {
        background-color: #dc3545;
        color: #fff;
        padding: 5px 10px;
        border-radius: 12px;
    }
</style>

<div class="card">
    <div class="card-body">
        <div class="row align-items-center mb-3">
            <div class="col-md-4 mb-2">
                <label for="requestee" class="form-label">Requestee</label>
                <select id="requestee" name="requestee" class="form-control">
                    <option value="">Select Requestee</option>
                </select>
            </div>

            <div class="col-md-3 mb-2">
                <label for="incident_title" class="form-label">Incident Title</label>
                <input type="text" id="incident_title" class="form-control" readonly>
            </div>

            <div class="col-md-3 mb-2">
                <label for="incident_type" class="form-label">Incident Type</label>
                <input type="text" id="incident_type" class="form-control" readonly>
            </div>

            <div class="col-md-3 mb-2">
                <label for="representative" class="form-label">Representative</label>
                <select id="representative" name="representative" class="form-control">
                    <option value="">Select Representative</option>
                </select>
            </div>

            <div class="col-md-2 mb-2">
                <label class="form-label d-block" style="visibility: hidden;">Button</label>
                <button type="button" id="viewMembersBtn" class="btn btn-primary w-100">View Members</button>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <div class="mb-2 mb-md-0">
                    <h5 class="mb-1">Incident Title:</h5>
                    <h3 class="mb-0" id="summaryTitle">---</h3>
                </div>
                <div class="text-md-right">
                    <div class="text-muted">Total Contribution</div>
                    <h3 class="text-success mb-0" id="summaryTotal">₱0.00</h3>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-custom" id="membersTable">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Member Name</th>
                        <th>Address</th>
                         <th>Representative</th>
                        <th>Amount Paid</th>

                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="membersTbody">
                    <tr><td colspan="7" class="text-center text-muted">No members loaded.</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        let selectedIncidentId = null;

        // Load requestees
        $.get('/get-approved-requests', function (data) {
            $('#requestee').empty().append('<option value="">Select Requestee</option>');
            data.forEach(req => {
                const fullName = `${req.member?.first_name ?? 'Unknown'} ${req.member?.last_name ?? ''}`;
                $('#requestee').append(`<option value="${req.id}">${fullName}</option>`);
            });
        }).fail(function () {
            alert("Failed to load requestees.");
        });

        // Load representatives
        $.get('/get-representatives', function (data) {
            $('#representative').empty().append('<option value="">Select Representative</option>');
            if (data.length === 0) {
                $('#representative').append('<option disabled>No representatives found</option>');
            } else {
               data.forEach(rep => {
    $('#representative').append(`<option value="${rep.id}">${rep.name}</option>`);
});

            }
        }).fail(function () {
            alert("Failed to load representatives.");
        });

        // On selecting a requestee
        $('#requestee').on('change', function () {
            const id = $(this).val();
            selectedIncidentId = id;
            if (!id) return;

            $.get(`/incident-request/${id}`, function (data) {
                $('#incident_title').val(data.incident_title ?? '');
                $('#incident_type').val(data.incident_type ?? '');
                $('#summaryTitle').text(data.incident_title ?? '---');
            }).fail(function () {
                alert("Failed to load incident details.");
            });
        });

        // On clicking "View Members"
        $('#viewMembersBtn').on('click', function () {
            const repId = $('#representative').val();

            if (!repId || !selectedIncidentId) {
                alert('Please select both representative and incident.');
                return;
            }

            $.ajax({
                url: '/get-members-by-incident',
                type: 'POST',
                data: {
                    rep_id: repId,
                    incident_request_id: selectedIncidentId
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (response) {
                    let rows = '';
                    let total = 0;

                    if (!response.members || response.members.length === 0) {
                        rows = '<tr><td colspan="7" class="text-center text-muted">No members found.</td></tr>';
                    } else {
                       response.members.forEach(member => {
                        const contribution = parseFloat(member.amount ?? 0);
                        total += contribution;
                        const status = member.status === 'paid' ? 'Paid' : 'Unpaid';
                        const badgeClass = member.status === 'paid' ? 'badge-active' : 'badge-inactive';

                        rows += `
                            <tr>
                                <td>${member.member_id}</td> <!-- FIXED: was member.id -->
                                <td>${member.name}</td>
                                <td>${member.address ?? 'N/A'}</td>
                                <td>${member.representative_name} (${member.representative_type})</td>
                                 <td>₱${parseFloat(member.amount_paid).toFixed(2)}</td>

                                <td>
                                    <a href="/add-contribution/${member.member_id}/${selectedIncidentId}" class="btn btn-success btn-sm">Add Contribution</a>
                                </td>
                                <td><span class="${badgeClass}">${status}</span></td>
                            </tr>
                        `;
                    });

                    }

                    $('#membersTbody').html(rows);
                    $('#summaryTotal').text(`₱${total.toLocaleString(undefined, { minimumFractionDigits: 2 })}`);
                },
                error: function (xhr, status, error) {
                    alert('Error loading members: ' + error);
                }
            });
        });
    });
</script>
@endsection
