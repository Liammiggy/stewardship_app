@extends('layouts.app')
@section('title', 'Update Representative Info')
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

<form action="{{ route('dataRepresentative.update', $representative->id) }}" method="POST" enctype="multipart/form-data" id="memberForm">
    @csrf
    @method('PUT')
    <div class="row">

        <!-- Photo Upload -->
        <div class="col-md-4">
            <div class="card h-80">
                <div class="card-header">Photo/logo</div>
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <input type="file" name="photo" accept="image/*" class="form-control mb-3" id="photoInput">
                    @error('photo') <div class="text-danger">{{ $message }}</div> @enderror
                    <small class="text-muted">Upload representative photo/logo</small>
                <img
                                id="photoPreview"
                                src="{{ asset('storage/representatives/' . $representative->photo) }}"
                                onerror="this.onerror=null;this.src='{{ asset('images/default-photo.png') }}';"
                                alt="Photo Preview"
                                class="img-fluid mt-3"
                                style="max-height: 300px; border-radius: 8px;"
                            />

                </div>
            </div>
        </div>

        <script>
            const photoInput = document.getElementById('photoInput');
            const photoPreview = document.getElementById('photoPreview');
            photoInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        photoPreview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>

        <!-- Representative Info -->
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-header">Representative Information</div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <select class="form-control" name="type" required>
                                <option value="">-- Select Representative Type --</option>
                                <option value="Pastor" {{ $representative->type == 'Pastor' ? 'selected' : '' }}>Pastor</option>
                                <option value="Individual" {{ $representative->type == 'Individual' ? 'selected' : '' }}>Individual</option>
                                <option value="Institution" {{ $representative->type == 'Institution' ? 'selected' : '' }}>Institution</option>
                            </select>
                            @error('type') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="Representative_name" class="form-control" value="{{ $representative->Representative_name }}" required>
                            @error('Representative_name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="Phone" class="form-control" value="{{ $representative->Phone }}" required>
                            @error('Phone') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="Email" class="form-control" value="{{ $representative->Email }}" required>
                            @error('Email') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="Street" class="form-control" value="{{ $representative->Street }}" required>
                            @error('Street') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="Barangay" class="form-control" value="{{ $representative->Barangay }}" required>
                            @error('Barangay') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="Municipality" class="form-control" value="{{ $representative->Municipality }}" required>
                            @error('Municipality') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="Province" class="form-control" value="{{ $representative->Province }}" required>
                            @error('Province') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="Zipcode" class="form-control" value="{{ $representative->Zipcode }}" required>
                            @error('Zipcode') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="Institution_Name" class="form-control" value="{{ $representative->Institution_Name }}" required>
                            @error('Institution_Name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="text-left mt-4">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('dataRepresentative.representativelist') }}" class="btn btn-secondary ml-2">Back</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>


@endsection
