@extends('layouts.app')
@section('title', 'Add New Representative')
@section('contents')

<form action="{{ route('dataMahasiswa.store') }}" method="POST" enctype="multipart/form-data" id="memberForm">
   @csrf
   <div class="row">
      <!-- Left Card: Photo Upload -->
      <div class="col-md-4">
         <div class="card h-80">
            <div class="card-header">Photo/logo</div>
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
               <input type="file" name="photo" accept="image/*" class="form-control mb-3" id="photoInput">
               <small class="text-muted">Upload representative photo/logo</small>
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

      <!-- Right Card: Representative Info -->
      <div class="col-md-8">
         <div class="card h-100">
            <div class="card-header">Representative Information</div>
            <div class="card-body">

               <div class="row">
                  <div class="col-md-6 mb-3">
                     <select class="form-control" id="repType" required name="type">
                        <option value="">-- Select Representative Type --</option>
                        <option value="Pastor">Pastor</option>
                        <option value="Individual">Individual</option>
                        <option value="Institution">Institution</option>
                     </select>
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Representative_name" class="form-control" placeholder="Representative Name">
                  </div>
               </div>

               <!-- Contact Info -->
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Phone" class="form-control" placeholder="Phone">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="email" name="Email" class="form-control" placeholder="Email">
                  </div>
               </div>


               <!-- Address -->
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Street" class="form-control" placeholder="Street">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Barangay" class="form-control" placeholder="Barangay">
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Municipality" class="form-control" placeholder="Municipality / City">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Province" class="form-control" placeholder="Province">
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Zipcode" class="form-control" placeholder="Zip Code">
                  </div>
                  <div class="col-md-6 mb-3">
                      <input type="text" name="Institution_Name" class="form-control" placeholder="Institution Name">
                  </div>
               </div>

               <!-- Buttons -->
               <div class="text-left mt-4">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-warning ml-2">Reset</button>
                  <a href="{{ route('dataRepresentative.representativelist') }}" class="btn btn-secondary ml-2">Back</a>
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
