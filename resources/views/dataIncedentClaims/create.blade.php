@extends('layouts.app')
@section('title', 'Add Incident Request')
@section('contents')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<form action="{{ route('dataIncedentClaims.store') }}" method="POST" enctype="multipart/form-data" id="memberForm">
   @csrf
   <div class="row">
      <!-- Left Card: Photo Upload -->
      <div class="col-md-4">
         <div class="card h-100">
            <div class="card-header bg-primary text-white">Attached Files</div>
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
               <input type="file" name="photos[]" accept="image/*" multiple class="form-control mb-3" id="photoInput">
               <small class="text-muted">Upload multiple claims requirements</small>
               <div id="photoPreviewContainer" class="mt-3 d-flex flex-wrap gap-2 justify-content-center"></div>
            </div>
         </div>
      </div>

      <!-- Right Card: Member Info -->
      <div class="col-md-8">
         <div class="card h-100">
            <div class="card-header bg-primary text-white">Incident Request Information</div>
            <div class="card-body">
               <div class="row">

                          <div class="col-12 mb-3 position-relative">
                                <!-- <label for="search_member">Search Member</label> -->
                               <input type="text" id="search_member" placeholder="Search member..." autocomplete="off" class="form-control">
                                <input type="hidden" id="member_id" name="member_id">
                                <div id="suggestions" style="position:fixed; z-index:1000; background:white; border:1px solid #ccc; width:auto; display:none;"></div>
                            </div>

               </div>
               <style>
                     .suggestion-item {
                        padding: 8px 12px;
                        border-bottom: 1px solid #eee;

                     }
                     .suggestion-item:hover {
                        background-color: #f1f1f1;
                        cursor: pointer;
                     }
                  </style>

                  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>

                                    $(document).ready(function() {
                                        $('#search_member').on('input', function() {
                                            let query = $(this).val();

                                            if (query.length > 1) {
                                                $.ajax({
                                                    url: '/get-members',
                                                    method: 'GET',
                                                    data: { search: query },
                                                    success: function(data) {
                                                        let suggestions = '';
                                                        data.forEach(function(member) {
                                                            suggestions += `<div class="suggestion-item" data-id="${member.id}" data-name="${member.full_name}" style="cursor:pointer;">${member.full_name}</div>`;
                                                        });
                                                        $('#suggestions').html(suggestions).show();
                                                    }
                                                });
                                            } else {
                                                $('#suggestions').empty().hide();
                                            }
                                        });

                                        // On selecting a suggestion
                                        $(document).on('click', '.suggestion-item', function() {
                                            let memberName = $(this).data('name');
                                            let memberId = $(this).data('id');

                                            $('#search_member').val(memberName);
                                            $('#member_id').val(memberId); // Assuming you have a hidden input to store member ID
                                            $('#suggestions').empty().hide();
                                        });
                                    });



                        </script>

               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="incident_type" class="form-control" placeholder="Incident Type">
                  </div>
                    <div class="col-md-6 mb-3">
                     <input type="text" name="incident_title" class="form-control" placeholder="Incident Title">


                  </div>
               </div>

               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="date" name="daterequested" id="daterequested" class="form-control">
                  </div>
                  <div class="col-md-6 mb-3">
                     <select name="status" id="status" class="form-control" required>
                        <option value="">Status</option>
                        <option value="Releasing 7 Business Days">Releasing 7 Business Days</option>
                        <option value="30 Days (Final Releasing)">30 Days (Final Releasing)</option>
                        <option value="Releasing 70 Days">Releasing 70 Days</option>
                        <option value="Claimed">Claimed</option>
                        <option value="Pending">Pending</option>
                        <option value="Declined">Declined</option>
                        <option value="Approved">Approved</option>
                     </select>
                  </div>
               </div>

               <div class="mb-3">



                        <!-- <div class="row">
                           <div class="col-md-6 mb-3">
                              <select name="representative_type" id="repType" class="form-control" required>
                                 <option value="">Select Type</option>
                                 <option value="Pastor">Pastor</option>
                                 <option value="Institution">Institution</option>
                                 <option value="Individual">Individual</option>
                              </select>
                           </div>
                           <div class="col-md-6 mb-3">
                              <select name="representative_name" id="repSelect" class="form-control" required>
                                 <option value="">Select Representative</option>
                              </select>
                           </div>


                   </div>

                  <script>
                     document.getElementById('repType').addEventListener('change', function () {
                        const selectedType = this.value;
                        const repSelect = document.getElementById('repSelect');

                        repSelect.innerHTML = '<option value="">Loading...</option>';

                        fetch(`/get-representatives/${selectedType}`)
                           .then(response => response.json())
                           .then(data => {
                              repSelect.innerHTML = '<option value="">Select Representative</option>';
                              data.forEach(name => {
                                 const opt = document.createElement('option');
                                 opt.value = name;
                                 opt.textContent = name;
                                 repSelect.appendChild(opt);
                              });
                           });
                     });
                  </script> -->
               </div>

               <div class="mb-3">
                  <textarea name="reason" class="form-control" rows="4" placeholder="If Decline/Disapproved, state your reason."></textarea>
               </div>

               <!-- Buttons -->
               <div class="text-left mt-4">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-warning ml-2">Reset</button>
                  <a href="{{ route('dataIncedentClaims.incidentlist') }}" class="btn btn-secondary ml-2">Back</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>

{{-- Table Section (Unchanged) --}}
<div class="card mt-4">
   <div class="card-body">
      <div class="d-flex justify-content-between mb-3">
         <h3>Selected Member's Misgiving Incident Contributions</h3>
      </div>

      <table class="table table-hover table-custom" id="membersTable">
         <thead class="table-primary">
            <tr>
               <th>ID</th>
               <th>Members Name</th>
               <th>Incident Title</th>
               <th>Incident Type</th>
               <th>Pastor</th>
               <th>Date Requested</th>
               <th>Action</th>
               <th>Status</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td>001</td>
               <td>Raymond Bolambao</td>
               <td>Ramon - Outpatient</td>
               <td>Maternity</td>
               <td>Isabella Reed</td>
               <td>6-9-2025</td>
               <td><a href="{{ route('dataMahasiswa.addpayment') }}" class="btn btn-success btn-sm">Add Payment</a></td>
               <td><span style="background-color: red; color: white; padding: 0.25em 0.6em; border-radius: 0.25rem;">Unpaid</span></td>
            </tr>
         </tbody>
      </table>
   </div>
</div>

<style>
   table.table-custom tr:nth-child(even) { background-color: #f9f9f9; }
   table.table-custom tr:nth-child(odd) { background-color: #ffffff; }
   table.table-custom td, table.table-custom th {
      padding-top: 6px;
      padding-bottom: 6px;
      vertical-align: middle;
   }
</style>

<script>
   // Photo preview
   const photoInput = document.getElementById('photoInput');
   const photoPreviewContainer = document.getElementById('photoPreviewContainer');

   photoInput.addEventListener('change', function () {
      photoPreviewContainer.innerHTML = '';
      Array.from(this.files).forEach(file => {
         if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
               const img = document.createElement('img');
               img.src = e.target.result;
               img.className = 'img-fluid';
               img.style.maxHeight = '150px';
               img.style.maxWidth = '150px';
               img.style.margin = '5px';
               img.style.borderRadius = '8px';
               img.style.objectFit = 'cover';
               photoPreviewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
         }
      });
   });
</script>

@endsection
