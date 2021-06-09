@extends('layouts.personal')

@section('meta')
    <title>Edit My Profile | Workday Time Clock</title>
    <meta name="description" content="Workday Edit My Profile">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Edit My Profile") }}
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('personal/profile/update') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">{{ __("First Name") }}</label>
                        <input type="text" name="firstname" value="@isset($person_details->firstname){{ $person_details->firstname }}@endisset" class="form-control text-uppercase" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="mi">{{ __("Middle Name") }}</label>
                        <input type="text" name="mi" value="@isset($person_details->mi){{ $person_details->mi }}@endisset" class="form-control text-uppercase" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="lastname">{{ __("Last Name") }}</label>
                        <input type="text" name="lastname" value="@isset($person_details->lastname){{ $person_details->lastname }}@endisset" class="form-control text-uppercase" required>
                    </div>
                </div>

                <div class="form-group">
                  <label for="gender">{{ __("Gender") }}</label>
                  <select name="gender" class="form-control" required>
                    <option disabled selected value="">Choose...</option>
                    <option value="MALE" @isset($person_details->gender) @if($person_details->gender == 'MALE') selected @endif @endisset>MALE</option>
                    <option value="FEMALE" @isset($person_details->gender) @if($person_details->gender == 'FEMALE') selected @endif @endisset>FEMALE</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="civilstatus">{{ __("Civil Status") }}</label>
                  <select name="civilstatus" class="form-control" required>
                    <option disabled selected value="">Choose...</option>
                    <option value="SINGLE" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'SINGLE') selected @endif @endisset>SINGLE</option>
                    <option value="MARRIED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'MARRIED') selected @endif @endisset>MARRIED</option>
                    <option value="ANNULLED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'ANNULLED') selected @endif @endisset>ANNULLED</option>
                    <option value="WIDOWED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'WIDOWED') selected @endif @endisset>WIDOWED</option>
                    <option value="LEGALLY SEPARATED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'LEGALLY SEPARATED') selected @endif @endisset>LEGALLY SEPARATED</option>
                  </select>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="height">{{ __("Height") }} <small class="text-muted">(cm)</small></label>
                        <input type="text" name="height" value="@isset($person_details->height){{ $person_details->height }}@endisset" class="form-control" placeholder="000" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="weight">{{ __("Weight") }} <small class="text-muted">(pounds)</small></label>
                        <input type="text" name="weight" value="@isset($person_details->weight){{ $person_details->weight }}@endisset" class="form-control" placeholder="000" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="height">{{ __("Email Address") }} <small class="text-muted">({{ __("Personal") }})</small></label>
                        <input type="email" name="emailaddress" value="@isset($person_details->emailaddress){{ $person_details->emailaddress }}@endisset" class="form-control text-lowercase" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="weight">{{ __("Mobile Number") }}</label>
                        <input type="text" name="mobileno" value="@isset($person_details->mobileno){{ $person_details->mobileno }}@endisset" class="form-control" placeholder="000 0000 000" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="height">{{ __("Age") }}</label>
                        <input type="text" name="age" value="@isset($person_details->age){{ $person_details->age }}@endisset" class="form-control" placeholder="00" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="weight">{{ __("Date of Birth") }}</label>
                        <input type="date" name="birthday" value="@isset($person_details->birthday){{ $person_details->birthday }}@endisset" class="form-control" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="height">{{ __("Place of Birth") }}</label>
                        <input type="text" name="birthplace" value="@isset($person_details->birthplace){{ $person_details->birthplace }}@endisset" class="form-control text-uppercase" placeholder="City, Province, Country" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="weight">{{ __("Home Address") }}</label>
                        <input type="text" name="homeaddress" value="@isset($person_details->homeaddress){{ $person_details->homeaddress }}@endisset" class="form-control text-uppercase" placeholder="House/Unit Number, Building, Street, City, Province, Country" required>
                    </div>
                </div>

            </div>
            <div class="card-footer text-right">
                <input type="hidden" name="id" value="@isset($employee_id){{ $employee_id }}@endisset">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Update") }}</span>
                </button>
                <a href="{{ url('/personal/profile') }}" class="btn btn-secondary">
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
@endsection