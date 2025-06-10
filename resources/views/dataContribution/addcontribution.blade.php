@extends('layouts.app')

@section('title', 'Add Payment')

@section('contents')
    <form method="POST" id="paymentForm">
        @csrf
        <div class="row">
            <!-- Full Width Column -->
            <div class="col-12">
                <div class="card w-100">
                    <div class="card-header">Payment Information</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <select name="member_name" class="form-control" id="memberNameSelect" required>
                                <option value="">Selected Member</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <select name="savings_type" class="form-control" required>
                                <option value="">Select Savings Type</option>
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
                            <a href="{{ route('dataContribution.contributionlist') }}" class="btn btn-secondary ml-2">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
