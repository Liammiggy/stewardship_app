@extends('layouts.app')
@section('title', 'Incident Contribution')

@section('contents')
<style>
    table.table-custom tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    table.table-custom tr:nth-child(odd) {
        background-color: #ffffff;
    }
    table.table-custom td,
    table.table-custom th {
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
        background-color: #6c757d;
        color: #fff;
        padding: 5px 10px;
        border-radius: 12px;
    }
    .badge-pending {
        background-color: #ffc107;
        color: #212529;
        padding: 5px 10px;
        border-radius: 12px;
    }
</style>

<div class="card">
    <div class="card-body">

        {{-- Filters --}}
        <div class="row align-items-center mb-3">
            <div class="col-md-4 mb-2">
                <input type="text" id="searchInput" class="form-control" placeholder="Select Pastor...">
            </div>
            <div class="col-md-3 mb-2">
                <select id="SavingsFilter" class="form-control">
                    <option value="">Incedent Title</option>
                    <!-- <option value="Approved">College Education</option>
                    <option value="For Release">Retirement</option> -->
                </select>
            </div>
                       <div class="col-md-3 mb-2">
                <select id="SavingsFilter" class="form-control">
                    <option value="">Incedent Type</option>
                    <!-- <option value="Approved">College Education</option>
                    <option value="For Release">Retirement</option> -->
                </select>
            </div>
           
        </div>

        {{-- Summary Card --}}
        <div class="card mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <div class="mb-2 mb-md-0">
                    <h5 class="mb-1">Incident Title:</h5>
                    <h3 class="mb-0">Ramon - Outpatient Minor Surgery</h3>
                </div>
                <div class="text-md-right">
                    <div class="text-muted">Total Contribution</div>
                    <h3 class="text-success mb-0">₱35000.00</h3>
                </div>
            </div>
        </div>

        {{-- Responsive Table --}}
        <div class="table-responsive">
           <table class="table table-hover table-custom" id="membersTable">
                <thead class="table-primary">
                    <tr> 

                        <th>ID</th>
                        <th>Member Name</th>
                        <th>Address</th>
                        <th>Amount Paid</th>
                        <th>Pastor</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                        <td>001</td>
                        <td>John Doe</td>
                        <td>Bogo City</td>
                        <td>35000</td>
                        <td>Rev. Smith</td>
                        <td>
                            <!-- <a href="#" class="btn btn-primary btn-sm">Detail</a> -->
                           
                            <a href="{{ route('dataContribution.add_Incedent_contribution_payment') }}" class="btn btn-success btn-sm">Add Contribution</a>
                        </td>
                        <td><span style="color: white; padding: 0.25em 0.6em; border-radius: 0.25rem;" class="badge-active">Paid</span></td>
                    </tr>
                    <tr>
                       
                        <td>002</td>
                        <td>Jane Doe</td>
                        <td>Bogo City</td>
                        <td>0.00</td>
                        <td>Rev. Smith</td>
                        <td>
                            <!-- <a href="#" class="btn btn-primary btn-sm">Detail</a> -->
                           
                           <a href="{{ route('dataContribution.add_Incedent_contribution_payment') }}" class="btn btn-success btn-sm">Add Contribution</a>                        </td>
                        <td>
                        <span style="background-color: red; color: white; padding: 0.25em 0.6em; border-radius: 0.25rem;">
                           Unpaid
                        </span>
                        </td>


                    </tr>
                    
                </tbody>
            </table>
        </div>

    </div>
</div>

<script>
    // Simple client-side search filter
    document.getElementById('searchInput').addEventListener('keyup', function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#membersTable tbody tr');
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection
