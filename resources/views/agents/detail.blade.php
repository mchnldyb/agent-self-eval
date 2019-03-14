@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Reports</h1>



        <div class="col-md-12">
            @if(count($agents))
                <button type="button" onclick="window.location='{{ route('home') }}'" class="btn btn-outline-info mb-4"><< Back to Dashboard</button>

                @if($avg_agent_rating)

                    @switch($avg_agent_rating)
                        @case('1')
                        <div class="float-right"><h2><span class="badge badge-pill badge-danger">Average Rating : {{ $avg_agent_rating }}</span></h2></div>
                        @break

                        @case('2')
                        <div class="float-right"><h2><span class="badge badge-pill badge-warning">Average Rating : {{ $avg_agent_rating }}</span></h2></div>
                        @break

                        @case('3')
                        <div class="float-right"><h2><span class="badge badge-pill badge-secondary">Average Rating : {{ $avg_agent_rating }}</span></h2></div>
                        @break

                        @case('4')
                        <div class="float-right"><h2><span class="badge badge-pill badge-primary">Average Rating : {{ $avg_agent_rating }}</span></h2></div>
                        @break

                        @case('5')
                        <div class="float-right"><h2><span class="badge badge-pill badge-success">Average Rating : {{ $avg_agent_rating }}</span></h2></div>
                        @break

                    @endswitch
                @endif

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
                            <td class="align-self-center text-center"> <button class="btn btn-danger" id="delete-btn" onclick="deleteitem({{ $agent->id }})">Delete</button></td>
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

    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="DeleteConfirmModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeleteConfirmModalTitle">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this evaluation entry?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="deleteConfirm">Proceed to delete</button>
                </div>
            </div>
        </div>
    </div>

    <!--Button to Launch delete confirmation Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteConfirmModal" id="LaunchSubmitModal" hidden>
    </button>
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

        function deleteitem(id) {
            console.log(id);
            $('#LaunchSubmitModal').click();
            $('#deleteConfirm').click(function () {
                //console.log("Clicked " +id);
                var newForm = jQuery('<form>', {
                    'action': 'submission/' + id,
                    'method': 'POST'
                });

                var hiddenInput = jQuery('<input>', {
                    'name': '_method',
                    'value': 'DELETE',
                    'type': 'hidden'
                });

                $(newForm).append('{{ csrf_field() }}', hiddenInput).appendTo('body');
                $(document.body).append(newForm);
                newForm.submit();
            });
        }
    </script>
@endsection
