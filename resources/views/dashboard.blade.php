@extends('layouts.app')

@section('title')

@section('contents')
<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Stewardship - Admin Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Initials Member (total)</div>
                                            <div id="initial-members" class="h5 mb-0 font-weight-bold text-gray-800">Loading...</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-solid fa-user-check fa-2x text-gray-300"></i>
                                            {{-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Renewal Members (total)
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div id="renewal-members" class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Loading...</div>
                                                </div>
                                                <!-- <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 97%" aria-valuenow="97" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-solid fa-user-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                fetch('/count-member-types')
                                    .then(response => response.json())
                                    .then(data => {
                                        document.getElementById('initial-members').textContent = data.initial;
                                        document.getElementById('renewal-members').textContent = data.renewal;
                                    })
                                    .catch(error => {
                                        console.error('Error fetching member types count:', error);
                                        document.getElementById('initial-members').textContent = 'Error';
                                        document.getElementById('renewal-members').textContent = 'Error';
                                    });
                            });
                            </script>


                          <!-- total memebers Card  -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Members</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">300</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-solid fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Members</div>
                                            <div id="total-members" class="h5 mb-0 font-weight-bold text-gray-800">Loading...</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-solid fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                fetch('/count-members')
                                    .then(response => response.json())
                                    .then(data => {
                                        document.getElementById('total-members').textContent = data.total;
                                    })
                                    .catch(error => {
                                        console.error('Error fetching member count:', error);
                                        document.getElementById('total-members').textContent = 'Error';
                                    });
                            });
                            </script>



                        <!-- Pending Requests Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Kids (Total)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-children fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Membership Growth Bar Chart</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Membership Growth Rate</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Adult
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Kids
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Students
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
