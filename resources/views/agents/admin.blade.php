@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mb-3">Evaluations</h1>
        <hr/>
        <div class="col-md-12 mt-4">
            @if(count($users))
                {{--<table class="table" id="reports_table">--}}
                    {{--<thead class="thead-light">--}}
                    {{--<tr>--}}
                        {{--<th scope="col">Date</th>--}}
                        {{--<th scope="col">Agent</th>--}}
                        {{--<th scope="col">Issue</th>--}}
                        {{--<th scope="col">Client Satisfied</th>--}}
                        {{--<th scope="col">Self Confidence</th>--}}
                        {{--<th scope="col">Rating</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
            <div class="row">
                <div class="col-md-9">
                    <h3>Per Agent</h3>
                    <div class="card-columns">
                        @foreach($users as $user)
                            <div class="card border-primary">
                                <div class="card-body">
                                    <h5 class="card-title" style="text-align: center">{{ $user->name }}</h5>
                                    <div class="" style="text-align: center">
                                        <i class="fa fa-eye fa-4x" aria-hidden="true" ></i>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    {{--<small class="text-muted">Last updated 3 mins ago</small>--}}
                                    <button type="button" onclick="window.location='{{ url('/admin/'.$user->id) }}'" class="btn btn-lg btn-block btn-primary">View</button>
                                </div>
                            </div>
                            {{--<tr>--}}
                            {{--<th scope="row">{{ $agent->date }}</th>--}}
                            {{--<td>{{ $agent->agent }}</td>--}}
                            {{--<td>{{ $agent->issue_number }}</td>--}}
                            {{--<td>{{ $agent->satisfaction }}</td>--}}
                            {{--<td>{{ $agent->confidence }}</td>--}}
                            {{--@switch($agent->rating)--}}
                            {{--@case('1')--}}
                            {{--<td style="background-color: red; text-align: center">{{ $agent->rating }}</td>--}}
                            {{--@break--}}

                            {{--@case('2')--}}
                            {{--<td style="background-color: #FFFFCC; text-align: center">{{ $agent->rating }}</td>--}}
                            {{--@break--}}

                            {{--@case('3')--}}
                            {{--<td style="background-color: yellow; text-align: center">{{ $agent->rating }}</td>--}}
                            {{--@break--}}

                            {{--@case('4')--}}
                            {{--<td style="background-color: greenyellow; text-align: center">{{ $agent->rating }}</td>--}}
                            {{--@break--}}

                            {{--@case('5')--}}
                            {{--<td style="background-color: green; text-align: center">{{ $agent->rating }}</td>--}}
                            {{--@break--}}

                            {{--@endswitch--}}
                            {{--</tr>--}}
                        @endforeach
                    </div>

                </div>

                <div class="col-md-3">
                    <h3>All Agents</h3>
                    <div class="card border-success">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center">All Agents</h5>
                            <div class="" style="text-align: center">
                                <i class="fa fa-eye fa-4x" aria-hidden="true" style="color: green"></i>
                            </div>

                        </div>
                        <div class="card-footer">
                            {{--<small class="text-muted">Last updated 3 mins ago</small>--}}
                            <button type="button" onclick="window.location='{{ url('/admin/'.'all') }}'" class="btn btn-lg btn-block btn btn-success">View</button>
                        </div>
                    </div>
                </div>
            </div>

                    {{--</tbody>--}}
                {{--</table>--}}
            @else

                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">No users!</h4>
                    <hr>
                    <p class="mb-0">No users registered yet !!</p>
                </div>

            @endif
        </div>
    </div>


@endsection

@section('footer_scripts')
    <script>
        $(document).ready( function () {
            var table =  $('#reports_table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ]
            });
        } );
    </script>
@endsection