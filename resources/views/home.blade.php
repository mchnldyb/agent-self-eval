@extends('layouts.app')

@section('content')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center mt-5">
        <h1 class="display-4">Dashboard</h1>
        {{--<p class="lead"></p>--}}
    </div>

    <div class="container mt-5">
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 shadow-sm">
                {{--<div class="card-header">--}}
                    {{--<h4 class="my-0 font-weight-normal">Free</h4>--}}
                {{--</div>--}}
                <div class="card-body">
                    <i class="fa fa-plus fa-4x" aria-hidden="true"></i>
                    <h1 class="card-title pricing-card-title"><small class="text-muted">Evaluate</small></h1>
                    <button type="button" onclick="window.location='{{ route('agentadd') }}'" class="btn btn-lg btn-block btn-primary">Add</button>
                </div>
            </div>
            <div class="card mb-4 shadow-sm">
                {{--<div class="card-header">--}}
                    {{--<h4 class="my-0 font-weight-normal">Pro</h4>--}}
                {{--</div>--}}
                <div class="card-body">
                    <i class="fa fa-eye fa-4x" aria-hidden="true"></i>
                    <h1 class="card-title pricing-card-title"><small class="text-muted">My Reports</small></h1>
                    {{--<ul class="list-unstyled mt-3 mb-4">--}}
                        {{--<li>20 users included</li>--}}
                        {{--<li>10 GB of storage</li>--}}
                        {{--<li>Priority email support</li>--}}
                        {{--<li>Help center access</li>--}}
                    {{--</ul>--}}
                    <button type="button" onclick="window.location='{{ route('agentview') }}'" class="btn btn-lg btn-block btn-primary">View</button>
                </div>
            </div>
        </div>
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-10">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">SE</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="formGroupExampleInput">Example label</label>--}}
                            {{--<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="formGroupExampleInput2">Another label</label>--}}
                            {{--<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
