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
                        <h3 class="mb-4 text-center title-document"></h3>
                        <div class="card" id="document-view">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="\template-admin\admin\js\document\view.js"></script>
@endsection
