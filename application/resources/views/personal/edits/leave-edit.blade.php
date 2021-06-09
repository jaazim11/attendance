@extends('layouts.personal')

@section('meta')
    <title>Edit Leave | Workday Time Clock</title>
    <meta name="description" content="Workday Edit Leave">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Edit Leave") }}
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('personal/leave/update') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <div class="form-group">
                  <label for="type">{{ __("Leave Type") }}</label>
                  <select name="type" class="form-control" required>
                    <option selected>Choose...</option>
                    @isset($leave_type))
                    @foreach ($leave_type as $data)
                        <option value="{{ $data->leavetype }}" @if($data->leavetype == $type) selected @endif>{{ $data->leavetype }}</option>
                    @endforeach
                    @endisset
                  </select>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="leavefrom">{{ __("Leave from") }}</label>
                        <input type="date" name="leavefrom" value="@isset($leave->leavefrom){{ $leave->leavefrom }}@endisset" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="leaveto">{{ __("Leave until") }}</label>
                        <input type="date" name="leaveto" value="@isset($leave->leaveto){{ $leave->leaveto }}@endisset" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="returndate">{{ __("Return date") }}</label>
                    <input type="date" name="returndate" value="@isset($leave->returndate){{ $leave->returndate }}@endisset" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="reason">{{ __("Reason") }}</label>
                    <textarea rows="5" name="reason" value="@isset($leave->reason){{ $leave->reason }}@endisset" class="form-control text-uppercase" required>@isset($leave->reason){{ $leave->reason }}@endisset</textarea>
                </div>
            </div>
            <div class="card-footer text-right">
                <input type="hidden" name="id" value="@isset($employee_id){{ $employee_id }}@endisset">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Update") }}</span>
                </button>
                <a href="{{ url('/personal/leave') }}" class="btn btn-secondary">
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