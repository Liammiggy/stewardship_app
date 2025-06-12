@extends('layouts.app')
@section('title', 'Add New Representative')
@section('contents')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('dataRepresentative.store') }}" method="POST" enctype="multipart/form-data" id="memberForm">
   @csrf
   <div class="row">
      <!-- Left Card: Photo Upload -->
      <div class="col-md-4">
         <div class="card h-80">
            <div class="card-header">Photo/logo</div>
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
               <input type="file" name="photo" accept="image/*" class="form-control mb-3" id="photoInput" required>
               @error('photo')
                   <div class="text-danger">{{ $message }}</div>
               @enderror
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
                     <select class="form-control" id="repType" name="type" required>
                        <option value="">-- Select Representative Type --</option>
                        <option value="Pastor" {{ old('type') == 'Pastor' ? 'selected' : '' }}>Pastor</option>
                        <option value="Individual" {{ old('type') == 'Individual' ? 'selected' : '' }}>Individual</option>
                        <option value="Institution" {{ old('type') == 'Institution' ? 'selected' : '' }}>Institution</option>
                     </select>
                     @error('type')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Representative_name" class="form-control" placeholder="Representative Name" value="{{ old('Representative_name') }}" required>
                     @error('Representative_name')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
               </div>

               <!-- Contact Info -->
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Phone" class="form-control" placeholder="Phone" value="{{ old('Phone') }}" required>
                     @error('Phone')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Email" class="form-control" placeholder="Email" value="{{ old('Email') }}" required>
                     @error('Email')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
               </div>

               <!-- Address -->
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Street" class="form-control" placeholder="Street" value="{{ old('Street') }}" required>
                     @error('Street')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Barangay" class="form-control" placeholder="Barangay" value="{{ old('Barangay') }}" required>
                     @error('Barangay')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Municipality" class="form-control" placeholder="Municipality / City" value="{{ old('Municipality') }}" required>
                     @error('Municipality')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Province" class="form-control" placeholder="Province" value="{{ old('Province') }}" required>
                     @error('Province')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Zipcode" class="form-control" placeholder="Zip Code" value="{{ old('Zipcode') }}" required>
                     @error('Zipcode')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="col-md-6 mb-3">
                     <input type="text" name="Institution_Name" class="form-control" placeholder="Institution Name" value="{{ old('Institution_Name') }}" required>
                     @error('Institution_Name')
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
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
