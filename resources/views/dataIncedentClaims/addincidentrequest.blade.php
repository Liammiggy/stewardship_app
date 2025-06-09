@extends('layouts.app')
@section('title', 'Add Incident Request')
@section('contents')
<!-- <h1 class="mb-0">Add Member Information</h1> -->
<!-- <hr /> -->
<form action="{{ route('dataMahasiswa.store') }}" method="POST" enctype="multipart/form-data" id="memberForm">
   @csrf
   <div class="row">
      <!-- Left Card: Photo Upload -->
     <div class="col-md-4">
   <div class="card h-100">
      <div class="card-header">Attached Files</div>
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
            <div class="card-header">Incident Request Information</div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Member Name" class="form-control" placeholder="Member Name">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Incedent Title" class="form-control" placeholder="Incedent Title">
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Incedent" class="form-control" placeholder="Incedent Type">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Pastor" class="form-control" placeholder="Pastor">
                  </div>
               </div>
                <div class="row">
                            <div class="col-md-6 mb-3">                             
                                <input type="date" name="daterequested" id="daterequested" class="form-control">
                            </div>
                  <div class="col-md-6 mb-3">
                     <select name="pastor" class="form-control">
                        <option value="">Status</option>
                        <option value="Bogo Bap">Approved</option>
                        <option value="San Vicente">For Release</option>
                        <option value="San Vicente">Claimed</option>
                        <option value="San Vicente">Pending</option>
                         <option value="San Vicente">Declined</option>
                     </select>
                  </div>
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

@endsection