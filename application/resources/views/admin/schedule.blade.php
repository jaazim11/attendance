@extends('layouts.admin')

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

                <a href="{{ url('/admin/schedule/add') }}" class="btn btn-outline-primary btn-sm float-right">
                    <i class="fas fa-plus"></i><span class="button-with-icon">{{ __("Add") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table width="100%" class="table datatables-table custom-table-ui" data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                        <th>{{ __('Employee') }}</th>
                        <th>{{ __('Start') }}/{{ __("Off Time") }}</th>
                        <th>{{ __('Total Hours') }}</th>
                        <th>{{ __('Rest Days') }}</th>
                        <th>{{ __('From') }}</th>
                        <th>{{ __('Until') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($schedule)
                        @foreach ($schedule as $data)
                        <tr>
                            <td>{{ $data->employee }}</td>
                            <td>
                                @php
                                    if($time_format == 12) {
                                        echo e(date("h:i A", strtotime($data->intime)));
                                        echo " - ";
                                        echo e(date("h:i A", strtotime($data->outime)));
                                    } else {
                                        echo e(date("H:i", strtotime($data->intime)));
                                        echo " - ";
                                        echo e(date("H:i", strtotime($data->outime)));
                                    }
                                @endphp
                            </td>
                            <td>{{ $data->hours }} hr</td>
                            <td>{{ $data->restday }}</td>
                            <td>@php echo e(date('D, M d, Y', strtotime($data->datefrom))) @endphp</td>
                            <td>@php echo e(date('D, M d, Y', strtotime($data->dateto))) @endphp</td>
                            <td>
                                @if($data->archive == '0') 
                                    <span class="green">{{ __('Active') }}</span>
                                @else
                                    <span class="teal">{{ __('Archived') }}</span>
                                @endif
                            </td>
                            <td class="text-right">
                                @if($data->archive == '0') 
                                    <a href="{{ url('admin/schedule/edit/') }}/{{ $data->id }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-pen"></i></a>
                                    <a href="{{ url('admin/schedule/archive/') }}/{{ $data->id }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-archive"></i></a>
                                    <a href="{{ url('admin/schedule/delete/') }}/{{ $data->id }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a>
                                @else
                                    <a href="{{ url('admin/schedule/delete/') }}/{{ $data->id }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
            <!-- <small class="text-muted">{{ __("Only 250 recent records will be displayed use Date range filter to get more records") }}</small> -->
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/initiate-datatables-with-search.js') }}"></script> 
@endsection