@extends('layouts.personal')

@section('meta')
    <title>Attendance | Workday Time Clock</title>
    <meta name="description" content="Workday Attendance">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Attendance") }}
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('personal/attendance') }}" method="post" class="form-inline responsive-filter-form needs-validation mb-2" novalidate autocomplete="off" accept-charset="utf-8">
                @csrf
                <div class="form-group">
                    <label for="start" class="mr-2">{{ __("Date Range") }}</label>
                    <input name="start" type="date" class="form-control form-control-sm mr-1" value="" required>
                </div>
                <div class="form-group">
                    <input name="end" type="date" class="form-control form-control-sm mr-1" value="" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-filter"></i><span class="button-with-icon">{{ __("Filter") }}</span>
                    </button>
                </div>
            </form>

            <table width="100%" class="table datatables-table custom-table-ui" data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                        <th>{{ __("Date") }}</th>
                        <th>{{ __("Clock In") }}</th>
                        <th>{{ __("Clock Out") }}</th>
                        <th>{{ __("Total Hours") }}</th>
                        <th>{{ __("Status") }} <span class="text-muted">({{ __("In") }}/{{ __("Out") }})</span></th>
                    </tr>
                </thead>
                <tbody>
                    @isset($attendance)
                        @foreach($attendance as $data)
                            <tr>
                                <td>{{ $data->date }}</td>
                                <td>
                                    @php
                                        if($data->timein !== null) {
                                            if ($time_format == 12) {
                                                echo e(date('h:i:s A', strtotime($data->timein)));
                                            } else {
                                                echo e(date('H:i:s', strtotime($data->timein)));
                                            }
                                        }
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        if($data->timeout !== null) {
                                            if ($time_format == 12) {
                                                echo e(date('h:i:s A', strtotime($data->timeout)));
                                            } else {
                                                echo e(date('H:i:s', strtotime($data->timeout)));
                                            }
                                        }
                                    @endphp
                                </td>
                                <td>
                                @isset($data->totalhours)
                                    @php
                                        if(stripos($data->totalhours, ".") === false) {
                                            $h = $data->totalhours;
                                        } else {
                                            $HM = explode('.', $data->totalhours); 
                                            $h = $HM[0]; 
                                            $m = $HM[1];
                                        }
                                    @endphp

                                    @if(stripos($data->totalhours, ".") === false) 
                                        {{ $h }} hr
                                    @else 
                                        {{ $h }} hr {{ $m }} mins
                                    @endif
                                @endisset
                                </td>
                                <td>
                                    @if($data->status_timein !== null && $data->status_timeout !== null) 
                                        <span class="@if($data->status_timein == 'Late In') text-warning @else text-primary @endif">{{ $data->status_timein }}</span> / 
                                        <span class="@if($data->status_timeout == 'Early Out') text-danger @else text-success @endif">{{ $data->status_timeout }}</span> 
                                    @elseif($data->status_timein == 'Late In') 
                                        <span class="text-warning">{{ $data->status_timein }}</span>
                                    @else 
                                        <span class="text-primary">{{ $data->status_timein }}</span>
                                    @endif 
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
            <small class="text-muted">{{ __("Only 250 recent records will be displayed use Date range filter to get more records") }}</small>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/initiate-datatables.js') }}"></script> 
@endsection