@extends('layouts.app')
@section('title', 'Add New Organization')
@section('contents')
<!-- <h1 class="mb-0">Add Member Information</h1> -->
<!-- <hr /> -->
<form action="{{ route('dataMahasiswa.store') }}" method="POST" enctype="multipart/form-data" id="memberForm">
   @csrf
   <div class="row">
      <!-- Left Card: Photo Upload -->
      <div class="col-md-4">
         <div class="card h-80">
            <div class="card-header">Photo/logo</div>
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
               <input type="file" name="photo" accept="image/*" class="form-control mb-3" id="photoInput">
               <small class="text-muted">Upload orgnization photo/logo</small>
               <img id="photoPreview" src="#" alt="Photo Preview" class="img-fluid mt-3" style="max-height: 300px; display: none; border-radius: 8px;" />
            </div>
         </div>
      </div>
      <script>
         const photoInput = document.getElementById('photoInput');
         const photoPreview = document.getElementById('photoPreview');
         
         photoInput.addEventListener('change', function() {
             const file = this.files[0];
             if (file) {
                 const reader = new FileReader();
                 reader.onload = function(e) {
                     photoPreview.src = e.target.result;
                     photoPreview.style.display = 'block';
                 }
                 reader.readAsDataURL(file);
             } else {
                 photoPreview.src = '#';
                 photoPreview.style.display = 'none';
             }
         });
      </script>
      <!-- Right Card: Member Info -->
      <div class="col-md-8">
         <div class="card h-100">
            <div class="card-header">Organization Information</div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Organization Name" class="form-control" placeholder="Organization Name">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="First name" class="form-control" placeholder="Representative First name">
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Last name" class="form-control" placeholder="Representative Last name">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Address" class="form-control" placeholder="Address">
                  </div>
               </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Phone" class="form-control" placeholder="Phone">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="email" class="form-control" placeholder="E-mail">
                  </div>
               </div>
              
               <!-- Buttons -->
               <div class="text-left mt-4">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-warning ml-2">Reset</button>
                  <a href="{{ route('dataOrganization.organizationlist') }}" class="btn btn-secondary ml-2">Back</a>
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