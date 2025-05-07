@extends('admin.layout.index')
@section('css')
    <link href="\template-admin\admin\css\upgrade.css" rel="stylesheet">
@endsection
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mt-4">
                        <div class="card-body">
                            <section class="section bg-gray-100" id="plans">
                                <div class="container">
                                    <div class="row py-4" id="upgrade">
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="\template-admin\admin\js\upgrade\index.js"></script>
@endsection
