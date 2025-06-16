@extends('layouts.app')
@section('title', 'Incident Contributions')

@section('contents')
<style>
    table.table-custom tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    table.table-custom tr:nth-child(odd) {
        background-color: #ffffff;
    }
    table.table-custom td,
    table.table-custom th {
        padding-top: 6px;
        padding-bottom: 6px;
        vertical-align: middle;
    }
    .badge-active {
        background-color: #28a745;
        color: #fff;
        padding: 5px 10px;
        border-radius: 12px;
    }
    .badge-inactive {
        background-color: #6c757d;
        color: #fff;
        padding: 5px 10px;
        border-radius: 12px;
    }
    .badge-pending {
        background-color: #ffc107;
        color: #212529;
        padding: 5px 10px;
        border-radius: 12px;
    }
</style>

<div class="card">
    <div class="card-body">


                <div class="row align-items-center mb-3">
                    <!-- Requestee Dropdown -->
                    <div class="col-md-3 mb-2">
                        <label for="requestee" class="form-label">Requestee</label>
                        <select id="requestee" name="requestee" class="form-control">
                            <option value="">Select Member</option>
                            <option value="Ramon - Outpatient Minor Surgery">David A. Torres</option>
                        </select>
                    </div>

                    <!-- Incident Title 1 -->
                    <div class="col-md-2 mb-2">
                        <label for="incident_title_1" class="form-label">Incident Title</label>
                        <input type="text" id="incident_title_1" class="form-control" name="incident_title[]" value="Ramon - Outpatient Minor Surgery" readonly>
                    </div>

                    <!-- Incident Title 2 -->
                    <div class="col-md-2 mb-2">
                        <label for="incident_title_2" class="form-label">Incident Type</label>
                        <input type="text" id="incident_title_2" class="form-control" name="incident_title[]" value="Incident Type" readonly>
                    </div>

                    <!-- Representative Search -->

                    <div class="col-md-3 mb-2">
                                <label for="search_member">Representative</label>
                               <input type="text" id="search_member" placeholder="Select Representative..." autocomplete="off" class="form-control">
                                <input type="hidden" id="member_id" name="member_id">
                                <div id="suggestions" style="position:fixed; z-index:1000; background:white; border:1px solid #ccc; width:auto; display:none;"></div>
                       </div>

                        <style>
                            .suggestion-item {
                                padding: 8px 12px;
                                border-bottom: 1px solid #eee;
                            }
                            .suggestion-item:hover {
                                background-color: #f1f1f1;
                                cursor: pointer;
                            }
                        </style>


                  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>

                                    $(document).ready(function() {
                                        $('#search_member').on('input', function() {
                                            let query = $(this).val();

                                            if (query.length > 1) {
                                                $.ajax({
                                                    url: '/get-members',
                                                    method: 'GET',
                                                    data: { search: query },
                                                    success: function(data) {
                                                        let suggestions = '';
                                                        data.forEach(function(member) {
                                                            suggestions += `<div class="suggestion-item" data-id="${member.id}" data-name="${member.full_name}" style="cursor:pointer;">${member.full_name}</div>`;
                                                        });
                                                        $('#suggestions').html(suggestions).show();
                                                    }
                                                });
                                            } else {
                                                $('#suggestions').empty().hide();
                                            }
                                        });

                                        // On selecting a suggestion
                                        $(document).on('click', '.suggestion-item', function() {
                                            let memberName = $(this).data('name');
                                            let memberId = $(this).data('id');

                                            $('#search_member').val(memberName);
                                            $('#member_id').val(memberId); // Assuming you have a hidden input to store member ID
                                            $('#suggestions').empty().hide();
                                        });
                                    });



                        </script>

                    <!-- <div class="col-md-3 mb-2">
                        <label for="representative" class="form-label">Representative</label>
                        <input type="text" id="representative" name="representative" class="form-control" placeholder="Search Representative...">
                    </div> -->

                    <!-- View Members Button -->
                    <div class="col-md-2 mb-2">
                        <label class="form-label d-block" style="visibility: hidden;">Button</label>
                        <button type="button" id="viewMembersBtn" class="btn btn-primary w-100">
                            View Members
                        </button>
                    </div>
                </div>







        {{-- Summary Card --}}
        <div class="card mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <div class="mb-2 mb-md-0">
                    <h5 class="mb-1">Incident Title:</h5>
                    <h3 class="mb-0">Ramon - Outpatient Minor Surgery</h3>
                </div>
                <div class="text-md-right">
                    <div class="text-muted">Total Contribution</div>
                    <h3 class="text-success mb-0">₱35000.00</h3>
                </div>
            </div>
        </div>

        {{-- Responsive Table --}}
        <div class="table-responsive">
           <table class="table table-hover table-custom" id="membersTable">
                <thead class="table-primary">
                    <tr>

                        <th>ID</th>
                        <th>Member Name</th>
                        <th>Address</th>
                        <th>Amount Paid</th>
                        <th>Pastor</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>001</td>
                        <td>John Doe</td>
                        <td>Bogo City</td>
                        <td>35000</td>
                        <td>Rev. Smith</td>
                        <td>
                            <!-- <a href="#" class="btn btn-primary btn-sm">Detail</a> -->

                            <a href="{{ route('dataContribution.add_Incedent_contribution_payment') }}" class="btn btn-success btn-sm">Add Contribution</a>
                        </td>
                        <td><span style="color: white; padding: 0.25em 0.6em; border-radius: 0.25rem;" class="badge-active">Paid</span></td>
                    </tr>
                    <tr>

                        <td>002</td>
                        <td>Jane Doe</td>
                        <td>Bogo City</td>
                        <td>0.00</td>
                        <td>Rev. Smith</td>
                        <td>
                            <!-- <a href="#" class="btn btn-primary btn-sm">Detail</a> -->

                           <a href="{{ route('dataContribution.add_Incedent_contribution_payment') }}" class="btn btn-success btn-sm">Add Contribution</a>                        </td>
                        <td>
                        <span style="background-color: red; color: white; padding: 0.25em 0.6em; border-radius: 0.25rem;">
                           Unpaid
                        </span>
                        </td>


                    </tr>

                </tbody>
            </table>
        </div>

    </div>
</div>

<script>
    // Simple client-side search filter
    document.getElementById('searchInput').addEventListener('keyup', function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#membersTable tbody tr');
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection
