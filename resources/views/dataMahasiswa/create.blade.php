@extends('layouts.app')

@section('title', 'Add New Member')

@section('contents')


<form action="{{ route('dataMahasiswa.store') }}" method="POST" enctype="multipart/form-data" id="memberForm">
    @csrf
    <div class="row">
        <!-- Left Card: Photo Upload -->
        <div class="col-md-4">
            <div class="card h-80">
                <div class="card-header bg-primary text-white">Photo</div>
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <input type="file" name="photo" accept="image/*" class="form-control mb-3" id="photoInput">
                    <small class="text-muted">Upload member photo</small>
                    <img id="photoPreview" src="#" alt="Photo Preview" class="img-fluid mt-3" style="max-height: 300px; display: none; border-radius: 8px;" />
                </div>
            </div>
        </div>

        <!-- Right Card: Member Info -->
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">Member Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="middle_name" class="form-control" placeholder="Middle Name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <select name="suffixes" class="form-control">
                                <option value="">Select Suffix</option>
                                <option value="Jr">Jr</option>
                                <option value="Sr">Sr</option>
                                <option value="III">III</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="parents_name" class="form-control" placeholder="Parent's Name (for students/kids)">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="immediate_contact" class="form-control" placeholder="Immediate Contact">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="address" class="form-control" placeholder="Address">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="geography" class="form-control" placeholder="Geography">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="country" class="form-control" placeholder="Country">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="phone" class="form-control" placeholder="Mobile Number">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="facebook" class="form-control" placeholder="Facebook">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="date" name="birthday" id="birthday" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="age" id="age" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <select name="membership_type" class="form-control">
                            <option value="">Membership type</option>
                            <option value="initial">Initial</option>
                            <option value="renewal">Renewal</option>
                        </select>
                    </div>

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
                                        <!-- Beneficiaries -->
                                        @for($i = 1; $i <= 6; $i += 2)
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="beneficiary_{{ $i }}" class="form-control" placeholder="Beneficiary {{ $i }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="beneficiary_{{ $i + 1 }}" class="form-control" placeholder="Beneficiary {{ $i + 1 }}">
                        </div>
                    </div>
                    @endfor

                    <!-- Buttons -->
                    <div class="text-left mt-4">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-warning ml-2">Reset</button>
                        <a href="{{ route('dataMahasiswa') }}" class="btn btn-secondary ml-2">Back</a>
                    </div>

                    <div id="retirementWarning" class="alert alert-warning mt-3 d-none">
                        ⚠️ This person is within years of retirement.
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

{{-- Preview Photo Script --}}
<script>
    const photoInput = document.getElementById('photoInput');
    const photoPreview = document.getElementById('photoPreview');
    photoInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
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

{{-- Age Calculation Script --}}
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

        if (age >= 60 && age < 85) {
            retirementWarning.classList.remove('d-none');
        } else {
            retirementWarning.classList.add('d-none');
        }
    });
</script>


@endsection
