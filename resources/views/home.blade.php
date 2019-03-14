@extends('layouts.app')

@section('content')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center mt-5">
        <h1>Dashboard</h1>
        {{--<p class="lead"></p>--}}
    </div>

    <div class="container mt-5">
        <div class="col-md-8 offset-md-2">
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 shadow-sm">
                    {{--<div class="card-header">--}}
                    {{--<h4 class="my-0 font-weight-normal">Free</h4>--}}
                    {{--</div>--}}
                    <div class="card-body">
                        <i class="fa fa-plus fa-4x" aria-hidden="true"></i>
                        <h1 class="card-title pricing-card-title"><small class="text-muted">Evaluate</small></h1>
                        <button type="button" onclick="window.location='{{ route('agentadd') }}'" class="btn btn-lg btn-block sc-btn-primary">Add</button>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm">
                    {{--<div class="card-header">--}}
                    {{--<h4 class="my-0 font-weight-normal">Pro</h4>--}}
                    {{--</div>--}}
                    <div class="card-body">
                        <i class="fa fa-eye fa-4x" aria-hidden="true"></i>
                        <h1 class="card-title pricing-card-title"><small class="text-muted">My Reports</small></h1>
                        <button type="button" onclick="window.location='{{ route('agentview') }}'" class="btn btn-lg btn-block sc-btn-primary">View</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
