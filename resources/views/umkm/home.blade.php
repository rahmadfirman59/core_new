@extends('layouts.index')

@section('title')
    Dashboard -
@endsection

@push('css')
    <style>
        .text-dark{
            color:#003f37 !important
        }
        body {
            background-color: #fff;
        }
        div.amcharts-chart-div>a {
            display: none!important;
        }

    </style>
@endpush

@section('content')
    <div class="content flex-column-fluid" id="kt_content">
        <div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
            <div class="page-title d-flex flex-column py-1">
                <h1 class="d-flex align-items-center my-1"><span class="text-dark fw-bold fs-1">Home</span></h1>
                @include('layouts._breadcrumb')
            </div>
            <div class="d-flex align-items-center py-1 gap-6">
            </div>
        </div>

        <div class="w-100 mx-auto">
            <div id="chart_kecamatan" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
            <div class="row">
                <div class="col-lg-6">
                    <div id="chart_status" style="width: 100%; height: 600px; background-color: #FFFFFF;" ></div>
                </div>
                <div class="col-lg-6">
                    <div id="chart_usia" style="width: 100%; height: 600px; background-color: #FFFFFF;" ></div>
                </div>
            </div>
        </div>
    </div>
@endsection
