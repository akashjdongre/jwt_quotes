@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header card-header-top">
                        Dashboard
                    </div>

                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <a href="">
                                    <div class="info-box" style="color:#000;">
                                    <span class="info-box-icon bg-red" style="display:flex; flex-direction: column; justify-content: center;">
                                        <i class="fa fa-users"></i>
                                    </span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Users</span>
                                            <span class="info-box-number">122</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="">
                                    <div class="info-box" style="color:#000;">
                                    <span class="info-box-icon bg-red" style="display:flex; flex-direction: column; justify-content: center;">
                                        <i class="fa-fw nav-icon fas fa-film"></i>
                                    </span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Clients</span>
                                            <span class="info-box-number">152</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
@endsection
