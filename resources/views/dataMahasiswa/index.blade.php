@extends('layouts.app')

@section('title', 'Memberships')

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

        @media (max-width: 576px) {
            .d-flex.justify-content-between {
                flex-direction: column;
                gap: 10px;
            }

            .d-flex .form-control {
                width: 100% !important;
            }

            .d-flex .btn {
                width: 100%;
            }

            .table-responsive {
                font-size: 14px;
            }
        }
    </style>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3 flex-wrap gap-2">
                <input type="text" id="searchInput" class="form-control w-50" placeholder="Search members...">
                <a href="{{ route('dataMahasiswa.create') }}" class="btn btn-success">+ Add Member</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-custom" id="membersTable">
                    <thead class="table-primary">
                        <tr>
                            <th><i class="fas fa-edit" title="Edit"></i></th>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Retirement Age</th>
                            <th>Phone</th>
                            <th>Representative</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($members as $mhs)
                            <tr>
                                <td>
                                    <a href="{{ route('dataMahasiswa.edit', $mhs->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>{{ $mhs->id }}</td>
                                <td>{{ $mhs->first_name }}</td>
                                <td>{{ $mhs->last_name }}</td>
                                <td>{{ $mhs->retirement_age ?? 'N/A' }}</td>
                                <td>{{ $mhs->phone }}</td>
                                <td>{{ $mhs->representative_name ?? '—' }}</td>
                                <td>
                                    <a href="{{ route('dataMahasiswa.addpayment', $mhs->id) }}" class="btn btn-success btn-sm">
                                        Add Contribution
                                    </a>
                                </td>
                                <td>
                                    @if ($mhs->status === 'active')
                                        <span class="badge-active">Active</span>
                                    @elseif ($mhs->status === 'inactive')
                                        <span class="badge-inactive">Inactive</span>
                                    @else
                                        <span class="badge-pending">Pending</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No members found.</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <script>
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
