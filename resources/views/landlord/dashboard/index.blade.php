@extends('landlord.layouts.app')

@section('content')
  <div class="row">
      <div class="col-md-12 grid-margin">
          <div class="row">
              <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Bienvenu {{ $userName }}</h3>
                  <h6 class="font-weight-normal mb-0">Ceci est votre panneau  <span
                          class="text-primary">superviser vos biens!</span></h6>
              </div>
              <div class="col-12 col-xl-4">
                  <div class="justify-content-end d-flex">

                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
          <div class="card tale-bg">
              <div class="card-people mt-auto">
                  <img src="proprietaires_assets/template/images/dashboard/people.svg"
                      alt="people">
                  <div class="weather-info">
                      <div class="d-flex">
                          <div>
                              <h2 class="mb-0 font-weight-normal"><i
                                      class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                          </div>
                          <div class="ml-2">
                              <h4 class="location font-weight-normal">Douala</h4>
                              <h6 class="font-weight-normal">Cameroun</h6>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-6 grid-margin transparent">
          <div class="row">
              <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-tale">
                  <div class="card-body">
                        <a href="{{ route('properties')}}" class="text-decoration-none text-light">
                          <p class="mb-4">Nombre de Logements</p>
                          <p class="fs-30 mb-2">{{ $properties->count() }}</p>
                          <p>10.00% (30 jours)</p>
                        </a>
                      </div>
                  </div>
              </div>
              <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                      <div class="card-body">
                        <a href="{{ route('apartments')}}" class="text-decoration-none text-white">
                          <p class="mb-4">Nombre d'appartements</p>
                          <p class="fs-30 mb-2">{{ $totalApartments->count() }}</p>
                          <p>22.00% (30 jours)</p>
                        </a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                      <div class="card-body">
                        <a href="{{ route('tenants')}}" class="text-decoration-none text-white">
                          <p class="mb-4">Nombre de Locataires</p>
                          <p class="fs-30 mb-2">{{ $approvedTenants->count() }}</p>
                          <p>2.00% (30 jours)</p>
                        </a>
                      </div>
                  </div>
              </div>
              <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                      <div class="card-body">
                          <p class="mb-4">Vos Rapports de gestion</p>
                          <p class="fs-30 mb-2"></p>{{ $totalRapportDeGestionsCount }}
                          <p>0.22% (30 jours)</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  
@endsection
