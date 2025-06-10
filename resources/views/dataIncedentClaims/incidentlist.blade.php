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

   @media (max-width: 768px) {
      .responsive-controls {
         flex-direction: column !important;
         align-items: stretch !important;
         gap: 10px;
      }

      .responsive-controls input,
      .responsive-controls select {
         width: 100% !important;
      }

      .responsive-controls a {
         width: auto;
         align-self: flex-start;
      }
   }
</style>

<style>
         .d-flex > *:not(:last-child) {
         margin-right: 30px;
         }
         .w-50 {
         width: 40% !important;
         }
      </style>
      
<div class="card">
   <div class="card-body">
      <div class="d-flex align-items-center mb-3 gap-3 responsive-controls" style="flex-wrap: wrap;">
         <input type="text" id="searchInput" class="form-control w-50" placeholder="Search Member Request...">
         <select id="statusFilter" class="form-control" style="width: 130px;">
            <option value="">Status</option>
            <option value="Approved">Approved</option>
            <option value="For Release">For Release</option>
            <option value="Claimed">Claimed</option>
            <option value="Pending">Pending</option>
            <option value="Declined">Declined</option>
            <option value="Disbursed">Disbursed</option>
         </select>
         <input type="date" id="dateFilter" class="form-control" style="width: 160px;">
         <select id="dateSort" class="form-control" style="width: 160px;">
            <option value="asc">Date Ascending</option>
            <option value="desc">Date Descending</option>
         </select>
         <div class="flex-grow-1"></div>
         <a href="{{ route('dataIncedentClaims.addincidentrequest') }}" class="btn btn-success">+ Claims Request</a>
      </div>

      <div class="table-responsive">
         <table class="table table-hover table-custom" id="membersTable">
            <thead class="table-primary">
               <tr>
                  <th><i class="fas fa-edit" title="Edit"></i></th>
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
                     <a href="{{ route('dataIncedentClaims.edit') }}" class="btn btn-warning btn-sm">...</a>
                  </td>
                  <td>001</td>
                  <td>Harper Jameson</td>
                  <td>Sons-Minor Surgery</td>
                  <td>BMinor Surgery</td>
                  <td>Isabella Reed</td>
                  <td>6-9-2025</td>
                  <td>
                     <span style="background-color: #57CAEB; color: white; padding: 0.25em 0.6em; border-radius: 0.25rem;">
                        Pending
                     </span>
                  </td>
               </tr>
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
