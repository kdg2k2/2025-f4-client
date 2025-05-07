@extends('admin.layout.index')
@section('content')
    <div class="page-body" id="main-content">
        <div class="container-fluid">
            <div class="page-title">
            </div>
        </div>
        <div class="container-fluid">
            <div class="edit-profile">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card px-5 py-3">
                            <div class="card-header pb-0 card-no-border d-flex justify-content-between align-items-center">
                            </div>
                            <div class="card-body row">
                            </div>
                            <div class="px-4 table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Thông tin</th>
                                            <th class="text-center">Giá</th>
                                            <th class="text-center">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-body">
                                    </tbody>
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
    <script src="\template-admin\admin\js\order\show.js"></script>

@endsection
