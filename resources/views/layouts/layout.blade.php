<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{ url('/') }}" />
    <title>@yield('title') {{ env('APP_NAME') }}</title>
    <meta charset="utf-8" />
    <meta name="token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('css_plugins')
    <link href="{{ asset('assets/plugins/custom/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <style>
        div.datepicker-dropdown {
            padding: 12px;
        }
        div.datepicker td, div.datepicker th {
            padding: 8px;
        }
        .dropify-wrapper .dropify-message p {
            font-size: 12pt;
        }
        .dropify-wrapper {
            border: 1px dashed #E5E5E5;
            border-radius: 5px;
        }
        .form-select {
            padding: .775rem 1rem;
        }
        .border-dashed {
            border-width: 1px;
        }
        .amcharts-main-div a {
            display: none!important;
        }
        @media (min-width: 1400px) {
            .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
                max-width: 98%;
            }
        }
        .header .header-menu .menu>.menu-item>.menu-link>.menu-title {
            font-size: 1rem;
        }
        .table-bordered tr th, .table-bordered tr td {
            border: 1px solid #000!important;
        }
        .btn-group-xs>.btn:not(.btn-outline):not(.btn-dashed):not(.border-hover):not(.border-active):not(.btn-flush):not(.btn-icon), .btn:not(.btn-outline):not(.btn-dashed):not(.border-hover):not(.border-active):not(.btn-flush):not(.btn-icon).btn-xs {
            min-height: 1em;;
            padding: .30rem 1.25rem;
            font-size: .95rem;
            border-radius: .425rem;
        }
        .form-control-xs, .form-select-xs {
            min-height: 1em;
            padding: .30rem .75rem;
            font-size: .95rem;
            border-radius: .425rem;
        }
        .input-group-sm>.btn, .input-group-sm>.form-control, .input-group-sm>.form-select, .input-group-sm>.input-group-text {
            min-height: 1em;
            padding: .30rem .75rem;
            font-size: .95rem;
            border-radius: .425rem;
        }
        .form-control.form-control-solid {
            background-color: var(--bs-gray-300);
            border-color: var(--bs-gray-300);
        }
        .form-select.form-select-solid {
            background-color: var(--bs-gray-300);
            border-color: var(--bs-gray-300);
        }
        .bg-light {
            --bs-bg-rgb-color: var(--bs-light-rgb);
            background-color: var(--bs-gray-300) !important;
        }
        .card {
            border: 1px solid var(--bs-gray-300);
        }
        .btn.btn-secondary {
            background-color: var(--bs-gray-200);
        }
        .form-select-sm {
            padding: .55rem .75rem!important;
        }
        @media (min-width: 992px) {
            .header-fixed .header {
                height: 64px;
            }
            body.header-fixed {
                padding-top: 64px;
            }
            .menu-root-here-bg-desktop>.menu-item.here>.menu-link {
                background-color: var(--bs-primary);
            }
            .menu-state-primary .menu-item.here>.menu-link .menu-title {
                color: white;
            }
        }
        @media (max-width: 991.98px) {
            .header-tablet-and-mobile-fixed .header {
                height: 54px;
            }
            body.header-tablet-and-mobile-fixed {
                padding-top: 54px;
            }
        }
    </style>
    @stack('styles')
</head>

<body id="kt_body" class="@yield('body-class')">
<script>let defaultThemeMode = "light"; let themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>

@yield('body')

@stack('modals')

<div id="error_log_display"></div>

<script>const hostUrl = "{{ asset('assets') }}/";</script>
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
@stack('js_plugins')
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/auto-numeric.js') }}"></script>
<script src="{{ asset('assets/js/io.js') }}"></script>
<script>
    @if(session()->has('success'))
    swal.fire('{{ session('success') }}');
    @endif
    @if(session()->has('error'))
    Swal.fire({
        icon: "error",
        title: "{{ session('error') }}",
    });
    @endif
</script>
@stack('scripts')
</body>
</html>
