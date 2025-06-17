@extends('layouts.app')
@section('title', 'Individual Savings & Contributions Posted')

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
                <input type="text" id="searchInput" class="form-control" placeholder="Select Member...">
            </div>
            <div class="col-md-3 mb-2">
                <select id="SavingsFilter" class="form-control">
                    <option value="">Savings Type</option>
                    <option value="Approved">Wedding</option>
                    <option value="Approved">Maternity</option>
                    <option value="Approved">College Education</option>
                    <option value="For Release">Retirement</option>
                </select>
            </div>
            <div class="col-md-3 mb-2">
                <input type="date" id="dateFilter" class="form-control">
            </div>
            <div class="col-md-2 text-md-right mb-2">
                <a href="{{ route('dataContribution.addcontribution') }}" class="btn btn-success btn-block">+ Add Savings</a>
            </div>
        </div>


        <div class="card mb-4">
    <div class="card-header bg-white">
        <h5 class="mb-0">Contribution Summary</h5>
    </div>
    <div class="card-body p-3">
        <div class="row g-3">
            <!-- Wedding -->
            <div class="col-md-2">
                <div class="card border-left-primary shadow-sm h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Wedding</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">₱0.00</div>
                        </div>
                        <i class="fas fa-ring fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>

            <!-- Maternity -->
            <div class="col-md-2">
                <div class="card border-left-info shadow-sm h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Maternity</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">₱1,200.00</div>
                        </div>
                        <i class="fas fa-baby fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>

            <!-- College Education -->
            <div class="col-md-2">
                <div class="card border-left-success shadow-sm h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">College</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">₱200.00</div>
                        </div>
                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>

            <!-- Retirement -->
            <div class="col-md-2">
                <div class="card border-left-warning shadow-sm h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Retirement</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">₱850.00</div>
                        </div>
                        <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>

            <!-- Emergency -->
            <div class="col-md-2">
                <div class="card border-left-danger shadow-sm h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Emergency</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">₱300.00</div>
                        </div>
                        <i class="fas fa-ambulance fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>



            <!-- Total Contributions -->
            <div class="col-md-2">
                <div class="card border-left-dark shadow-sm h-100 bg-active text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total</div>
                            <div class="h6 mb-0 font-weight-bold">₱3,050.00</div>
                        </div>
                        <i class="fas fa-coins fa-2x text-white-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


        {{-- Summary Card --}}
        <div class="card mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <div class="mb-2 mb-md-0">
                    <h5 class="mb-1">Savings Type</h5>
                    <h3 class="mb-0">College Education</h3>
                </div>
                <div class="text-md-right">
                    <div class="text-muted">Total Contribution</div>
                    <h3 class="text-success mb-0">₱200.00</h3>
                </div>
            </div>
        </div>

        {{-- Responsive Table --}}
        <div class="table-responsive">
            <table class="table table-hover table-custom" id="membersTable">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Date Posted</th>
                        <th>Amount Paid</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>6-9-2025</td>
                        <td>₱200.00</td>
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
