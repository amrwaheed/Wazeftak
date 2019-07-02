@extends('layouts.master')

<head>
    <title>Wazzaf  Add information</title>

</head>

@section('dashboradlink')
    employement
@endsection

@section('employement')
    active
@endsection

@section('content')
    <div class="col-12" id="" >
        @if ($message = Session::get('status'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/users/employement/{{$employement->user_id}}" method="post">
            {{csrf_field()}}
            {!! method_field('PUT') !!}
            <div class="row information">
                <div class="col-md-6 my-3">
                    <label>Position applied for</label><span class="css-dv1j8g">*</span>
                    <select name="position" id="" class="form-control">
                        <option value="">========== Select position ==========</option>
                        @foreach($positions as $position)
                            <option value="{{$position->id}}"  {{ $employement->position_id == $position->id ? 'selected' : '' }} >{{$position->position_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 my-3">
                    <label>What is your current career level?</label><span class="css-dv1j8g">*</span>
                    <select name="career_level" id="" class="form-control">
                        <option value="">====== Select career level ========</option>
                        @foreach($scientics as $scientic)
                            <option value="{{$scientic->id}}" {{ $employement->scientific_id == $scientic->id ? 'selected' : '' }} >{{$scientic->scientific_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 my-3">
                    <label>Expected Salary</label> <span class="css-dv1j8g">*</span>
                    <input class="form-control" name="salaryexpected" placeholder="Salary Expected" value="{{$employement->expected_salary}}">
                </div>
                <div class="col-md-6 my-3">
                    <label>Currancy</label><span class="css-dv1j8g">*</span>
                    <select name="currancy" id="" class="form-control">
                        <option value="">======= Select Currancy ===========</option>
                        @foreach($currencies as $currency)
                            <option value="{{$currency->id}}"  {{ $employement->currancy_id == $currency->id ? 'selected' : '' }} >{{$currency->currency_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Do You Smoke?</label><span class="css-dv1j8g">*</span>
                    <div class="form-group">
                        <input type="radio" name="smoke" {{ $employement->smoke == 'Yes' ? 'checked' : ''}} value="Yes" id="Yes">
                        <label for="Yes">Yes</label>
                        <input type="radio" name="smoke" {{ $employement->smoke == 'No' ? 'checked' : ''}} value="No" id="No">
                        <label for="No">No</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Do you have license?</label><span class="css-dv1j8g">*</span>
                    <div class="form-group">
                        <input type="radio" name="license" {{ $employement->license_drive == 'Yes' ? 'checked' : ''}}  id="licenseYes" value="Yes">
                        <label for="licenseYes">Yes</label>
                        <input type="radio" name="license" {{ $employement->license_drive == 'No' ? 'checked' : ''}}  id="licenseNo" value="No">
                        <label for="licenseNo">No</label>
                    </div>
                </div>

                <div class="col-md-6 my-3">
                    <label>Where do you see yourself in five years?</label> <span class="css-dv1j8g">*</span>
                    <textarea class="form-control" name="fiveyears" id="fiveyears" cols="30" rows="6" placeholder="Where do you see youself in five years?">{{$employement->youafterfive}}</textarea>
                </div>

                <div class="col-md-12 my-3">
                    <div class="text-center m-auto">
                        <input type="submit" name="subcareer" id="subcareer" class="btn btn-info" value="Update"></div>
                </div>

            </div>
        </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


@endsection
