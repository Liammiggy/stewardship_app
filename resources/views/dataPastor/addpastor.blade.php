@extends('layouts.app')
@section('title', 'Add New Pastor')
@section('contents')
<form id="memberForm" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <!-- Photo Upload -->
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

        <!-- Info -->
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-header">Pastor Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                        </div>
                    </div>

                    <!-- Hidden/Default Values -->
                    <input type="hidden" name="address_id" value="1">
                    <input type="hidden" name="church_id" value="1">
                    <input type="hidden" name="status" value="1">

                    <!-- Buttons -->
                    <div class="text-left mt-4">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-warning ml-2">Reset</button>
                        <a href="{{ route('dataPastor.pastorlist') }}" class="btn btn-secondary ml-2">Back</a>
                    </div>

                    <div id="responseMessage" class="alert mt-3 d-none"></div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Image Preview Script -->
<script>
document.getElementById('photoInput').addEventListener('change', function () {
    const file = this.files[0];
    const preview = document.getElementById('photoPreview');
    if (file) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = '#';
        preview.style.display = 'none';
    }
});
</script>

<!-- Submit Handler -->
<script>
document.getElementById('memberForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const responseBox = document.getElementById('responseMessage');

    fetch('http://stewardshipapi.test/api/manage-pastors/add', {
        method: 'POST',
        body: formData
    })
    .then(async response => {
        const data = await response.json();

        if (!response.ok) {
            responseBox.className = 'alert alert-danger mt-3';
            responseBox.textContent = data.message || 'Error submitting form.';
            responseBox.classList.remove('d-none');
            console.error('Validation error:', data);
            return;
        }

        responseBox.className = 'alert alert-success mt-3';
        responseBox.textContent = 'Pastor added successfully.';
        responseBox.classList.remove('d-none');
        form.reset();
        document.getElementById('photoPreview').style.display = 'none';
    })
    .catch(error => {
        console.error('Error:', error);
        responseBox.className = 'alert alert-danger mt-3';
        responseBox.textContent = 'There was a problem submitting the form.';
        responseBox.classList.remove('d-none');
    });
});
</script>
@endsection
