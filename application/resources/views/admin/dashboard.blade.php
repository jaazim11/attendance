@extends('layouts.admin')

@section('meta')
    <title>Dashboard | Workday Time Clock</title>
    <meta name="description" content="Workday Dashboard">
@endsection

@section('content')

<div class="container">
    <div class="jumbotron shadow-sm bg-white">
      <h1 class="display-4">{{ __("Welcome back") }}, <span class="text-capitalize">@php echo e(strtolower($firstname)); @endphp</span>!</h1>
      <p class="lead">Workday {{ __("dashboard provides an overview of the application's key information") }}</p>
      <button class="btn btn-outline-primary" role="button">{{ __("See the key stats below") }}</button>
    </div>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card bg-light-green border-0 shadow-sm">
                <div class="card-body text-dark">
                    <p class="mb-0">{{ __("Total Number of Employees") }} <span class="text-muted">({{ __("Active") }})</span></p>
                    <h3 class="mt-3 font-weight-bolder">{{ $total_employees }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-light-blue border-0 shadow-sm">
                <div class="card-body text-dark">
                    <p class="mb-0">{{ __("Total Number of Attendance Records") }}</p>
                    <h3 class="mt-3 font-weight-bolder">{{ $total_attendances }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-light-gray border-0 shadow-sm">
                <div class="card-body text-dark">
                    <p class="mb-0">{{ __("Total Number of Schedule Records") }} <span class="text-muted">({{ __("Active") }})</span></p>
                    <h3 class="mt-3 font-weight-bolder">{{ $total_schedules }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-light-violet border-0 shadow-sm">
                <div class="card-body text-dark">
                    <p class="mb-0">{{ __("Total Number of Leave Requests") }} <span class="text-muted">({{ __("Approved") }})</span></p>
                    <h3 class="mt-3 font-weight-bolder">{{ $total_leave_request }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

