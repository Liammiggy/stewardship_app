@extends('layouts.app')

@section('title', 'Representatives')

@section('contents')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

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
                <input type="text" id="searchInput" class="form-control w-50 mb-2 mb-md-0" placeholder="Search Representative...">
                <a href="{{ route('dataRepresentative.representativelistAdd') }}" class="btn btn-success">+ Add Representative</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-custom" id="membersTable">
                    <thead class="table-primary">
                        <tr>
                            <th><i class="fas fa-edit" title="Edit"></i></th>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Representative Name</th>
                            <th>Affiliation</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($representatives as $rep)
                            <tr>
                                <td>
                                    <a href="{{ route('dataRepresentative.edit', ['id' => $rep->id]) }}" class="btn btn-warning btn-sm">...</a>
                                </td>
                                <td>{{ str_pad($rep->id, 3, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $rep->type }}</td>
                                <td>{{ $rep->Representative_name }}</td>
                                <td>{{ $rep->Institution_Name ?? '—' }}</td>
                                <td>{{ $rep->Phone }}</td>
                                <td>
                                    <span class="badge-active">Active</span> {{-- You can change this logic to use real status field --}}
                                </td>
                            </tr>
                        @endforeach

                        @if ($representatives->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center">No representatives found.</td>
                            </tr>
                        @endif
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
            let fourthColumn = row.cells[3]?.innerText.toLowerCase(); // 4th column (index 3)
            row.style.display = fourthColumn && fourthColumn.includes(filter) ? '' : 'none';
        });
    });
</script>

@endsection
