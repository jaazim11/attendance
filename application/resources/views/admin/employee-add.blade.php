@extends('layouts.admin')

@section('meta')
    <title>Add New Employee | Workday Time Clock</title>
    <meta name="description" content="Workday Add New Employee">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Employee Profile") }}

                <a href="{{ url('/admin/employee') }}" class="btn btn-outline-primary btn-sm float-right">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('admin/employee/store') }}" method="post" class="needs-validation" autocomplete="off" novalidate enctype="multipart/form-data" accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <p class="lead">{{ __("Personal Information") }}</p>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">{{ __("First Name") }}</label>
                        <input type="text" name="firstname" value="" class="form-control text-uppercase" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="mi">{{ __("Middle Name") }}</label>
                        <input type="text" name="mi" value="" class="form-control text-uppercase">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="lastname">{{ __("Last Name") }}</label>
                        <input type="text" name="lastname" value="" class="form-control text-uppercase" required>
                    </div>
                </div>

                <div class="form-group">
                  <label for="gender">{{ __("Gender") }}</label>
                  <select name="gender" class="custom-select text-uppercase">
                    <option value="" disabled selected>Choose...</option>
                    <option value="MALE">{{ __("MALE") }}</option>
                    <option value="FEMALE">{{ __("FEMALE") }}</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="civilstatus">{{ __("Civil Status") }}</label>
                  <select name="civilstatus" class="custom-select text-uppercase">
                    <option value="" disabled selected>Choose...</option>
                    <option value="SINGLE">{{ __("SINGLE") }}</option>
                    <option value="MARRIED">{{ __("MARRIED") }}</option>
                    <option value="ANNULLED">{{ __("ANNULLED") }}</option>
                    <option value="WIDOWED">{{ __("WIDOWED") }}</option>
                    <option value="LEGALLY SEPARATED">{{ __("LEGALLY SEPARATED") }}</option>
                  </select>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="emailaddress">{{ __("Email Address") }} <small class="text-muted">(personal)</small></label>
                        <input type="email" name="emailaddress" value="" class="form-control text-lowercase" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mobileno">{{ __("Mobile Number") }}</label>
                        <input type="text" name="mobileno" value="" class="form-control text-uppercase">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="birthday">{{ __("Date of Birth") }}</label>
                        <input type="date" name="birthday" value="" class="form-control text-uppercase">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="age">{{ __("Age") }}</label>
                        <input type="text" name="age" value="" class="form-control text-uppercase">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nationalid">{{ __("National ID") }}</label>
                    <input type="text" name="nationalid" value="" class="form-control text-uppercase">
                </div>

                <div class="form-group">
                    <label for="birthplace">{{ __("Place of Birth") }}</label>
                    <input type="text" name="birthplace" value="" class="form-control text-uppercase">
                </div>

                <div class="form-group">
                    <label for="homeaddress">{{ __("Home Address") }}</label>
                    <input type="text" name="homeaddress" value="" class="form-control text-uppercase">
                </div>

                <div class="form-group">
                    <label for="homeaddress">{{ __("Upload Profile photo") }}</label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input text-uppercase" id="imagefile" accept="image/png, image/jpeg, image/jpg">
                        <label class="custom-file-label" for="imagefile">Choose file...</label>
                    </div>
                </div>

                <p class="lead mt-4">{{ __("Designation") }}</p>
                <hr>

                <div class="form-group">
                  <label for="company">{{ __("Company") }}</label>
                  <select name="company" class="custom-select text-uppercase">
                    <option value="" disabled selected>Choose...</option>
                    @isset($company)
                        @foreach ($company as $data)
                            <option value="{{ $data->company }}"> {{ $data->company }}</option>
                        @endforeach
                    @endisset
                  </select>
                </div>

                <div class="form-group">
                  <label for="department">{{ __("Department") }}</label>
                  <select name="department" class="custom-select text-uppercase">
                    <option value="" disabled selected>Choose...</option>
                    @isset($department)
                        @foreach ($department as $data)
                            <option value="{{ $data->department }}"> {{ $data->department }}</option>
                        @endforeach
                    @endisset
                  </select>
                </div>

                <div class="form-group">
                  <label for="jobtitle">{{ __("Job Title") }}</label>
                  <select name="jobtitle" class="custom-select text-uppercase">
                    <option value="" disabled selected>Choose...</option>
                    @isset($jobtitle)
                        @foreach ($jobtitle as $data)
                            <option value="{{ $data->jobtitle }}"> {{ $data->jobtitle }}</option>
                        @endforeach
                    @endisset
                  </select>
                </div>

                <div class="form-group">
                    <label for="idno">{{ __("ID Number") }}</label>
                    <input type="text" name="idno" value="" class="form-control text-uppercase" required>
                </div>
                
                <div class="form-group">
                    <label for="companyemail">{{ __('Email Address') }} <small class="text-muted">({{ __("Company") }})</small></label>
                    <input type="text" name="companyemail" value="" class="form-control text-lowercase">
                </div>

                <div class="form-group">
                  <label for="leaveprivilege">{{ __("Leave Group") }}</label>
                  <select name="leaveprivilege" class="custom-select text-uppercase">
                    <option value="" disabled selected>Choose...</option>
                    @isset($leavegroup)
                        @foreach ($leavegroup as $data)
                            <option value="{{ $data->id }}"> {{ $data->leavegroup }}</option>
                        @endforeach
                    @endisset
                  </select>
                </div>

                <p class="lead mt-4">{{ __("Employment Information") }}</p>
                <hr class="mt-0">

                <div class="form-group">
                  <label for="employmenttype">{{ __("Employment Type") }}</label>
                  <select name="employmenttype" class="custom-select text-uppercase" required>
                    <option value="" disabled selected>Choose...</option>
                    <option value="Regular">{{ __("Regular") }}</option>
                    <option value="Trainee">{{ __("Trainee") }}</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="employmentstatus">{{ __("Employment Status") }}</label>
                  <select name="employmentstatus" class="custom-select text-uppercase" required>
                    <option value="" disabled selected>Choose...</option>
                    <option value="Active">{{ __("Active") }}</option>
                    <option value="Archived">{{ __("Archived") }}</option>
                  </select>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="startdate">{{ __("Official Start Date") }}</label>
                        <input type="date" name="startdate" value="" class="form-control text-uppercase">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dateregularized">{{ __("Date of Regularization") }}</label>
                        <input type="date" name="dateregularized" value="" class="form-control text-uppercase">
                    </div>
                </div>

            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Save") }}</span>
                </button>
                <a href="{{ url('/admin/employee') }}" class="btn btn-secondary">
                    <i class="fas fa-times-circle"></i><span class="button-with-icon">{{ __("Cancel") }}</span>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
    <script src="{{ asset('/assets/js/initiate-toast.js') }}"></script>
    <script src="{{ asset('/assets/vendor/bootstrap-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('/assets/js/initiate-bootstrap-custom-file-input.js') }}"></script>
@endsection