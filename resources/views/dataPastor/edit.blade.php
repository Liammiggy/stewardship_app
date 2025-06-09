@extends('layouts.app')
@section('title', 'Update Pastor Info')
@section('contents')
<!-- <h1 class="mb-0">Add Member Information</h1> -->
<!-- <hr /> -->
<form action="{{ route('dataMahasiswa.store') }}" method="POST" enctype="multipart/form-data" id="memberForm">
   @csrf
   <div class="row">
      <!-- Left Card: Photo Upload -->
      <div class="col-md-4">
         <div class="card h-80">
            <div class="card-header">Photo</div>
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
               <input type="file" name="photo" accept="image/*" class="form-control mb-3" id="photoInput">
               <small class="text-muted">Upload pastor photo</small>
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
            <div class="card-header">Pastor Information</div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="first_name" class="form-control" placeholder="First Name">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="address" class="form-control" placeholder="Address">
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="country" class="form-control" placeholder="Country">
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="email" class="form-control" placeholder="Email">
                  </div>
                  <div class="col-md-6 mb-3">
                     <select name="pastor" class="form-control">
                        <option value="">Church</option>
                        <option value="Bogo Bap">Bogo Bap</option>
                        <option value="San Vicente">San Vicente</option>
                     </select>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <label for="birthday" class="form-label">Birthday</label>
                     <input type="date" name="birthday" id="birthday" class="form-control">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="age" class="form-label">Age</label>
                     <input type="text" name="age" id="age" class="form-control" readonly>
                  </div>
               </div>
               <!-- Buttons -->
               <div class="text-left mt-4">
                  <button type="submit" class="btn btn-success">Submit</button>
                 <button type="reset" class="btn btn-warning ml-2"
                            onclick="return confirm('Do you want to delete this Pastor?')">
                            Delete
                        </button>
                  <a href="{{ route('dataPastor.pastorlist') }}" class="btn btn-secondary ml-2">Back</a>



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
<script>
   const birthdayInput = document.getElementById('birthday');
   const ageInput = document.getElementById('age');
   const retirementWarning = document.getElementById('retirementWarning');
   
   birthdayInput.addEventListener('change', function () {
       const birthDate = new Date(this.value);
       const today = new Date();
       let age = today.getFullYear() - birthDate.getFullYear();
       const m = today.getMonth() - birthDate.getMonth();
       if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
           age--;
       }
   
       ageInput.value = age;
   
       // Show retirement warning if age is between 57 and 59
       if (age >= 57 && age < 60) {
           retirementWarning.classList.remove('d-none');
       } else {
           retirementWarning.classList.add('d-none');
       }
   });
</script>
@endsection