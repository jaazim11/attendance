@extends('layouts.admin')

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
        <form action="{{ url('admin/leave/update') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <div class="form-group">
                  <label for="employee">{{ __("Employee") }}</label>
                  <input type="text" name="employee" value="@isset($leave->employee){{ $leave->employee }}@endisset" class="form-control" readonly>
                </div>

                <div class="form-group">
                  <label for="type">{{ __("Leave Type") }}</label>
                  <input type="text" name="type" value="@isset($leave->type){{ $leave->type }}@endisset" class="form-control" readonly>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="leavefrom">{{ __("Leave From") }}</label>
                        <input type="text" name="leavefrom" value="@isset($leave->leavefrom){{ $leave->leavefrom }}@endisset" class="form-control" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="leaveto">{{ __("Leave Until") }}</label>
                        <input type="text" name="leaveto" value="@isset($leave->leaveto){{ $leave->leaveto }}@endisset" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="returndate">{{ __("Return Date") }}</label>
                    <input type="text" name="returndate" value="@isset($leave->returndate){{ $leave->returndate }}@endisset" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="reason">{{ __("Reason") }}</label>
                    <textarea rows="5" name="reason" value="@isset($leave->reason){{ $leave->reason }}@endisset" class="form-control text-uppercase" readonly>@isset($leave->reason){{ $leave->reason }}@endisset</textarea>
                </div>

                <hr>

                <div class="form-group">
                  <label for="status">{{ __("Status") }}</label>
                  <select name="status" class="form-control" required>
                    <option value="" disabled selected>Choose...</option>
                    <option value="Approved" @isset($leave->status) @if($leave->status == 'Approved') selected @endif @endisset>{{ __("Approved") }}</option>
                    <option value="Pending" @isset($leave->status) @if($leave->status == 'Pending') selected @endif @endisset>{{ __("Pending") }}</option>
                    <option value="Declined" @isset($leave->status) @if($leave->status == 'Declined') selected @endif @endisset>{{ __("Declined") }}</option>
                  </select>
                </div>

                <div class="from-group">
                    <label for="comment">{{ __("Add Comment") }} <small class="text-muted">({{ __("optional") }})</small></label>
                    <textarea name="comment" class="form-control" rows="5">@isset($leave->comment){{ $leave->comment }}@endisset</textarea>
                </div>
            </div>
            <div class="card-footer text-right">
                <input type="hidden" name="id" value="@isset($leave->id){{ $leave->id }}@endisset">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Update") }}</span>
                </button>
                <a href="{{ url('/admin/leave') }}" class="btn btn-secondary">
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