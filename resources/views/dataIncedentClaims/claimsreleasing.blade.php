@extends('layouts.app')
@section('title', 'Releasing (Disbursement)')
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

   <!-- MEMBER & INCIDENT INFO -->
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
            <button type="button" class="btn btn-primary w-100" onclick="calculate()">Calculate Claims</button>
         </div>
      </div>
   </div>

   <!-- MEMBER INFO TABLE -->
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

   <!-- COLLECTIONS -->
   <div class="amount-box d-flex justify-content-between">
      <div class="card-body">
         <div class="row">
            <div class="col-md-4 mb-3">
               <label for="collection" class="form-label">Actual Collections in 7 Days (PHP):</label>
               <input type="number" step="any" id="collection" class="form-control" placeholder="Total Collections for 7 Days">
            </div>
            <div class="col-md-4 mb-3">
               <label for="penaltyPercentage" class="form-label">Misgivings Penalty (% of Benefits):</label>
               <input type="number" step="any" id="penaltyPercentage" class="form-control" placeholder="e.g., 15">
            </div>
            <div class="col-md-4 mb-3">
               <label for="misgivingsAmount" class="form-label">Misgivings Amount (Fixed):</label>
               <input type="number" step="any" id="misgivingsAmount" class="form-control" placeholder="e.g., 1030">
            </div>
         </div>
      </div>
   </div>

   <!-- CALCULATOR SECTION -->
   <div class="section-body">
      <table class="table table-bordered mt-4">
         <tbody>
            <tr>
               <th>MEMBER'S BENEFITS <small>(Collection × 70%)</small></th>
               <td><input type="text" id="benefits" class="form-control" readonly></td>
            </tr>
            <tr>
               <th>PENALTY <small>(% of Benefit)</small></th>
               <td><input type="text" id="penalty" class="form-control" readonly></td>
            </tr>
            <tr>
               <th>MISGIVINGS <small>(Manual Fixed Input)</small></th>
               <td><input type="text" id="misgivings" class="form-control" readonly></td>
            </tr>
            <tr>
               <th>WITHHOLDING <small>(Benefit × 10%)</small></th>
               <td><input type="text" id="withholding" class="form-control" readonly></td>
            </tr>
            <tr>
               <th class="fw-bold">TOTAL DEDUCTIONS</th>
               <td><input type="text" id="deductions" class="form-control" readonly></td>
            </tr>
            <tr>
               <th class="fw-bold text-success">NET BENEFIT CLAIM</th>
               <td><input type="text" id="netClaim" class="form-control" readonly></td>
            </tr>
         </tbody>
      </table>
      <div class="note mt-3"><strong>NOTE:</strong> In 30 days, Stewardship will release your final gift balance and the church tithes.</div>
   </div>

   <!-- ACTION BUTTONS -->
   <div class="section-body">
      <div class="text-left mt-4">
         <button type="submit" class="btn btn-success">Disburse</button>
         <button type="reset" class="btn btn-warning ml-2">Reset</button>
         <a href="{{ route('dataIncedentClaims.incidentlist') }}" class="btn btn-secondary ml-2">Back</a>
         <button type="button" onclick="printClaim()" class="btn btn-outline-dark ml-2">
            <i class="bi bi-printer"></i> Print View
         </button>
      </div>
   </div>
</form>

<!-- JS SCRIPT -->
<script>
   function calculate() {
      const collection = parseFloat(document.getElementById('collection').value) || 0;
      const penaltyPercentage = parseFloat(document.getElementById('penaltyPercentage').value) || 0;
      const misgivings = parseFloat(document.getElementById('misgivingsAmount').value) || 0;

      const benefits = collection * 0.70;
      const penalty = benefits * (penaltyPercentage / 100);
      const withholding = benefits * 0.10;
      const deductions = penalty + misgivings + withholding;
      const netClaim = benefits - deductions;

      document.getElementById('benefits').value = benefits.toFixed(2);
      document.getElementById('penalty').value = penalty.toFixed(2);
      document.getElementById('misgivings').value = misgivings.toFixed(2);
      document.getElementById('withholding').value = withholding.toFixed(2);
      document.getElementById('deductions').value = deductions.toFixed(2);
      document.getElementById('netClaim').value = netClaim.toFixed(2);
   }

   function printClaim() {
      window.print(); // opens print dialog for full page
   }
</script>

@push('scripts')
@endpush
@endsection
