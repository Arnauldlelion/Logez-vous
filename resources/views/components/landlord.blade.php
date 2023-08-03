@extends('layouts.app')

@section('content')

<section>
    <div class="container-fluid">
        <div class="container">
            <h1>Bonjour {name}</h1>
            <div class="d-flex gap-3 mb-4">
                <div class="shadow col-9 col-lg-3 rounded p-3">
                    <small>Montant viré sur votre compte ce mois-ci</small>
                    <div class="d-flex justify-content-between my-4">
                        <img src="{{ asset('storage/images/logos/building.png')}}" alt="">
                        <h1 class="text-danger fw-bold">0 F</h1>
                        <a href="">                        <button class="btn btn-outline-danger rounded-pill btn-sm">Detail</button></a>
                    </div>
                    <div>
                        <small class="text-muted">Pas d'intervention en Août 2023</small>
                    </div>
                </div>
                <div class="shadow col-3 rounded p-3 d-none d-md-block">
                    <small>Total depuis le début de 2023</small>
                    <div class="d-flex  my-4">
                        <img src="{{ asset('storage/images/logos/building.png')}}" alt="">
                        <h1>0 F</h1>
                    </div>
                    <div>
                        <small class="text-muted">0 jour de vacance locative</small>
                    </div>
                </div>
                <div class="shadow col-3 rounded p-3 d-none d-lg-block">
                    <small>Suivi des versements</small>
                    <div class="d-flex justify-content-between my-4">
                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 0%"></div>
                          </div>
                          <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 25%"></div>
                          </div>
                          <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 50%"></div>
                          </div>
                          <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 75%"></div>
                          </div>
                          <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 100%"></div>
                          </div>
                    </div>
                </div>
            </div>
            <div class="mb-4" >
                <h6>Notifications</h6>
                <div class="col-6 col-lg-2 shadow rounded py-3 ps-2" style="border-left: 5px solid red ">
                    <div class="d-flex align-items-center ">
                        <h1 class="text-danger">0</h1> <small>nouvelle notification</small>
                    </div>
                    <div>
                        <a href="" class="text-decoration-none text-danger"><i class="fa fa-chevron-right"></i> <small>Anciennes notifications </small></a>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <h6 class="d-lg-none">Loyers <a href="" class="text-decoration-none text-danger">Voir plus</a></h6>
              <div class="d-flex ">
                <div class="shadow col-3 rounded p-3  d-sm-block d-md-none">
                    <small>Total depuis le début de 2023</small>
                    <div class="d-flex  my-4">
                        <img src="{{ asset('storage/images/logos/building.png')}}" alt="">
                        <h1>0 F</h1>
                    </div>
                    <div>
                        <small class="text-muted">0 jour de vacance locative</small>
                    </div>
                </div>
                <div class="shadow col-3 rounded p-3  d-md-block d-lg-none">
                    <small>Suivi des versements</small>
                    <div class="d-flex justify-content-between my-4">
                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 0%"></div>
                          </div>
                          <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 25%"></div>
                          </div>
                          <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 50%"></div>
                          </div>
                          <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 75%"></div>
                          </div>
                          <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 100%"></div>
                          </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="mb-4">
                <div class="d-flex gap-2">
                    <div class="pt-2"><h6>Actualités Flatlooker</h6></div>
                    <div class="d-grid gap-1 d-md-flex justify-content-md-start">
                        <i class="fa fa-arrow-left border rounded-circle p-2"></i>
                        <i class="fa fa-arrow-right border rounded-circle p-2"></i>
                      </div>
                </div>
            </div>
            <div>
                <h6>Liens rapides</h6>
                <div class="col-12 col-md-10 col-lg-4">
                    <div class="row d-flex gap-3">
                        <div class="shadow col-3 ">
                            <div><img src="{{ asset('storage/images/logos/coin2.png')}}" alt=""></div>
                            <small>Mes virements</small>
                        </div>
                        <div class="shadow col-3 ">
                            <div><img src="{{ asset('storage/images/logos/coin2.png')}}" alt=""></div>
                            <small>Mes <br> incidents</small>
                        </div>
                        <div class="shadow col-3 ">
                            <div><img src="{{ asset('storage/images/logos/coin2.png')}}" alt=""></div>
                            <small>Mes <br> parrainage</small>
                        </div>
                        <div class="shadow col-3">
                            <div><img src="{{ asset('storage/images/logos/coin2.png')}}" alt=""></div>
                            <small>Mon <br> compt</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</section>



<section>
    <div class="lanlord-menu">
        <div class="landlord-menu-header">
            <button class="btn-banner"><i class="fa fa-chevron-down"></i></button>
        </div>
        <div class="landlord-menu-body">
           <a href="" style="display:  black;">
            <img src="{{asset('storage/images/home/img.jpg')}}" width="100%" alt="">
        </a>
        </div>
    </div>
</section>
@endsection