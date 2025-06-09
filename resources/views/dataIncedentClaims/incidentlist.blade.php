@extends('layouts.app')

@section('title', 'Incident Claims Request')

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
                <input type="text" id="searchInput" class="form-control w-50" placeholder="Search Member Request...">
                <a href="{{ route('dataIncedentClaims.addincidentrequest') }}" class="btn btn-success">+ Add Claims Request</a>
            </div>

            <table class="table table-hover table-custom" id="membersTable">
                <thead class="table-primary">
                    <tr><th><i class="fas fa-edit" title="Edit"></i></th>
                        <th>ID</th>
                        <th>Member</th>
                        <th>Incident Title</th>
                        <th>Incident Type</th>
                        <th>Pastor</th>   
                        <th>Date Requested</th>                     
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <!-- <a href="#" class="btn btn-primary btn-sm">Detail</a> -->
                            <a href="{{ route('dataOrganization.edit') }}" class="btn btn-warning btn-sm">...</a>
                            
                        </td>
                        <td>001</td>
                        <td>Harper Jameson</td>
                        <td>Sons-Minor Surgery</td>
                        <td>BMinor Surgery</td>
                        <td>Isabella Reed</td>
                        <td>6-9-2025</td>
                      
                         <td><span class="badge-active">Active</span></td>
                    </tr>
                   

                     
                   
                </tbody>
            </table>
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
