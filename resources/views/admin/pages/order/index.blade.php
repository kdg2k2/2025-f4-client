@extends('admin.layout.index')
@section('content')
    <div class="page-body">
        <div class="container-fluid pt-4">
            <div class="card mb-3">
                <div class="row p-3">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0 card-no-border d-flex justify-content-between align-items-center">
                            <h3>Danh sách</h3>
                            <div>
                                <a href="{{ route('admin.document.create') }}" class="btn btn-outline-primary rounded-pill"
                                    data-bs-toggle="tooltip" data-placement="top" title="Thêm mới">
                                    <i class="fal fa-plus-circle"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="datatable">
                                    {{-- <thead>
                                        <tr>
                                            <th data-sortable="true">
                                                <a href="#" class="datatable-sorter">
                                                    <span class="f-light f-w-600">Đơn hàng</span>
                                                </a>
                                            </th>
                                            <th data-sortable="true">
                                                <a href="#" class="datatable-sorter">
                                                    <span class="f-light f-w-600">Trạng thái</span>
                                                </a>
                                            </th>
                                            <th data-sortable="true">
                                                <a href="#" class="datatable-sorter">
                                                    <span class="f-light f-w-600">Ngày đặt</span>
                                                </a>
                                            </th>
                                            <th data-sortable="true">
                                                <a href="#" class="datatable-sorter">
                                                    <span class="f-light f-w-600">Hành động</span>
                                                </a>
                                            </th>
                                        </tr>
                                    </thead> --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="\template-admin\admin\js\order\index.js"></script>
@endsection
