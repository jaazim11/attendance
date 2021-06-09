@extends('layouts.admin')

@section('meta')
    <title>Add New Schedule | Workday Time Clock</title>
    <meta name="description" content="Workday Add New Schedule">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Add New Schedule") }}

                <a href="{{ url('/admin/schedule') }}" class="btn btn-outline-primary btn-sm float-right">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('admin/schedule/store') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <div class="form-group">
                  <label for="employee">{{ __("Employee") }}</label>
                  <select name="employee" class="form-control" required>
                    <option value="" disabled selected>Choose...</option>
                    @isset($employee)
                    @foreach ($employee as $data)
                        <option value="{{ $data->lastname }}, {{ $data->firstname }}" data-reference="{{ $data->id }}">{{ $data->lastname }}, {{ $data->firstname }}</option>
                    @endforeach
                    @endisset
                  </select>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="intime">{{ __("Start Time") }}</label>
                        <input type="time" name="intime" value="" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="outime">{{ __("Off Time") }}</label>
                        <input type="time" name="outime" value="" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="datefrom">{{ __("From") }}</label>
                    <input type="date" name="datefrom" value="" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="dateto">{{ __("Until") }}</label>
                    <input type="date" name="dateto" value="" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="hours">{{ __("Total Hours") }}</label>
                    <input type="number" name="hours" value="" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="restdays">{{ __('Choose Rest Days') }}</label>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="restday[]" value="Sunday" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">{{ __("Sunday") }}</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="restday[]" value="Monday" class="custom-control-input" id="customCheck2">
                      <label class="custom-control-label" for="customCheck2">{{ __("Monday") }}</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="restday[]" value="Tuesday" class="custom-control-input" id="customCheck3">
                      <label class="custom-control-label" for="customCheck3">{{ __("Tuesday") }}</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="restday[]" value="Wednesday" class="custom-control-input" id="customCheck4">
                      <label class="custom-control-label" for="customCheck4">{{ __("Wednesday") }}</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="restday[]" value="Thursday" class="custom-control-input" id="customCheck5">
                      <label class="custom-control-label" for="customCheck5">{{ __("Thursday") }}</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="restday[]" value="Friday" class="custom-control-input" id="customCheck6">
                      <label class="custom-control-label" for="customCheck6">{{ __("Friday") }}</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="restday[]" value="Saturday" class="custom-control-input" id="customCheck7">
                      <label class="custom-control-label" for="customCheck7">{{ __("Saturday") }}</label>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <input type="hidden" value="" name="reference">
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Save") }}</span>
                </button>
                <a href="{{ url('/admin/schedule') }}" class="btn btn-secondary">
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