@extends('layouts.app')

@section('title', 'Add Payment')

@section('contents')
    <form method="POST" id="paymentForm">
        @csrf
        <div class="row">
            <!-- Left Card: Photo Display -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Photo</div>
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <!-- Photo preview -->
                        <img id="photoPreview" src="https://static.vecteezy.com/system/resources/thumbnails/039/845/042/small_2x/male-default-avatar-profile-gray-picture-grey-photo-placeholder-gray-profile-anonymous-face-picture-illustration-isolated-on-white-background-free-vector.jpg" alt="Photo Preview" class="img-fluid mt-3" style="max-height: 300px; border-radius: 8px;" />

                        <!-- Hidden member photos -->
                        <img id="memberPhotoJohnDoe" src="https://static.vecteezy.com/system/resources/previews/036/594/092/non_2x/man-empty-avatar-photo-placeholder-for-social-networks-resumes-forums-and-dating-sites-male-and-female-no-photo-images-for-unfilled-user-profile-free-vector.jpg" alt="John Doe" style="display:none;" />
                        <img id="memberPhotoJaneSmith" src="https://static.vecteezy.com/system/resources/previews/036/594/092/non_2x/man-empty-avatar-photo-placeholder-for-social-networks-resumes-forums-and-dating-sites-male-and-female-no-photo-images-for-unfilled-user-profile-free-vector.jpg" alt="Jane Smith" style="display:none;" />
                    </div>
                </div>
            </div>

            <!-- Right Card: Payment Info -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Payment Information</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <select name="member_name" class="form-control" id="memberNameSelect" required>
                                <option value="">Select Member</option>
                                <option value="JohnDoe">John Doe</option>
                                <option value="JaneSmith">Jane Smith</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <select name="savings_type" class="form-control" required>
                                <option value="">Savings Type</option>
                                <option value="Approved">Wedding</option>
                                <option value="Approved">Maternity</option>
                                <option value="Approved">College Education</option>
                                <option value="For Release">Retirement</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <select name="payment_type" class="form-control" required>
                                <option value="">Select Payment Type</option>
                                <option value="Cash">Cash</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="GCash">GCash</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="reference_number" class="form-control" placeholder="Invoice / Reference Number" required>
                        </div>

                        <div class="mb-3">
                            <input type="number" name="amount" class="form-control" placeholder="Enter Amount" min="1" required>
                        </div>

                        <!-- Buttons -->
                        <div class="text-left mt-4">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-warning ml-2">Reset</button>
                             <a href="{{ route('dataMahasiswa') }}" class="btn btn-secondary ml-2">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Photo Display Script -->
    <script>
        const photoPreview = document.getElementById('photoPreview');
        const memberNameSelect = document.getElementById('memberNameSelect');

        const memberPhotos = {
            JohnDoe: document.getElementById('memberPhotoJohnDoe').src,
            JaneSmith: document.getElementById('memberPhotoJaneSmith').src,
        };

        memberNameSelect.addEventListener('change', function () {
            const selectedMember = this.value;

            if (selectedMember && memberPhotos[selectedMember]) {
                photoPreview.src = memberPhotos[selectedMember];
            } else {
                photoPreview.src = '/images/placeholder.png'; // default placeholder
            }
        });
    </script>
@endsection
