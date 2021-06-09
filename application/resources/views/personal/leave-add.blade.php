@extends('layouts.personal')

@section('meta')
    <title>Request Leave | Workday Time Clock</title>
    <meta name="description" content="Workday Request Leave">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Request Leave") }}
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('personal/leave/request') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <div class="form-group">
                  <label for="type">{{ __("Leave Type") }}</label>
                  <select name="type" class="form-control" required>
                    <option value="" disabled selected>Choose...</option>
                    @isset($leave_type)
                        @foreach ($leave_type as $data)
                            @foreach($leave_rights as $leave)
                                @if($leave == $data->id)
                                    <option value="{{ $data->leavetype }}" data-id="{{ $data->id }}">{{ $data->leavetype }}</option>
                                @endif
                            @endforeach
                        @endforeach
                    @endisset
                  </select>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="leavefrom">{{ __("Leave From") }}</label>
                        <input type="date" name="leavefrom" value="" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="leaveto">{{ __("Leave Until") }}</label>
                        <input type="date" name="leaveto" value="" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="returndate">{{ __("Return Date") }}</label>
                    <input type="date" name="returndate" value="" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="reason">{{ __("Reason") }}</label>
                    <textarea rows="5" name="reason" value="" class="form-control text-uppercase" required></textarea>
                </div>
            </div>
            <div class="card-footer text-right">
                <input type="hidden" name="typeid" value="">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Submit") }}</span>
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
    <script src="{{ asset('/assets/js/get-leavetype-id.js') }}"></script>
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
    <script src="{{ asset('/assets/js/initiate-toast.js') }}"></script>
@endsection