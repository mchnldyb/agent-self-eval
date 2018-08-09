<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/skeleton.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main-table.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju-1.12.1/jq-3.3.1/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/ju-1.12.1/jq-3.3.1/dt-1.10.18/datatables.min.js"></script>





</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            <h3></h3>

            <div class="col-md-12">
                @if(count($agents))
                    <table class="table" id="reports_table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Date</th>
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


    </main>
</div>


<script>
    $(document).ready( function () {
        var table =  $('#reports_table').DataTable();
    } );
</script>

</body>
</html>

@section('content')



@endsection
