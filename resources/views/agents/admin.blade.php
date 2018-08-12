@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="display-4 mb-3">All Reports</h2>
        <hr/>
        <div class="col-md-12 mt-4">
            @if(count($agents))
                <table class="table" id="reports_table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Agent</th>
                        <th scope="col">Issue</th>
                        <th scope="col">Client Satisfied</th>
                        <th scope="col">Self Confidence</th>
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