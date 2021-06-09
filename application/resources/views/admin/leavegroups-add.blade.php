@extends('layouts.admin')

@section('meta')
    <title>Add Leave Group | Workday Time Clock</title>
    <meta name="description" content="Workday Add Leave Group">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Add Leave Group") }}

                <a href="{{ url('/admin/leavegroups') }}" class="btn btn-outline-primary btn-sm float-right">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('admin/leavegroups/store') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <div class="form-group">
                    <label for="leavegroup">{{ __("Leave Group Name") }}</label>
                    <input type="text" name="leavegroup" value="" class="form-control text-uppercase" required>
                </div>

                <div class="form-group">
                    <label for="description">{{ __("Description") }}</label>
                    <input type="text" name="description" value="" class="form-control text-uppercase" required>
                </div>

                <div class="form-group">
                    <label for="leaveprivileges">{{ __('Leave Privileges') }}</label>
                    @isset($leavetypes)
                    <div class="row">
                    @foreach($leavetypes as $leave)
                        <div class="col-md-6">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="leaveprivileges[]" value="{{ $leave->id }}" class="custom-control-input" id="customCheck{{ $leave->id }}">
                              <label class="custom-control-label" for="customCheck{{ $leave->id }}">{{ $leave->leavetype }}</label>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    @endisset
                </div>
               
               <div class="form-group">
                  <label for="status">{{ __("Status") }}</label>
                  <select name="status" class="custom-select" required>
                    <option value="" disabled selected>Choose...</option>
                    <option value="1">{{ __("Active") }}</option>
                    <option value="0">{{ __("Disabled") }}</option>
                  </select>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Save") }}</span>
                </button>
                <a href="{{ url('/admin/leavegroups') }}" class="btn btn-secondary">
                    <i class="fas fa-times-circle"></i><span class="button-with-icon">{{ __("Cancel") }}</span>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection


@section('scripts')
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
    <script src="{{ asset('/assets/js/initiate-toast.js') }}"></script>
@endsection