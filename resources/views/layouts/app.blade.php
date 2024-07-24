@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle')
        | @yield('subtitle')
    @endif
@stop

{{-- Extend and customize the page content header --}}
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/2.1.0/css/dataTables.dataTables.min.css" rel="stylesheet">

@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')

            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop

{{-- Rename section content to content_body --}}

@section('content')

    @yield('content_body')

@stop

{{-- Create a common footer --}}

@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div>

    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', 'My company') }}
        </a>
    </strong>
@stop

{{-- Add common Javascript/Jquery code --}}
@stack('scripts')

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.0/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).ready(function () {
                $('#phone').mask('+38 (000) 000-00-00');
            });
            let table = new DataTable('#myTable', {
                dom: 'Bfrtip',
                buttons: [
                    'colvis',
                    'excel',
                    'print'
                ]
            });
        })
        ;

    </script>
@endpush

{{-- Add common CSS customizations --}}

@push('css')
    <style type="text/css">

        {{-- You can add AdminLTE customizations here --}}














































        /*
                                                                                                                                                                                                                                                                                                                                                                                            .card-header {
                                                                                                                                                                                                                                                                                                                                                                                                border-bottom: none;
                                                                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                                                                            .card-title {
                                                                                                                                                                                                                                                                                                                                                                                                font-weight: 600;
                                                                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                                                                            */

    </style>
@endpush