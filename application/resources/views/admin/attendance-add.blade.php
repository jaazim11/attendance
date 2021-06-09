@extends('layouts.admin')

@section('meta')
    <title>Attendance Manual Entry | Workday Time Clock</title>
    <meta name="description" content="Workday Attendance Manual Entry">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Manual Entry") }}

                <a href="{{ url('/admin/attendance') }}" class="btn btn-outline-primary btn-sm float-right">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('admin/attendance/add-entry') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <div class="form-group">
                  <label for="name">{{ __("Employee") }}</label>
                  <select name="name" class="form-control" required>
                    <option value="" disabled selected>Choose...</option>
                    @isset($employee)
                    @foreach ($employee as $data)
                        <option value="{{ $data->lastname }}, {{ $data->firstname }}" data-reference="{{ $data->id }}">{{ $data->lastname }}, {{ $data->firstname }}</option>
                    @endforeach
                    @endisset
                  </select>
                </div>

                <div class="form-group">
                    <label for="date">{{ __("Date") }}</label>
                    <input type="date" name="date" value="" class="form-control" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="clockin">{{ __("Clock IN") }} <small class="text-muted">({{ __("required") }})</small></label>
                        <input type="time" name="clockin" value="" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="clockout">{{ __("Clock OUT") }} <small class="text-muted">({{ __("optional") }})</small></label>
                        <input type="time" name="clockout" value="" class="form-control">
                    </div>
                </div>
                
            </div>
            <div class="card-footer text-right">
                <input type="hidden" value="" name="reference">
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Save") }}</span>
                </button>
                <a href="{{ url('/admin/attendance') }}" class="btn btn-secondary">
                    <i class="fas fa-times-circle"></i><span class="button-with-icon">{{ __("Cancel") }}</span>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection


@section('scripts')
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
    <script src="{{ asset('/assets/js/get-employee-id.js') }}"></script>
    <script src="{{ asset('/assets/js/initiate-toast.js') }}"></script>
@endsection