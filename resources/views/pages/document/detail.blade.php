@extends('pages.layouts.index')

@section('header')
    <link href="admin/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css"/>
    <link href="admin/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="admin/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="admin/css/vendor.min.css" rel="stylesheet" type="text/css"/>
    <link href="admin/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
    <link href="admin/css/icons.min.css" rel="stylesheet" type="text/css"/>

@endsection

@section('content')
    <div class="main-content app-content">
        <section class="section banner-1 banner-section banner-arrow-down">
            <img src="../assets/images/patterns/4.png" alt="img" class="patterns-3">
            <img src="../assets/images/patterns/6.png" alt="img" class="patterns-4">
            <img src="../assets/images/patterns/9.png" alt="img" class="patterns-8 op-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="">
                            <p class="mb-3 content-1 h5 text-white text-center">Tài liệu</p>
                            <p class="mb-0 tx-16 text-center">Tất cả tài liệu về: {{$documentField['name']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="page-container">
            <section class="section bg-gray-100" id="plans">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="table" class="table table-bordered mb-0 table-hover border-hidden">
                                        <thead>
                                        <tr>
                                            <th>TT</th>
                                            <th>Loại tài liệu</th>
                                            <th>Tên tài liệu</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $i => $item)
                                            <tr>
                                                <td>{{$i + 1}}</td>
                                                <td>
                                                    {{$item['type']['name']}}
                                                </td>
                                                <td>
                                                    {{$item['title']}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('js')
    <script src="admin/js/vendor.min.js"></script>
    <script src="admin/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="admin/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="admin/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="admin/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script>
        $(document).ready(function () {
            var element = $('#table').DataTable({
                responsive: !0,
                pageLength: 10,
                order: [],
                lengthMenu: [
                    [10, 20, 50, -1],
                    [10, 20, 50, "Tất cả"],
                ],
                language: {
                    sLengthMenu: "Hiển thị _MENU_ bản ghi",
                    searchPlaceholder: "Nhập từ khóa...",
                    info: "Từ _START_ đến _END_ | Tổng số _TOTAL_",
                    sInfoEmpty: "Không có dữ liệu",
                    sEmptyTable: "Không có dữ liệu",
                    sSearch: "Tìm kiếm",
                    sZeroRecords: "Không tìm thấy dữ liệu phù hợp",
                    sInfoFiltered: "",
                    paginate: {
                        previous: "<i class='ri-arrow-left-line'>",
                        next: "<i class='ri-arrow-right-line'>",
                    },
                },
                drawCallback: function () {
                    $(".dataTables_paginate > .pagination").addClass(
                        "pagination-rounded"
                    );
                },
            });
        });
    </script>
@endsection
