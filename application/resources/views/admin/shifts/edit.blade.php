@extends('layouts.admin')

@section('meta')
    <title>Edit Shift | Workday Time Clock</title>
    <meta name="description" content="Workday Edit Shift">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Edit Shift") }}

                <a href="{{ route('shift.list') }}" class="btn btn-outline-primary btn-sm float-right">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ route('shift.update', ['shift_id' => $shift->id]) }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">

                <div class="form-group">
                    <label for="shift_name">{{ __("Shift Name") }}</label>
                    <input type="text" name="shift_name" value="{{old('shift_name') ? old('shift_name') : $shift->shift_name}}" class="form-control" required placeholder="Shift name">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="start_time">{{ __("Start Time") }}</label>
                        <input type="time" name="start_time" value="{{ $shift->start_time }}" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="end_time">{{ __("End Time") }}</label>
                        <input type="time" name="end_time" value="{{ $shift->end_time }}" class="form-control" required>
                    </div>
                </div>

                
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Update") }}</span>
                </button>
                <a href="{{ route('shift.list') }}" class="btn btn-secondary">
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