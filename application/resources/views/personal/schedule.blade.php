@extends('layouts.personal')

@section('meta')
    <title>Schedule | Workday Time Clock</title>
    <meta name="description" content="Workday Schedule">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Schedule") }}
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('personal/schedule') }}" method="post" class="form-inline responsive-filter-form needs-validation mb-2" novalidate autocomplete="off" accept-charset="utf-8">
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
                        <th>{{ __("From") }}</th>
                        <th>{{ __("Until") }}</th>
                        <th>{{ __("Start Time") }}</th>
                        <th>{{ __("Off Time") }}</th>
                        <th>{{ __("Total Hours") }}</th>
                        <th>{{ __("Rest Days") }}</th>
                        <th>{{ __("Status") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($schedule)
                        @foreach ($schedule as $data)
                        <tr>
                            <td>
                                @php 
                                    echo e(date('Y-m-d',strtotime($data->datefrom)));
                                @endphp 
                            </td>
                            <td>
                                @php 
                                    echo e(date('Y-m-d',strtotime($data->dateto)));
                                @endphp
                            </td>
                            <td>
                                @php
                                    if($time_format == 12) {
                                        echo e($data->intime);
                                    } else {
                                        echo e(date("H:i", strtotime($data->intime)));     
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                    if($time_format == 12) {
                                        echo e($data->outime);
                                    } else {
                                        echo e(date("H:i", strtotime($data->outime))); 
                                    }
                                @endphp
                            </td>
                            <td>{{ $data->hours }} hours</td>
                            <td>{{ $data->restday }}</td>
                            <td>
                                @if($data->archive == '0') 
                                    <span class="text-success">{{ __("Active") }}</span>
                                @else
                                    <span class="text-info">{{ __("Archive") }}</span>
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