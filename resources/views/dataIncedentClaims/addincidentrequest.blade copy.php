@extends('layouts.app')
@section('title', 'Add Incident Request')
@section('contents')
<!-- <h1 class="mb-0">Add Member Information</h1> -->
<!-- <hr /> -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<form action="{{ route('dataMahasiswa.store') }}" method="POST" enctype="multipart/form-data" id="memberForm">
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

<script>
   const photoInput = document.getElementById('photoInput');
   const photoPreviewContainer = document.getElementById('photoPreviewContainer');

   photoInput.addEventListener('change', function () {
       photoPreviewContainer.innerHTML = ''; // Clear previous previews

       const files = Array.from(this.files);
       if (files.length > 0) {
           files.forEach(file => {
               if (file.type.startsWith('image/')) {
                   const reader = new FileReader();
                   reader.onload = function (e) {
                       const img = document.createElement('img');
                       img.src = e.target.result;
                       img.className = 'img-fluid';
                       img.style.maxHeight = '150px';
                       img.style.borderRadius = '8px';
                       img.style.margin = '5px';
                       img.style.objectFit = 'cover';
                       img.style.maxWidth = '150px';
                       photoPreviewContainer.appendChild(img);
                   }
                   reader.readAsDataURL(file);
               }
           });
       }
   });
</script>

      <!-- Right Card: Member Info -->
      <div class="col-md-8">
         <div class="card h-100">
            <div class="card-header bg-primary text-white">Incident Request Information</div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <!-- <input type="text" name="Member Name" class="form-control" placeholder="Member Name"> -->
                      <input type="text" id="search_member" placeholder="Search member..." autocomplete="off" class="form-control">
                        <div id="suggestions" style="position:absolute; z-index:1000; background:white; border:1px solid #ccc; width:100%; display:none;"></div>

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
                                                        data.forEach(function(name) {
                                                            suggestions += `<div class="suggestion-item hover-effect" style="cursor:pointer;">${name}</div>`;
                                                        });
                                                        $('#suggestions').html(suggestions).show();
                                                    }
                                                });
                                            } else {
                                                $('#suggestions').empty().hide();
                                            }
                                        });

                                        // When suggestion is clicked
                                        $(document).on('click', '.suggestion-item', function() {
                                            $('#search_member').val($(this).text());
                                            $('#suggestions').empty().hide();
                                        });
                                    });



                        </script>


                  <div class="col-md-6 mb-3">
                     <input type="text" name="Incedent Title" class="form-control" placeholder="Incedent Title">
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Incedent" class="form-control" placeholder="Incedent Type">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Representative" class="form-control" placeholder="Representative">

                  </div>
               </div>
                <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="date" name="daterequested" id="daterequested" class="form-control">
                            </div>
                  <div class="col-md-6 mb-3">
                     <select name="pastor" class="form-control">
                        <option value="">Status</option>

                        <!-- Releasing - 7 Business Days - 30 Days - 70 Days  - note -->
                        <option value="San Vicente">Releasing 7 Business Days</option>
                        <option value="San Vicente">30 Days (Final Releasing)  </option>
                        <option value="San Vicente">Releasing 70 Days</option>

                        <option value="San Vicente">Claimed</option>
                        <option value="San Vicente">Pending</option>
                        <option value="San Vicente">Declined</option>
                        <option value="Bogo Bap">Approved</option>

                     </select>
                  </div>
               </div>

                <div class="mb-3">
                   <!-- Representative Section -->
                    <div class="card">
                        <div class="card-header bg-primary text-white">Representative Details</div>
                        <div class="card-body">
                            <div class="row">
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
                        </div>
                    </div>

                    {{-- Representative Dynamic Dropdown --}}
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
                    </script>
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
               <!-- Retirement Warning -->
               <div id="retirementWarning" class="alert alert-warning mt-3 d-none">
                  ⚠️ This person is within 3 years of retirement (age 60 in the Philippines).
               </div>
            </div>
         </div>
      </div>
   </div>
</form>


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


    <div class="card" style="margin-top:20px;">


        <div class="card-body">

            <div class="d-flex justify-content-between mb-3">
                <h3> Selected Member's Misgiving Incident Contributions</h3>
            </div>

            <table class="table table-hover table-custom" id="membersTable">
                <thead class="table-primary">
                    <tr>
                        <!-- <th><i class="fas fa-edit" title="Edit"></i></th> -->
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
                         <td>
                            <!-- <a href="#" class="btn btn-primary btn-sm">Detail</a> -->

                            <a href="{{ route('dataMahasiswa.addpayment') }}" class="btn btn-success btn-sm">Add Payment</a>

                        </td>


                        <td>
                        <span style="background-color: red; color: white; padding: 0.25em 0.6em; border-radius: 0.25rem;">
                           Unpaid
                        </span>
                        </td>

                           </style>

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
