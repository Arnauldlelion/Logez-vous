@extends('layouts.locatairespanel')

@section('content')



<section>
    <div class="container">
        <div class="candidate_dropdown">
            <div class="shadow">
                <div class="dashboard_dropdown">
                    <div class="shadow">
                        <div class="dashboard_dropdown_header my-4 p-4">
                            <div class="question d-flex justify-content-between align-items-center py-2">
                                <h6 class="text-danger">Les
                                    étapes de votre candidature chez Logez-vous.</h6>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="dashboard_dropdown_content">
                                <div class="row ">
                                    <div class="col-12 col-md-4 col-lg-3 pt-3 text-center border">
                                        <span class=" p-2" id="rounded-circle">1</span>
                                        <h4 class="text-danger">Envoi de votre fiche locative</h4>
                                        <div class="d-flex flex-row-reverse d-md-block">
                                            <div>
                                                <p>Nous traitons d’abord la fiche remplie à votre inscription, pour vous
                                                    permettre de
                                                    postuler rapidement aux logements.</p>
                                            </div>
                                            <div class="d-none d-sm-block justify-content-center align-items-center">
                                                <img src="{{ asset('storage/images/logos/board.png') }}"
                                                    class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3 pt-3 text-center border">
                                        <span class=" p-2" id="rounded-circle">2</span>
                                        <h4 class="text-danger">Envoi de votre dossier locatif</h4>
                                        <div class="d-flex flex-row-reverse d-md-block ">
                                            <div>
                                                <p>Une fois votre fiche validée, vous complétez un dossier avec vos
                                                    justificatifs, qui
                                                    sera automatiquement envoyé.</p>
                                            </div>
                                            <div class="d-none d-sm-block justify-content-center align-items-center">
                                                <img src="{{ asset('storage/images/logos/whistle.png') }}"
                                                    class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3 pt-3 text-center border">
                                        <span class=" p-2" id="rounded-circle">3</span>
                                        <h4 class="text-danger">Signature du bail</h4>
                                        <div class="d-flex flex-row-reverse d-md-block ">
                                            <div>
                                                <p>La signature anticipée du bail rend votre candidature prioritaire, et
                                                    permet de
                                                    présenter votre dossier complet au propriétaire.</p>
                                            </div>
                                            <div class="d-none d-sm-block justify-content-center align-items-center">
                                                <img src="{{ asset('storage/images/logos/pen.png') }}" class="img-fluid"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3 pt-3 text-center border">
                                        <span class=" p-2" id="rounded-circle">4</span>
                                        <h4 class="text-danger">Validation du propriétaire</h4>
                                        <div class="d-flex flex-row-reverse d-md-block ">
                                            <div>
                                                <p>Après accord du propriétaire, Flatlooker contresigne votre bail, et
                                                    vous
                                                    accompagne
                                                    dans votre emménagement !</p>
                                            </div>
                                            <div class="d-none d-sm-block justify-content-center align-items-center">
                                                <img src="{{ asset('storage/images/logos/pen.png') }}"
                                                    class="img-fluid d-sm-none" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow mb-4 bg-light"  style="border-left: 5px solid red; border-radius: 5px;">
                <div class="align-items-center rounded-1 pt-3 p-2 m-3 align-items-center">
                    <h6 class="text-danger">Veuillez compléter votre dossier locatif</h6>
                    <small>Il vous reste à compléter les documents des personnes suivantes :</small>
                    <ul>
                        <li class="text-danger">{auth}</li>
                    </ul>
                </div>
            </div>

            <div>
                <h5>Mes informations générales</h5>
                <div class="shadow mb-4 bg-light p-4">
                    <div class="row mb-3">
                        <div class="col-12 col-lg-4"><small class="text-muted">Composition de la location</small></div>
                        <div class="col-12 col-lg-4"><small>Locataire seule</small></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-lg-4"><small class="text-muted">Emménagement souhaité</small></div>
                        <div class="col-12 col-lg-4"><small>Dans moins d'une semaine</small></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-lg-4"><small class="text-muted">Durée souhaitée</small></div>
                        <div class="col-12 col-lg-4"><small>Moins de 6 mois</small></div>
                    </div>
                    <div>
                        <button class="btn btn-danger rounded-pill">Modifier</button>
                    </div>
                </div>
            </div>

            <div>
                <h5>Dossier Locatif</h5>
                <hr>
                <div class="shadow bg-light col-12 col-lg-12 py-2">
                    <p>{ auth }</p>
                    <span>
                        Locataire-Autre
                    </span>
                    <div class="d-grid gap-1 d-md-flex justify-content-md-start">
                        <i class="fa-thin fa-pen"></i>
                        <i class="fa-solid fa-pen"></i>
                    </div>
                    <hr class="my-3">
                    <div class="d-flex justify-content-center mb-3">
                        <small>Fiche incomplète</small>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-danger rounded-pill">Completer la fiche</button>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
            <div class=" my-5">
               <a href="" class="">
                <i class="fa-solid fa-plus bg-danger p-2 rounded-circle "></i>
                <span>Ajouter un locataire</span>
               </a>
            </div>
            <div class="shadow mb-4 bg-light"  style="border-left: 5px solid red; border-radius: 5px;">
                <div class="align-items-center rounded-1 pt-3 p-2 me-3 align-items-center">
                    <h6 class="text-danger">Vous n’avez pas de garant ?</h6>
                    <small>Un dossier locatif avec un garant a davantage de chances d'être accepté par un propriétaire. Découvrez des garants privés, partenaires de Flatlooker, qui peuvent se porter caution pour renforcer votre dossier.</small>
                </div>
            </div>

            <div>
                <div class="d-flex gap-2">
                    <div class="col-4 shadow bg-light p-2 ">
                        <div><img src="{{ asset('storage/images/logos/caution.png')}}" alt="" class="img-fluid"></div>
                        <div><button class="btn btn-danger rounded-pill w-100">Je découvre</button></div>
                    </div>
                    <div class="col-4 shadow bg-light p-2 ">
                        <div><img src="{{ asset('storage/images/logos/smart.png')}}" alt="" class="img-fluid"></div>
                        <div><button class="btn btn-danger rounded-pill w-100">Je découvre</button></div>
                    </div>
                    <div class="col-4 shadow bg-light p-2 ">
                        <div><img src="{{ asset('storage/images/logos/garantme.png')}}" alt="" class="img-fluid"></div>
                        <div><button class="btn btn-danger rounded-pill w-100">Je découvre</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection