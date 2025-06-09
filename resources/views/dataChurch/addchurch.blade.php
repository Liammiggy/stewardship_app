@extends('layouts.app')
@section('title', 'Add New Church')
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
               <small class="text-muted">Upload church photo/logo</small>
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
            <div class="card-header">Church Information</div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="church_name" class="form-control" placeholder="Church Name">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="address" class="form-control" placeholder="Address">
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Province" class="form-control" placeholder="Province">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="country" class="form-control" placeholder="Country">
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Phone" class="form-control" placeholder="Phone">
                  </div>
                  <div class="col-md-6 mb-3">
                     <select name="pastor" class="form-control">
                        <option value="">Pastor</option>
                        <option value="Bogo Bap">Miguel Alvarina</option>
                         <option value="Bogo Bap">Raymond Bolambao</option>
                      
                     </select>
                  </div>
               </div>
              
               <!-- Buttons -->
               <div class="text-left mt-4">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-warning ml-2">Reset</button>
                  <a href="{{ route('dataChurch.churchlist') }}" class="btn btn-secondary ml-2">Back</a>
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