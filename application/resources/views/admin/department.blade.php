@extends('layouts.admin')

@section('meta')
    <title>Manage Department Names | Workday Time Clock</title>
    <meta name="description" content="Workday Manage Department Names">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Manage Department Names") }}
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('admin/department/add') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
                        @csrf
                        <div class="form-group">
                            <label for="department">{{ __("Department Name") }}</label>
                            <input type="text" name="department" value="" class="form-control text-uppercase" required>
                        </div>

                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Save") }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table width="100%" class="table datatables-table custom-table-ui" data-order='[[ 0, "desc" ]]'>
                        <thead>
                            <tr>
                                <th>{{ __("Department") }}</th>
                                <th>{{ __("Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($data)
                                @foreach ($data as $department)
                                <tr>
                                    <td>{{ $department->department }}</td>
                                    <td class="text-right"> 
                                        <a href="{{ url('admin/department/delete') }}/{{ $department->id }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script src="{{ asset('assets/js/initiate-datatables-with-search.js') }}"></script> 
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
    <script src="{{ asset('/assets/js/initiate-toast.js') }}"></script>
@endsection