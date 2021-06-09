@extends('layouts.personal')

@section('meta')
    <title>View Leave | Workday Time Clock</title>
    <meta name="description" content="Workday View Leave">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("View Leave") }}
                <a href="{{ url('/personal/leave') }}" class="btn btn-outline-primary btn-sm float-right">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="#" method="" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="form-group">
                  <label for="type">{{ __("Leave Type") }}</label>
                  <input type="text" name="type" value="{{ $leave->type }}" class="form-control" readonly>
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
                    <textarea rows="5" name="reason" value="" class="form-control text-uppercase" readonly="">@isset($leave->reason){{ $leave->reason }}@endisset</textarea>
                </div>
            </div>
            <div class="card-footer text-right">
            </div>
        </form>
    </div>
</div>
@endsection
