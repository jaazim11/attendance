@extends('layouts.admin')

@section('meta')
    <title>Edit Role Permission | Workday Time Clock</title>
    <meta name="description" content="Workday Edit Role Permission">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Edit Role Permission") }}

                <a href="{{ url('/admin/user/roles') }}" class="btn btn-outline-primary btn-sm float-right">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('admin/user/roles/permission/update') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <div class="form-group">
                    <label for="role_name">{{ __("Dashboard") }}</label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1" @isset($role) @if(in_array('1', $role)==true) checked @endif @endisset name="perms[]" value="1">
                      <label class="custom-control-label" for="customCheck1">{{ __("Open dashboard page") }}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="role_name">{{ __("Employee") }}</label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck2" @isset($role) @if(in_array('2', $role)==true) checked @endif @endisset name="perms[]" value="2">
                      <label class="custom-control-label" for="customCheck2">{{ __("Open employee page") }}</label>
                    </div>
                    <div class="pl-3 pt-2">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch1" @isset($role) @if(in_array('21', $role)==true) checked @endif @endisset name="perms[]" value="21">
                          <label class="custom-control-label" for="customSwitch1">{{ __("View employee profile") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch2" @isset($role) @if(in_array('22', $role)==true) checked @endif @endisset name="perms[]" value="22">
                          <label class="custom-control-label" for="customSwitch2">{{ __("Add employee record") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch3" @isset($role) @if(in_array('23', $role)==true) checked @endif @endisset name="perms[]" value="23">
                          <label class="custom-control-label" for="customSwitch3">{{ __("Edit employee record") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch4" @isset($role) @if(in_array('24', $role)==true) checked @endif @endisset name="perms[]" value="24">
                          <label class="custom-control-label" for="customSwitch4">{{ __("Delete employee record") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch5" @isset($role) @if(in_array('25', $role)==true) checked @endif @endisset name="perms[]" value="25">
                          <label class="custom-control-label" for="customSwitch5">{{ __("Archive employee record") }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="role_name">{{ __("Attendance") }}</label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck3" @isset($role) @if(in_array('3', $role)==true) checked @endif @endisset name="perms[]" value="3">
                      <label class="custom-control-label" for="customCheck3">{{ __("Open attendance page") }}</label>
                    </div>
                    <div class="pl-3 pt-2">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch6" @isset($role) @if(in_array('31', $role)==true) checked @endif @endisset name="perms[]" value="31">
                          <label class="custom-control-label" for="customSwitch6">{{ __("Add attendance record") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch7" @isset($role) @if(in_array('32', $role)==true) checked @endif @endisset name="perms[]" value="32">
                          <label class="custom-control-label" for="customSwitch7">{{ __("Delete attendance record") }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="role_name">{{ __("Schedule") }}</label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck4" @isset($role) @if(in_array('4', $role)==true) checked @endif @endisset name="perms[]" value="4">
                      <label class="custom-control-label" for="customCheck4">{{ __("Open schedule page") }}</label>
                    </div>
                    <div class="pl-3 pt-2">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch8" @isset($role) @if(in_array('41', $role)==true) checked @endif @endisset name="perms[]" value="41">
                          <label class="custom-control-label" for="customSwitch8">{{ __("Add employee schedule") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch9" @isset($role) @if(in_array('42', $role)==true) checked @endif @endisset name="perms[]" value="42">
                          <label class="custom-control-label" for="customSwitch9">{{ __("Edit employee schedule") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch11" @isset($role) @if(in_array('43', $role)==true) checked @endif @endisset name="perms[]" value="43">
                          <label class="custom-control-label" for="customSwitch11">{{ __("Delete employee schedule") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch10" @isset($role) @if(in_array('44', $role)==true) checked @endif @endisset name="perms[]" value="44">
                          <label class="custom-control-label" for="customSwitch10">{{ __("Archive employee schedule") }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="role_name">{{ __("Leave of Absence") }}</label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck5" @isset($role) @if(in_array('5', $role)==true) checked @endif @endisset name="perms[]" value="5">
                      <label class="custom-control-label" for="customCheck5">{{ __("Open leave page") }}</label>
                    </div>
                    <div class="pl-3 pt-2">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch12" @isset($role) @if(in_array('51', $role)==true) checked @endif @endisset name="perms[]" value="51">
                          <label class="custom-control-label" for="customSwitch12">{{ __("Edit leave record") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch13" @isset($role) @if(in_array('52', $role)==true) checked @endif @endisset name="perms[]" value="52">
                          <label class="custom-control-label" for="customSwitch13">{{ __("Delete leave record") }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="role_name">{{ __("Reports") }}</label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck7" @isset($role) @if(in_array('7', $role)==true) checked @endif @endisset name="perms[]" value="7">
                      <label class="custom-control-label" for="customCheck7">{{ __("Open reports page") }}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="role_name">{{ __("Users") }}</label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck8" @isset($role) @if(in_array('8', $role)==true) checked @endif @endisset name="perms[]" value="8">
                      <label class="custom-control-label" for="customCheck8">{{ __("Open users page") }}</label>
                    </div>
                    <div class="pl-3 pt-2">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch15" @isset($role) @if(in_array('81', $role)==true) checked @endif @endisset name="perms[]" value="81">
                          <label class="custom-control-label" for="customSwitch15">{{ __("Add new user") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch16" @isset($role) @if(in_array('82', $role)==true) checked @endif @endisset name="perms[]" value="82">
                          <label class="custom-control-label" for="customSwitch16">{{ __("Edit user account") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch17" @isset($role) @if(in_array('83', $role)==true) checked @endif @endisset name="perms[]" value="83">
                          <label class="custom-control-label" for="customSwitch17">{{ __("Delete user account") }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="role_name">{{ __("Settings") }}</label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck6" @isset($role) @if(in_array('9', $role)==true) checked @endif @endisset name="perms[]" value="9">
                      <label class="custom-control-label" for="customCheck6">{{ __("Open settings page") }}</label>
                    </div>
                    <div class="pl-3 pt-2">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch14" @isset($role) @if(in_array('91', $role)==true) checked @endif @endisset name="perms[]" value="91">
                          <label class="custom-control-label" for="customSwitch14">{{ __("Update settings") }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="role_name">{{ __("User Roles") }}</label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck9" @isset($role) @if(in_array('10', $role)==true) checked @endif @endisset name="perms[]" value="10">
                      <label class="custom-control-label" for="customCheck9">{{ __("Open user roles page") }}</label>
                    </div>
                    <div class="pl-3 pt-2">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch18" @isset($role) @if(in_array('101', $role)==true) checked @endif @endisset name="perms[]" value="101">
                          <label class="custom-control-label" for="customSwitch18">{{ __("Add new role") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch19" @isset($role) @if(in_array('102', $role)==true) checked @endif @endisset name="perms[]" value="102">
                          <label class="custom-control-label" for="customSwitch19">{{ __("Edit role") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch20" @isset($role) @if(in_array('103', $role)==true) checked @endif @endisset name="perms[]" value="103">
                          <label class="custom-control-label" for="customSwitch20">{{ __("Set Permissio") }}n</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch21" @isset($role) @if(in_array('104', $role)==true) checked @endif @endisset name="perms[]" value="104">
                          <label class="custom-control-label" for="customSwitch21">{{ __("Delete role") }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="role_name">{{ __("Companies") }}</label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck10" @isset($role) @if(in_array('11', $role)==true) checked @endif @endisset name="perms[]" value="11">
                      <label class="custom-control-label" for="customCheck10">{{ __("Open companies page") }}</label>
                    </div>
                    <div class="pl-3 pt-2">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch22" @isset($role) @if(in_array('111', $role)==true) checked @endif @endisset name="perms[]" value="111">
                          <label class="custom-control-label" for="customSwitch22">{{ __("Add company") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch23" @isset($role) @if(in_array('112', $role)==true) checked @endif @endisset name="perms[]" value="112">
                          <label class="custom-control-label" for="customSwitch23">{{ __("Delete company") }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="role_name">{{ __("Departments") }}</label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck11" @isset($role) @if(in_array('12', $role)==true) checked @endif @endisset name="perms[]" value="12">
                      <label class="custom-control-label" for="customCheck11">{{ __("Open department page") }}</label>
                    </div>
                    <div class="pl-3 pt-2">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch24" @isset($role) @if(in_array('121', $role)==true) checked @endif @endisset name="perms[]" value="121">
                          <label class="custom-control-label" for="customSwitch24">{{ __("Add department") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch25" @isset($role) @if(in_array('122', $role)==true) checked @endif @endisset name="perms[]" value="122">
                          <label class="custom-control-label" for="customSwitch25">{{ __("Delete department") }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="role_name">{{ __("Job Titles") }}</label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck12" @isset($role) @if(in_array('13', $role)==true) checked @endif @endisset name="perms[]" value="13">
                      <label class="custom-control-label" for="customCheck12">{{ __("Open job titles page") }}</label>
                    </div>
                    <div class="pl-3 pt-2">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch26" @isset($role) @if(in_array('131', $role)==true) checked @endif @endisset name="perms[]" value="131">
                          <label class="custom-control-label" for="customSwitch26">{{ __("Add job title") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch27" @isset($role) @if(in_array('132', $role)==true) checked @endif @endisset name="perms[]" value="132">
                          <label class="custom-control-label" for="customSwitch27">{{ __("Delete job title") }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="role_name">{{ __("Leave Types") }}</label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck13" @isset($role) @if(in_array('14', $role)==true) checked @endif @endisset name="perms[]" value="14">
                      <label class="custom-control-label" for="customCheck13">{{ __("Open leave types page") }}</label>
                    </div>
                    <div class="pl-3 pt-2">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch28" @isset($role) @if(in_array('141', $role)==true) checked @endif @endisset name="perms[]" value="141">
                          <label class="custom-control-label" for="customSwitch28">{{ __("Add leave type") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch29" @isset($role) @if(in_array('142', $role)==true) checked @endif @endisset name="perms[]" value="142">
                          <label class="custom-control-label" for="customSwitch29">{{ __("Delete leave type") }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="role_name">{{ __("Leave Groups") }}</label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck14" @isset($role) @if(in_array('15', $role)==true) checked @endif @endisset name="perms[]" value="15">
                      <label class="custom-control-label" for="customCheck14">{{ __("Open leave groups page") }}</label>
                    </div>
                    <div class="pl-3 pt-2">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch30" @isset($role) @if(in_array('151', $role)==true) checked @endif @endisset name="perms[]" value="151">
                          <label class="custom-control-label" for="customSwitch30">{{ __("Add leave group") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch31" @isset($role) @if(in_array('152', $role)==true) checked @endif @endisset name="perms[]" value="152">
                          <label class="custom-control-label" for="customSwitch31">{{ __("Edit leave group") }}</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch32" @isset($role) @if(in_array('153', $role)==true) checked @endif @endisset name="perms[]" value="153">
                          <label class="custom-control-label" for="customSwitch32">{{ __("Delete leave group") }}</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer text-right">
                <input type="hidden" value="@isset($id){{ $id }}@endisset" name="role_id">

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Update") }}</span>
                </button>

                <a href="{{ url('/admin/user/roles') }}" class="btn btn-secondary">
                    <i class="fas fa-times-circle"></i><span class="button-with-icon">{{ __("Cancel") }}</span>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
@endsection