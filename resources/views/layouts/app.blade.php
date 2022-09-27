<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- jquery js-->
        <script src="{{ asset('js/jquery.min.js') }}"></script>

        <!-- Bootstrap CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

        <title>@yield('title')</title>

        <style>
            .form-control:focus{
                box-shadow: none;
            }
            tbody td{
                vertical-align: middle;
            }
        </style>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container">
                <a class="navbar-brand text-white fw-bold" href="#">{{ config('app.name') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link text-white active" href="{{ url('/') }}">Home</a>
                        <a class="nav-link text-white" href="{{ route('data.create') }}">Add Record</a>
                        <a class="nav-link text-white" href="{{ route('data.index') }}">Manage Persons</a>
                        <a class="nav-link text-white" href="{{ route('exportDataToPdf') }}">Generate Report</a>
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')

        <!-- Bootstrap Bundle with Popper -->        
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        @include('sweet::alert')
    </body>
</html>
