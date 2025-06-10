@extends('layouts.app')

@section('title', 'Churches')

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
            white-space: nowrap;
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

        @media (max-width: 768px) {
            .d-flex {
                flex-direction: column;
                gap: 10px;
            }

            .form-control.w-50 {
                width: 100% !important;
            }
        }
    </style>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3 flex-wrap">
                <input type="text" id="searchInput" class="form-control w-50 mb-2 mb-md-0" placeholder="Search churches...">
                <a href="{{ route('dataChurch.addchurch') }}" class="btn btn-success">+ Add Church</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-custom" id="membersTable">
                    <thead class="table-primary">
                        <tr>
                            <th><i class="fas fa-edit" title="Edit"></i></th>
                            <th>ID</th>
                            <th>Church Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Pastor</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="{{ route('dataChurch.edit') }}" class="btn btn-warning btn-sm">...</a></td>
                            <td>001</td>
                            <td>Kings Church</td>
                            <td>Bogo City</td>
                            <td>123-456-7890</td>
                            <td>Raymond Bolambao</td>
                            <td><span class="badge-active">Active</span></td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('dataChurch.edit') }}" class="btn btn-warning btn-sm">...</a></td>
                            <td>002</td>
                            <td>Jesus Is Lord</td>
                            <td>Bogo City</td>
                            <td>123-456-7890</td>
                            <td>Miguel Alvarina</td>
                            <td><span class="badge-active">Active</span></td>
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
