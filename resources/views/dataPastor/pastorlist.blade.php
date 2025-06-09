@extends('layouts.app')

@section('title', 'Pastors')

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
            <div class="d-flex justify-content-between mb-3">
                <input type="text" id="searchInput" class="form-control w-50" placeholder="Search pastors...">
                <a href="{{ route('dataPastor.addpastor') }}" class="btn btn-success">+ Add Pastor</a>
            </div>

            <table class="table table-hover table-custom" id="membersTable">
                <thead class="table-primary">
                    <tr>
                        <th><i class="fas fa-edit" title="Edit"></i></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address ID</th>
                        <th>Phone</th>
                        <th>Church ID</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="pastorTableBody">
                    <tr><td colspan="7" class="text-center">Loading...</td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function renderStatusBadge(status) {
            switch (status) {
                case 1: return '<span class="badge-active">Active</span>';
                case 0: return '<span class="badge-inactive">Inactive</span>';
                default: return '<span class="badge-pending">Pending</span>';
            }
        }

        fetch("http://stewardshipapi.test/api/manage-pastors/list")
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                const pastors = data.pastors;
                const tbody = document.getElementById('pastorTableBody');
                tbody.innerHTML = '';

                if (!Array.isArray(pastors) || pastors.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="7" class="text-center">No pastors found.</td></tr>';
                    return;
                }

                pastors.forEach(pastor => {
                    const row = `
                        <tr>
                            <td>
                                <a href="{{ route('dataPastor.edit') }}?id=${pastor.pastor_id}" class="btn btn-warning btn-sm">...</a>
                            </td>
                            <td>${pastor.pastor_id}</td>
                            <td>${pastor.first_name} ${pastor.last_name}</td>
                            <td>${pastor.address_id ?? '-'}</td>
                            <td>${pastor.phone ?? '-'}</td>
                            <td>${pastor.church_id ?? '-'}</td>
                            <td>${renderStatusBadge(pastor.status)}</td>
                        </tr>
                    `;
                    tbody.insertAdjacentHTML('beforeend', row);
                });
            })
            .catch(error => {
                console.error('Fetch error:', error);
                document.getElementById('pastorTableBody').innerHTML = '<tr><td colspan="7" class="text-center text-danger">Failed to load data.</td></tr>';
            });

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
