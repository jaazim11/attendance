@extends('layouts.admin')

@section('meta')
    <title>Shifts | Workday Time Clock</title>
    <meta name="description" content="Workday Shifts">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Shifts") }}

                <a href="{{ route('shift.add') }}" class="btn btn-outline-primary btn-sm float-right">
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
                        <th>{{ __('Shift Name') }}</th>
                        <th>{{ __('Start Time') }}</th>
                        <th>{{ __('End Time') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shifts as $shift)
                    <tr>
                        <td>{{ $shift->shift_name }}</td>
                        <td>{{ $shift->start_time }}</td>
                        <td>{{ $shift->end_time }}</td>
                        <td>
                            @if($shift->status == '1') 
                                <span class="green">{{ __('Active') }}</span>
                            @else
                                <span class="teal">{{ __('Inactive') }}</span>
                            @endif
                        </td>
                        <td class="text-right">
                            <a href="{{ route('shift.edit', ['shift_id' => $shift->id]) }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-pen"></i></a>
                            <a href="{{ route('shift.delete', ['shift_id' => $shift->id]) }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/initiate-datatables-with-search.js') }}"></script> 
@endsection