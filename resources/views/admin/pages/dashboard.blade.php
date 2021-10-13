@extends('admin.layout.main')

@push('dashboard_style')
Custom Style
@endpush

@section('dashboard_content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="{{ route('generate.report') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<div class="row">

    <!-- Number of Users -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user_count }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Number of Country -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Country</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $country_count }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-globe-asia fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Number of City -->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">City
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $city_count }}</div>
                            </div>
                            {{-- <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-city fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Number if State-->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            States</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $state_count }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fab fa-usps fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Number if Department-->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Departments</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $department_count }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tasks fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Number if Employees-->
    <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Employees</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $employee_count }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection

@push('dashboard_script')
Custom Script
@endpush
