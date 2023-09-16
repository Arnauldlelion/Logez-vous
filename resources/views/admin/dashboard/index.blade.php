@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        @auth('admin')
        @if (auth('admin')->user()->super_admin)
            <div class="col-md-6 col-xl-3">
                <a href="">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                    <i class="fe-file-text font-22 avatar-title text-success"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="mt-1">Nombre d'Agents</h3>
                                    {{-- <p class="text-muted mb-1 text-truncate">Total ({{ \App\Post::count() }}) </p> --}}
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </a> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            @endauth
            @endif
            <div class="col-md-6 col-xl-3">
                <a href="">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                    <i class="fe-user-check font-22 avatar-title text-info"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-right">
                                    <h3 class="mt-1">Nombre de propriétaire</h3>
                                    {{-- <p class="text-muted mb-1 text-truncate">Total ({{ \App\Testimony::count() }}) </p> --}}
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </a> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
    </div>
    <!-- end row-->

@endsection

@section('footer_script')
    <script></script>
@endsection

