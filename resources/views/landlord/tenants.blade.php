@extends('layouts.panel')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card corona-gradient-card">
                <div class="card-body py-0 px-0 px-sm-3">
                  <div class="row align-items-center">
                    <div class="col-4 col-sm-3 col-xl-2">
                      <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                    </div>
                    <div class="col-5 col-sm-7 col-xl-8 p-0">
                      <h4 class="mb-1 mb-sm-0">Bonjour! Monsieur. </h4>
                      
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
         
         
          <div class="row ">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Vos locataires</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            <div class="form-check form-check-muted m-0">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                              </label>
                            </div>
                          </th>
                          <th>Nom du locataire </th>
                          
                          <th> Loyer</th>
                         
                          <th> Contrat </th>
                          <th> Date d'entree </th>
                          <th> Status </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-check form-check-muted m-0">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                              </label>
                            </div>
                          </td>
                          <td>
                            
                            <span class="ps-2">Henry Klein</span>
                          </td>
                         
                          <td> 100.000 fcfa </td>
                         
                          <td> Bail </td>
                          <td> 04 oct 2023 </td>
                          <td>
                            <div class="badge badge-outline-success">Aprouver</div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-check form-check-muted m-0">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                              </label>
                            </div>
                          </td>
                          <td>
                           
                            <span class="ps-2">Estella Bryan</span>
                          </td>
                          <td> 90.000 fcfa </td>
                          
                          <td> Bail </td>
                         
                          <td> 14 Nov 2023 </td>
                          <td>
                            <div class="badge badge-outline-warning">En cours</div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-check form-check-muted m-0">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                              </label>
                            </div>
                          </td>
                          <td>
                           
                            <span class="ps-2">Lucy Abbott</span>
                          </td>
                          <td> 80.000 fcfa </td>
                          
                          <td> Bail </td>
                         
                          <td> 17 Nov 2023 </td>
                          <td>
                            <div class="badge badge-outline-danger">Rejeter</div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-check form-check-muted m-0">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                              </label>
                            </div>
                          </td>
                          <td>
                           >
                            <span class="ps-2">Peter Gill</span>
                          </td>
                          <td> 75.000 fcfa </td>
                         
                          <td> Bail </td>
                         
                          <td> 06 Dec 2023 </td>
                          <td>
                            <div class="badge badge-outline-success">Aprouver</div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-check form-check-muted m-0">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                              </label>
                            </div>
                          </td>
                          <td>
                            
                            <span class="ps-2">Sallie Reyes</span>
                          </td>
                          <td> 65.000 fcfa </td>
                         
                          <td> Bail </td>
                         
                          <td> 18 Dec 2023 </td>
                          <td>
                            <div class="badge badge-outline-success">Aprouver</div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection