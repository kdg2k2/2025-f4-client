@extends('admin.layout.index')
@section('content')
    <div class="page-body">
        <div class="container-fluid" id="top_breadcrumb">
            <div class="page-title">

            </div>
        </div>
        <div class="container-fluid default-dashboard">
            <div class="row statistical">
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- apex-->
    <script src="template-admin/admin/js/chart/apex-chart/apex-chart.js"></script>
    <script src="template-admin/admin/js/chart/apex-chart/stock-prices.js"></script>
    {{--
    <script src="template-admin/admin/js/dashboard/dashboard_1.js"></script> --}}
    <script src="template-admin/admin/js/dashboard/index.js"></script>
@endsection
