@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Reports</h3>



        <div class="col-md-12">
            @if(count($agents))
                <button type="button" onclick="window.location='{{ route('home') }}'" class="btn btn-outline-info mb-4"><< Back to Dashboard</button>
                <table class="table" id="reports_table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Agent</th>
                        <th scope="col">Issue</th>
                        <th scope="col">Client Satisfied</th>
                        <th scope="col">Confidence Level</th>
                        <th scope="col">Rating</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($agents as $agent)
                        <tr>
                            <th scope="row">{{ $agent->date }}</th>
                            <td>{{ $agent->agent }}</td>
                            <td>{{ $agent->issue_number }}</td>
                            <td>{{ $agent->satisfaction }}</td>
                            <td>{{ $agent->confidence }}</td>
                            @switch($agent->rating)
                            @case('1')
                            <td style="background-color: red; text-align: center">{{ $agent->rating }}</td>
                            @break

                            @case('2')
                            <td style="background-color: #FFFFCC; text-align: center">{{ $agent->rating }}</td>
                            @break

                            @case('3')
                            <td style="background-color: yellow; text-align: center">{{ $agent->rating }}</td>
                            @break

                            @case('4')
                            <td style="background-color: greenyellow; text-align: center">{{ $agent->rating }}</td>
                            @break

                            @case('5')
                            <td style="background-color: green; text-align: center">{{ $agent->rating }}</td>
                            @break

                            @endswitch
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else

                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">No reports added!</h4>
                    <hr>
                    <p class="mb-0">Please add reports via the dashboard to see them here.</p>
                    <button type="button" onclick="window.location='{{ route('home') }}'" class="btn btn-primary mt-3"><< Back to Dashboard</button>
                </div>

            @endif
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script>
        $(document).ready( function () {
            var table =  $('#reports_table').DataTable();
        } );

    </script>
@endsection
