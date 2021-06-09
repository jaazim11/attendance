@extends('layouts.admin')

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
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table width="100%" class="table datatables-table custom-table-ui" data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                        <th>{{ __('Employee') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Leave From') }}</th>
                        <th>{{ __('Leave Until') }}</th>
                        <th>{{ __('Return Date') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                   @isset($leaves)
                        @foreach ($leaves as $data)
                        <tr>
                            <td>{{ $data->employee }}</td>
                            <td>{{ $data->type }}</td>
                            <td>@php echo e(date('D, M d, Y', strtotime($data->leavefrom))) @endphp</td>
                            <td>@php echo e(date('D, M d, Y', strtotime($data->leaveto))) @endphp</td>
                            <td>@php echo e(date('M d, Y', strtotime($data->returndate))) @endphp</td>
                            <td>{{ $data->status }}</td>
                            <td class="text-right">
                                <a href="{{ url('admin/leave/edit') }}/{{ $data->id }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-pen"></i></a>

                                <a href="{{ url('admin/leave/delete') }}/{{ $data->id }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a>
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
    <script src="{{ asset('/assets/js/initiate-toast.js') }}"></script>
@endsection