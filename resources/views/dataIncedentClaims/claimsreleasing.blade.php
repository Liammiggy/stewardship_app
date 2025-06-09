@extends('layouts.app')
@section('title', 'Releasing (Disursement)')
@section('contents')
<style>
   .section-body {
   border: 1px solid #dee2e6;
   padding: 15px;
   background-color: #fdfdfd;
   border-radius: 6px;
   margin-bottom: 20px;
   }
   .form-group {
   margin-bottom: 15px;
   }
   .form-label {
   font-weight: 600;
   margin-bottom: 5px;
   display: block;
   }
   .amount-box {
   background-color: #f1f3f5;
   padding: 15px;
   border-radius: 6px;
   margin-top: 20px;
   }
   .amount-highlight {
   font-size: 1.6rem;
   font-weight: bold;
   color: #28a745;
   }
   .table-summary th, .table-summary td {
   vertical-align: middle;
   text-align: left;
   padding: 8px;
   }
   .form-buttons {
   margin-top: 20px;
   }
   textarea.form-control {
   resize: none;
   }
   select.form-control {
   max-width: 400px;
   }
</style>
<form action="{{ route('dataMahasiswa.store') }}" method="POST" id="incidentForm">
   @csrf
   <div class="section-body">
      <div class="row">
         <div class="col-md-3 form-group">
            <label class="form-label">Member Name</label>
            <select name="member_id" class="form-control">
               <option value="">Select Member</option>
               <option value="1">Macario Porones Jr.</option>
               <option value="2">Another Member</option>
            </select>
         </div>
         <div class="col-md-3 form-group">
            <label class="form-label">Incident Type</label>
            <select name="incident_type" class="form-control">
               <option value="">Select Type</option>
               <option value="natural">Natural</option>
               <option value="accidental">Accidental</option>
            </select>
         </div>
         <div class="col-md-3 form-group">
            <label class="form-label">Incident Title</label>
            <select name="incident_title" class="form-control">
               <option value="">Select Title</option>
               <option value="death">Death</option>
               <option value="hospitalization">Hospitalization</option>
            </select>
         </div>
         <div class="col-md-3 form-group d-flex align-items-end">
            <button type="button" class="btn btn-primary w-100">
            Calculate Claims
            </button>
         </div>
      </div>
   </div>
   <div class="section-body" id="printArea">
      <div class="form-group">
         <table class="table table-bordered table-summary mt-3">
            <tbody>
               <tr>
                  <td><strong>Nature of Benefits:</strong></td>
                  <td>Death</td>
                  <td><strong>Name of a Member:</strong></td>
                  <td>Macario Porones Jr</td>
               </tr>
               <tr>
                  <td><strong>Address:</strong></td>
                  <td>Puerto Princesa City, Palawan</td>
                  <td><strong>Church:</strong></td>
                  <td>God's Kingdom Embassy</td>
               </tr>
               <tr>
                  <td><strong>Spouse:</strong></td>
                  <td>N.A</td>
                  <td><strong>Pastor:</strong></td>
                  <td>Armando Sabado</td>
               </tr>
               <tr>
                  <td><strong>Contact No.:</strong></td>
                  <td>0999 222 22</td>
                  <td><strong>Beneficiary:</strong></td>
                  <td>Cheryl Sabado</td>
               </tr>
            </tbody>
         </table>
      </div>
      <div class="amount-box d-flex justify-content-between ">
         <div><strong>Total Amount Active Members</strong></div>
         <div class="amount-highlight" >₱49,225.00</div>
      </div>
      <table class="table table-bordered table-summary mt-3">
         <thead>
            <tr>
               <th>Category</th>
               <th>Amount (₱)</th>
               <th>% Share</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td>For Member</td>
               <td>33,247.13</td>
               <td>67.50%</td>
            </tr>
            <tr>
               <td>Tithe's Member</td>
               <td>3,694.13</td>
               <td>7.50%</td>
            </tr>
            <tr>
               <td>Tithes Stewardship</td>
               <td>1,231.38</td>
               <td>2.50%</td>
            </tr>
            <tr>
               <td>Mission Support</td>
               <td>1,231.38</td>
               <td>2.50%</td>
            </tr>
            <tr>
               <td>Stewardship</td>
               <td>9,851.00</td>
               <td>20.00%</td>
            </tr>
         </tbody>
      </table>
      <div class="text-left mt-4">
         <button type="submit" class="btn btn-success">Disburse</button>
         <button type="reset" class="btn btn-warning ml-2">Reset</button>
         <a href="{{ route('dataIncedentClaims.incidentlist') }}" class="btn btn-secondary ml-2">Back</a>
         <button type="button" onclick="printClaim()" class="btn btn-outline-dark ml-2">  <i class="bi bi-printer"></i> Print View </button>
      </div>
   </div>
</form>
@push('scripts')
<script>
   function printClaim() {
       var printContents = document.getElementById('printArea').innerHTML;
       var originalContents = document.body.innerHTML;
   
       document.body.innerHTML = printContents;
       window.print();
       document.body.innerHTML = originalContents;
       location.reload(); // optional: refresh to restore JS functionality
   }
</script>
<style>
   @media print {
   body * {
   visibility: hidden;
   }
   #printArea, #printArea * {
   visibility: visible;
   }
   #printArea {
   position: absolute;
   left: 0;
   top: 0;
   width: 100%;
   }
   }
</style>
@endpush
@endsection