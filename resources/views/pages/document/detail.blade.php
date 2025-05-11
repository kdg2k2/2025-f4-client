@extends('pages.layouts.index')
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


        <section class="section bg-gray-100" id="plans">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card shadow-none mb-0">
                            <div class="card-body p-0">
                                <div class="table-responsive border br-7">
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
                                                        <a href="/admin/documents" class="text-primary">
                                                            {{$item['title']}}
                                                        </a>
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
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        // $(document).ready(function () {
        //     $('#table').DataTable({
        //         processing: true,
        //         responsive: true,
        //         lengthChange: true,
        //         autoWidth: false,
        //         ordering: false,
        //         searching: false,
        //         lengthMenu: [
        //             [10, 50, 100],
        //             [10, 50, 100],
        //         ],
        //         bLengthChange: true,
        //         language: {
        //             sLengthMenu: "Hiển thị _MENU_ bản ghi",
        //             searchPlaceholder: "Nhập từ khóa...",
        //             info: "Từ _START_ đến _END_ | Tổng số _TOTAL_",
        //             sInfoEmpty: "Không có dữ liệu",
        //             sEmptyTable: "Không có dữ liệu",
        //             sSearch: "Tìm kiếm",
        //             sZeroRecords: "Không tìm thấy dữ liệu phù hợp",
        //             sInfoFiltered: "",
        //             paginate: {
        //                 previous: '<i class="fal fa-angle-left"></i>',
        //                 next: '<i class="fal fa-angle-right"></i>',
        //             },
        //         },
        //     });
        // });
    </script>
@endsection
