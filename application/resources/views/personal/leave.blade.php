@extends('layouts.personal')

@section('meta')
    <title>Leave | Workday Time Clock</title>
    <meta name="description" content="Workday Leave">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Leave") }}
                <a href="{{ url('/personal/leave/add') }}" class="btn btn-outline-primary btn-sm float-right">
                    <i class="fas fa-plus"></i><span class="button-with-icon">{{ __("Request Leave") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('personal/leave') }}" method="post" class="form-inline responsive-filter-form needs-validation mb-2" novalidate autocomplete="off" accept-charset="utf-8">
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
                        <th>{{ __("Leave From") }}</th>
                        <th>{{ __("Leave Until") }}</th>
                        <th>{{ __("Leave Type") }}</th>
                        <th>{{ __("Reason") }}</th>
                        <th>{{ __("Return Date") }}</th>
                        <th>{{ __("Status") }}</th>
                        <th>{{ __("Actions") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($leave)
                    @foreach ($leave as $data)
                    <tr>
                        <td>{{ $data->leavefrom }}</td>
                        <td>{{ $data->leaveto }}</td>
                        <td>{{ $data->type }}</td>
                        <td>{{ $data->reason }}</td>
                        <td>{{ $data->returndate }}</td>
                        <td>{{ $data->status }}</td>
                        <td class="text-right">
                            @if($data->status == "Approved")
                                <a href="{{ url('/personal/leave/view') }}/{{ $data->id }}" class="btn btn-sm btn-outline-info"><i class="fas fa-file"></i></a>
                            @else
                                <a href="{{ url('/personal/leave/edit') }}/{{ $data->id }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-pen"></i></a>

                                <a href="{{ url('/personal/leave/delete') }}/{{ $data->id }}" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
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