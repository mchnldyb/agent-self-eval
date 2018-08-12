@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h2>Add new report</h2>
                    </div>

                    <div class="card-body">

                        <button type="button" onclick="window.location='{{ route('home') }}'" class="btn btn-outline-info mb-4"><< Back to Dashboard</button>

                        @if(Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif

                        @if(count($errors))
                            <div class="alert alert-danger">

                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                            </div>
                        @endif

                        <form method="POST" action="{{url('agents')}}">

                            @csrf

                            <div class="form-row">
                                <div class="col-md-6 form-group">

                                    <label for="formGroupIssue">Issue Handled</label>
                                    <input type="number" name="Issue_Number" class="form-control" id="formGroupIssue" placeholder="Issue Number">

                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="formGroupSatisfaction">Client Satisfied?</label>
                                    <select class="form-control" id="slSatisfaction" name="client_satisfied">
                                        <option selected>Choose</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>

                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label for="formGroupSatisfaction">Client Satisfied?</label>--}}
                                {{--<select class="form-control" id="slSatisfaction">--}}
                                    {{--<option selected>Choose</option>--}}
                                    {{--<option>Yes</option>--}}
                                    {{--<option>No</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}

                            <br>

                            <div class="form-row">

                                <div class="col-md-12 form-group">

                                    <label for="formGroupconfidence">Self Confidence</label>
                                    <select class="form-control" id="slconfidence" name="client_confidence">
                                        <option selected>Choose</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>

                                </div>

                            </div>

                            <div class="form-row mt-2">
                                <div class="col-md-12 form-group">
                                    <div class="form-group">
                                        <label for="formGroupSatisfaction">Please rate yourself</label>
                                        <br>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="Self_Rating" id="self_rating" value="1"> 1 - Poor
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="Self_Rating" id="self_rating" value="2"> 2 - Average
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="Self_Rating" id="self_rating" value="3" > 3 - Good
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="Self_Rating" id="self_rating" value="4" > 4 - Very Good
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="Self_Rating" id="self_rating" value="5" > 5 - Excellent
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="btn-group mr-1 float-right">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                <button type="reset" class="btn btn-outline-primary btn-lg  ml-4">Reset</button>
                            </div>





                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection