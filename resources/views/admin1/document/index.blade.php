@extends('admin1.layout.index')
@section('content')
    <div class="page-container">
        <div class="container-fluid pt-4">
            <div class="card mb-3">
                <div class="row p-3">
                    <div class="col-md-2">
                        <label>Lĩnh vực</label>
                        <select id="filter-fields"></select>
                    </div>
                    <div class="col-md-2">
                        <label>Loại tài liệu</label>
                        <select disabled id="filter-type"></select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button class="btn btn-outline-primary rounded-pill" data-bs-toggle="tooltip" data-placement="top"
                            title="Lọc" id="btn-filter">
                            <i class="fal fa-filter"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0 card-no-border d-flex justify-content-between align-items-center">
                            <h3>Danh sách</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="datatable"></table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="\template-admin\admin\js\document\index.js"></script>
@endsection
