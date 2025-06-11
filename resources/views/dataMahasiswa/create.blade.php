@extends('layouts.app')

@section('title', 'Add New Member')

@section('contents')
    <!-- <h1 class="mb-0">Add Member Information</h1> -->
  <!-- <hr /> -->
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
                                <select name="Suffixes" class="form-control">
                                <option value="">Select Suffixes</option>
                                <option value=""></option>
                                <option value="">Jr</option>
                                <option value="">Sr</option>
                                <option value="">III</option>

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
                                <input type="text" name="Geography" class="form-control" placeholder="Geography">
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

<!--
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div> -->

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <!-- <label for="birthday" class="form-label">Birthday</label> -->
                                <input type="date" name="birthday" id="birthday" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <!-- <label for="age" class="form-label">Age</label> -->
                                <input type="text" name="age" id="age" class="form-control" readonly>
                            </div>

                            <!-- returement age calulcation current age /retirment age -->
                             <!-- <div class="col-md-6 mb-3">
                                <label for="age" class="form-label">Retirement Age</label>
                                <input type="text" name="age" id="age"  placeholder="Retirement age 65"; class="form-control" readonly>
                            </div> -->
                        </div>

                        <div class="mb-3">
                            <select name="role" class="form-control">
                                <option value="">Membership type</option>
                                <option value="adult">Initial</option>
                                <option value="kid">Renewal</option>

                            </select>
                        </div>

<!--
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <select name="pastor" class="form-control">
                                    <option value="">Select Representative</option>
                                    <option value="Pastor John">Pastor</option>
                                    <option value="Pastor Mary">Individual</option>
                                    <option value="Pastor Lee">Institution</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <select name="church_org" class="form-control">
                                    <option value="">Select Church/Organization</option>
                                    <option value="Church A">Church A</option>
                                    <option value="Church B">Church B</option>
                                    <option value="Org C">Org C</option>
                                </select>
                            </div>
                        </div> -->

                        <div class="card">


    <div class="card-header bg-primary text-white">
        Representative Details
    </div>
    <div class="card-body">
        <div class="row">
            <!-- First Dropdown: Type Selector -->
            <div class="col-md-6 mb-3">
                <!-- <label for="repType" class="form-label">Select Type</label> -->
                <select id="repType" class="form-control" required>
                    <option value="">Select Representative Type</option>
                    <option value="Pastor">Pastor</option>
                    <option value="Individual">Individual</option>
                    <option value="Institution">Institution</option>
                </select>
            </div>

            <!-- Second Dropdown: Dynamic Based on First -->
            <div class="col-md-6 mb-3">
                <!-- <label for="repSelect" class="form-label">Select Representative</label> -->
                <select name="representative" id="repSelect" class="form-control" required>
                    <option value="">Select Representative</option>
                    <!-- Options will be dynamically injected -->
                </select>
            </div>
        </div>
    </div>
</div>
<br>
<script>
    const repType = document.getElementById('repType');
    const repSelect = document.getElementById('repSelect');

    const pastors = [
        { value: 'Pastor John', label: 'Pastor John' },
        { value: 'Pastor Mary', label: 'Pastor Mary' },
        { value: 'Pastor Lee', label: 'Pastor Lee' }
    ];

    const institutions = [
        { value: 'Org Rep A', label: 'Org Rep A - Org A' },
        { value: 'Org Rep B', label: 'Org Rep B - Org B' },
        { value: 'Org Rep C', label: 'Org Rep C - Org C' }
    ];

    const individuals = [
        { value: 'Stewardship 1', label: 'Stewardship 1' },
        { value: 'Stewardship 2', label: 'Stewardship 2' },
        { value: 'Stewardship 3', label: 'Stewardship 3' }
    ];

    repType.addEventListener('change', function () {
        const selectedType = this.value;
        repSelect.innerHTML = '<option value="">Select Representative</option>'; // Clear old options

        let options = [];

        if (selectedType === 'Pastor') {
            options = pastors;
        } else if (selectedType === 'Institution') {
            options = institutions;
        } else if (selectedType === 'Individual') {
            options = individuals;
        }

        options.forEach(opt => {
            const option = document.createElement('option');
            option.value = opt.value;
            option.textContent = opt.label;
            repSelect.appendChild(option);
        });
    });
</script>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="beneficiary_1" class="form-control" placeholder="Beneficiary 1">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="beneficiary_2" class="form-control" placeholder="Beneficiary 2">
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="beneficiary_1" class="form-control" placeholder="Beneficiary 3">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="beneficiary_2" class="form-control" placeholder="Beneficiary 4">
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="beneficiary_1" class="form-control" placeholder="Beneficiary 5">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="beneficiary_2" class="form-control" placeholder="Beneficiary 6">
                            </div>
                        </div>
                        <!-- Buttons -->
                        <div class="text-left mt-4">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-warning ml-2">Reset</button>
                            <a href="{{ route('dataMahasiswa') }}" class="btn btn-secondary ml-2">Back</a>
                        </div>

                        <!-- Retirement Warning -->
                        <div id="retirementWarning" class="alert alert-warning mt-3 d-none">
                            ⚠️ This person is within years of retirement.
                        <!-- ⚠️ This person is within 3 years of retirement (age 60 in the Philippines). -->
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
            //60-65, 70-75, 80-85
            // Show retirement warning if age is between 57 and 59 5 Years in the system
            if (age >= 60 && age < 85) {
                retirementWarning.classList.remove('d-none');
            } else {
                retirementWarning.classList.add('d-none');
            }
        });
    </script>
@endsection
