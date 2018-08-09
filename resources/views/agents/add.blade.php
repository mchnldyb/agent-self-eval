@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">SE</div>

                    <div class="card-body">

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
                                <div class="col">

                                    <label for="formGroupIssue">Issue Handled</label>
                                    <input type="text" name="issuehandled" class="form-control" id="formGroupIssue" placeholder="Issue Number">

                                </div>

                                <div class="col">
                                    <label for="formGroupSatisfaction">Client Satisfied?</label>
                                    <select class="form-control" id="slSatisfaction" name="clientsatisfied">
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

                                <div class="col">

                                    <label for="formGroupconfidence">Client Confidence</label>
                                    <select class="form-control" id="slconfidence" name="clientconfidence">
                                        <option selected>Choose</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>

                                </div>

                                <div class="col">



                                </div>

                            </div>

                            <div class="form-row mt-3">
                                <div class="form-group">
                                    <label for="formGroupSatisfaction">Self Rating?</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1"> 1
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2"> 2
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline disabled">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3" > 3
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline disabled">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4" > 4
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline disabled">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="5" > 5
                                        </label>
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