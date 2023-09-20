@extends('layouts.panel')

@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Panneau d'administration</a></li>
                                    </ol>
                                </div>
                                <h3 class="page-title text-white">Tableau de bord</h3>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">

                        <div class="col-md-6 col-xl-3 ">
                            <a href="" class="text-decoration-none">
                                <div class="card-box rounded bg-dark">
                                    <div class="row justify-content-between">
                                        <div class="col-6">
                                            <div>
                                                <h3 class="mt-1">Bien</h3>
                                                <p class="text-muted mb-1">Total
                                                    ({{ \App\Models\Property::count() }}) </p>
                                            </div>
                                        </div>
                                        <div class="col-6 ">
                                            <div class="float-end" style="font-size: 3rem">
                                                <i class="mdi mdi-city"></i>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div>
                            </a> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <div class="col-md-6 col-xl-3">
                            <a href="" class="text-decoration-none">
                                <div class="card-box  rounded bg-dark">
                                    <div class="d-flex justify-content-between">
                                        <div >
                                            <div>
                                                <h3 class="mt-1">Appartements</h3>
                                                <p class="text-muted mb-1">Total
                                                    ({{ \App\Models\Appartment::count() }}) </p>
                                            </div>
                                        </div>
                                        <div >
                                            <div  style="font-size: 3rem">
                                                <i class="mdi mdi-home"></i>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div>
                            </a> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <div class="col-md-6 col-xl-3">
                            <a href="" class="text-decoration-none">
                                <div class="card-box rounded bg-dark">
                                    <div class="d-flex justify-content-between">
                                        <div >
                                            <div>
                                                <h3 class="mt-1">Locataire</h3>
                                                <p class="text-muted mb-1">Total
                                                    ({{ \App\Models\Locataire::count() }}) </p>
                                            </div>
                                        </div>
                                        <div >
                                            <div class="float-end" style="font-size: 3rem">
                                                <i class="mdi mdi-account-group"></i>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div>
                            </a> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row-->
                    {{-- {{ $apartment->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
