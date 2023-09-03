@extends('layouts.app')

@section('content')
    {{-- Please put your navbar code inside the layouts.app file --}}

    <section>
        <div class="container-fluid  help-banner" id="top_page">
            <div class="container me-5 pe-3">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <h4 class="green">Logez-vous gestion locative a <b class="text-danger">3.9% TTC</b></h4>
                        <h2>Louez votre logement</h2>
                        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <h2>en un eclair</h2>
                                </div>
                                <div class="carousel-item">
                                    <h2>sans frais cache</h2>
                                </div>
                                <div class="carousel-item">
                                    <h2>en toute securite</h2>
                                </div>
                                <div class="carousel-item">
                                    <h2>avec des outils modernes</h2>
                                </div>
                            </div>
                        </div>
                        <div class="top-description">
                            Grâce aux nouvelles technologies, nous louons votre logement <b class="text-danger"> 3 fois plus
                                vite qu’une agence
                                traditionnelle</b>. Plus d’un millier de propriétaires sont satisfaits de notre gestion
                            locative innovante, réactive et abordable.
                        </div>
                        <div class="mt-4 mb-3">
                            <form action="">
                                <input type="text" class="form-control w-100" style="border-radius: 30px;">
                            </form>
                        </div>
                        <a href="" class="text-decoration-none">vous etes proprietaire de plusieurs logement ?</a>
                        <div class="mt-4 pt-4">
                            <img src="{{ asset('storage/images/logos/google_stars.png') }}" alt="">
                            <img src="{{ asset('storage/images/logos/trust.png') }}" alt="">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <a href="#no_more" class="text-decoration-none">
                            <p class="text-danger">En savoir plus</p>
                            <i class="bi bi-chevron-down " style="font-size: 100px; color: gray;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <p class="d-inline-flex gap-1">
    <p data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
        aria-controls="collapseExample">toggle</p>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">
        Button with data-bs-target
    </button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user
            activates the relevant trigger.
        </div>
    </div>
    <section>
        <div class="container-fluid mt-5 pt-5" id="no_more">
            <div class="container mt-5">
                <div class="justify-content-center text-center">
                    <h4 class="">Pour un loyer menseul de <span class="text-danger">300000frs</span><img
                            src="" alt="" srcset=""> Logez-vousvous fera </h4>
                    <h4>economiser <span class="text-danger">100000</span> par rapport a une agence de quartier</h4>
                </div>
                <div class="py-3 " style="background: white; border-radius:10px;">
                    <ul class="nav nav-tabs  justify-content-center mb-4 gap-5" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active py-2" id="tab1-tab" data-bs-toggle="tab" href="#tab1"
                                class="text-decoration-none" role="tab" aria-controls="tab1"
                                aria-selected="true">LOGEMENT ENTIER</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab"
                                aria-controls="tab2" aria-selected="false">LOCATION A LA CHAMBRE</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="tab1">
                            <div class="container">
                                <div class="row gap-4 row-cols-md-4 justify-content-center">
                                    <div class="col-12 shadow border hoverable">
                                        <img src="{{ asset('storage/images/logos/key.png') }}" alt=""
                                            class="d-block mx-auto img-fluid">
                                        <h4 class="text-danger text-center ">Recherche de <br>locataires</h4>
                                        <hr class="my-3">
                                        <div class="d-block d-md-flex justify-content-around text-center">
                                            <div class=" mb-3">
                                                <span class="text-muted opacity-50">STANDARD</span><br>
                                                <span>75% d'un <br>mois de loyer</span><br>
                                                <small class="text-muted opacity-50">charges comprises<br>TTC</small>
                                            </div>
                                            <div>
                                                <span class="text-danger">PREMIUM</span><br>
                                                <span>100% d'un <br>mois de loyer</span><br>
                                                <small class="text-muted text-center opacity-25">charges
                                                    comprises<br>TTC</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col shadow border justify-content-center">
                                        <img src="{{ asset('storage/images/logos/book.png') }}" alt=""
                                            class="img-fluid d-block mx-auto">
                                        <h4 class="text-danger text-center">Gestion locative <br> complète</h4>
                                        <hr class="my-3">
                                        <div class="d-flex justify-content-around text-center">
                                            <div class="">
                                                <p class="text-muted opacity-50">STANDARD</p>
                                                <p>3,9% <br>du loyer</p>
                                                <small class="text-muted opacity-50">charges comprises<br>TTC/mois</small>
                                            </div>
                                            <div>
                                                <p class="text-danger">PREMIUM</p>
                                                <p>5,9%<br>du loyer</p>
                                                <small class="text-muted text-center">charges comprises<br>TTC/mois</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col shadow border justify-content-center">
                                        <img src="{{ asset('storage/images/logos/house.png') }}" alt=""
                                            class="img-fluid d-block mx-auto">
                                        <h4 class="text-danger text-center">Assurance Loyers <br> Impayés</h4>
                                        <hr class="my-3">
                                        <p>2,5%<br>du loyer</p>
                                        <small class="text-muted">charges comprises<br>TTC/mois</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane show fade " id="tab2">
                            <div class="container">
                                <div class="col-9">
                                    <div class="row bg-primary-subtle">
                                        <p class="text-danger"><b> Package Coloc</b> Recherche de locataires illimitée +
                                            Gestion locative complète</p>
                                        <p>10% du loyer <span class="text-muted">charges comprises TTC/mois</span></p>
                                        <span>Une prestation complète avec tous les avantages <b>Premium</b> et les
                                            locations
                                            incluses en <b>illimité !</b></span>
                                    </div>
                                </div>
                                <div class="row gap-4 row-cols-lg-4 justify-content-center">
                                    <div class="col shadow border justify-content-center">
                                        <img src="{{ asset('storage/images/logos/key.png') }}" alt="">
                                        <h3 class="text-danger text-center">Recherche de <br>locataires</h3>
                                        <hr class="my-3">
                                        <div class="d-flex justify-content-around text-center">
                                            <div class="">
                                                <p class="text-muted">STANDARD</p>
                                                <p>75% d'un <br>mois de loyer</p>
                                                <small class="text-muted">charges comprises<br>TTC</small>
                                            </div>
                                            <div>
                                                <p class="text-danger">PREMIUM</p>
                                                <p>100% d'un <br>mois de loyer</p>
                                                <small class="text-muted text-center">charges comprises<br>TTC</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col shadow border justify-content-center">
                                        <img src="{{ asset('storage/images/logos/book.png') }}" alt="">
                                        <h3 class="text-danger text-center">Gestion locative <br> complète</h3>
                                        <hr class="my-3">
                                        <div class="d-flex justify-content-around text-center">
                                            <div class="">
                                                <p class="text-muted">STANDARD</p>
                                                <p>3,9% <br>du loyer</p>
                                                <small class="text-muted">charges comprises<br>TTC/mois</small>
                                            </div>
                                            <div>
                                                <p class="text-danger">PREMIUM</p>
                                                <p>5,9%<br>du loyer</p>
                                                <small class="text-muted text-center">charges comprises<br>TTC/mois</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col shadow border justify-content-center">
                                        <img src="{{ asset('storage/images/logos/house.png') }}" alt="">
                                        <h3 class="text-danger text-center">Assurance Loyers <br> Impayés</h3>
                                        <hr class="my-3">
                                        <p>2,5%<br>du loyer</p>
                                        <small class="text-muted">charges comprises<br>TTC/mois</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" d-flex justify-content-center mt-5">
                            <button class="btn btn-danger rounded-pill w-45">Voir l'offre detaillee</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section>
      <div class="container-fluid loge">
        <div class="text-center">
            <h4>
                <img src="{{ asset('storage/images/logez-vous.png') }}" width="18%" alt="" class="img-fluid">
                <span class="text-danger">optimise</span> vos revenus locatifs avec des <span class="text-danger">tarifs
                    attractifs</span>
            </h4>
            <h5>Et vous ne payez qu'en cas de <span class="text-danger">succès !</span></h5>
        </div>
        <div class="d-flex col-8 mx-auto justify-content-between mt-5">
            <div class="text-center">
                <div class="economise-circle  bg-danger text-light align-items-center">
                    <p>Économisez</p>
                    <h4> ~ 200 CFA /an</h4>
                </div>
                <div>
                    <small>par rapport à une agence classique</small><br><br>
                    <span>Entrez votre loyer mensuel</span>
                    <div class="value"><h4>150000CFA</h4></div>
                   <div class="box">
                    <div class="slider">
                        {{-- <input type="range" class="form-range" min="0" max="100" value="20" id="customRange1"> --}}
                        <input type="range" min="0" max="100" value="20" name="" id="">
                    </div>
                   </div>
                </div>
            </div>
            <div class="d-flex gap-4">
                <div class="shadow-lg bg-light p-3 text-center">
                    <div>
                        <img src="{{ asset('storage/images/quartier.png')}}" alt="">
                    </div>
                    <p>Agence</p>
                    <h4>~ 14400 CFA</h4>
                    <small class="text-muted">par an</small><br>
                    <small>=</small>
                    <div class="d-flex justify-content-between">
                        <div>
                            <small>Gestion</small>
                            <p>12234</p>
                        </div>
                        <div>
                            <small>G.L.I</small>
                            <p>12234</p>
                        </div>
                    </div>
                </div>
                <div class="shadow-lg bg-light p-3 text-center border border-danger">
                    <div>
                        <img src="{{ asset('storage/images/quartier.png')}}" alt="">
                    </div>
                    {{-- <div>
                        <img src="{{ asset('storage/images/logez-vous.png') }}" width="18%" alt="" class="img-fluid">
                    </div> --}}
                    <h4>~ 14400 CFA</h4>
                    <small class="text-muted">par an</small><br><br>
                    <small>=</small>
                    <div class="d-flex justify-content-between">
                        <div>
                            <small>Gestion</small>
                            <p>12234</p>
                        </div>
                        <div>+</div>
                        <div>
                            <small>G.L.I</small>
                            <p>12234</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <button class="btn btn-danger btn-lg rounded-pill w-25">Tester Logez-vous dès maintenant</button>
        </div>
      </div>
    </section>

    {{-- <section>
        <div class="container-fluid ">
            <div class="container">
                <div>
                    <h4><span class="text-danger"> optimise</span> vos revenus locatifs avec des <span class="text-danger"> tarifs attractifs <span></span></h4>
                    <p>Et vous ne payez qu'en cas de <span class="text-danger"> succès !</span></p>
                </div>
                <div class="d-flex justify-content-around">
                    <div>
                        <div class="calculator">Économisez~ 532 € /an</div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section>
        <div class="container-fluid col-xxl-8 py-5">
            <h4 class=" lh-1 text-center"><img src="{{ asset('storage/images/logez-vous.png') }}" width="18%"
                    alt="" class="img-fluid">
                <span class="text-danger"> loue mieux</span> votre logement
            </h4>
            <div class="d-none d-md-block">
                <div class="row align-items-center g-2 py-5">
                    <div class="col col-md-6 ps-3">
                        <h5 class="text-danger">Nous mettons votre bien en valeur</h5>
                        <small>Un photographe professionnel se rend sur place sous 48h. Votre logement bénéficie d’une
                            visite virtuelle à 360° et de visuels de haute qualité qui augmentent l’intérêt des candidats
                            pour votre logement de plus de 70%.
                        </small><br><br>
                        <small>Cela permet également d’accélérer la mise en location en faisant pré-visiter votre bien en
                            ligne.</small>
                    </div>
                    <div class="col col-md-6 text-center">
                        <img src="{{ asset('storage/images/camera-man.png') }}" class="d-block mx-md-auto img-fluid"
                            alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                        <small>Nous réalisons un reportage complet de votre logement : prises de vue 360°, photos, vidéos <a
                                href="" class="text-danger">(voir des exemples)</a></small>
                    </div>
                </div>

                <div class="row align-items-center g-2 py-5">
                    <div class="col col-md-6 text-center">
                        <img src="{{ asset('storage/images/facebook.png') }}" class="d-block mx-md-auto img-fluid"
                            alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                        <small>Notre réseau d’entreprises et d’universités nous permet d’atteindre un grand nombre de
                            candidats</small>
                    </div>
                    <div class="col col-md-6 ps-3">
                        <h5 class="text-danger">Nous touchons un maximum de locataires</h5>
                        <small>L’annonce de votre bien sera diffusée tous les jours sur tous les supports pouvant générer
                            des candidatures :</small>
                        <small>
                            <li>Sur 15+ portails immobiliers premium (SeLoger, Leboncoin, Logic-Immo, Bien’ici, …)</li>
                        </small>
                        <small>
                            <li>Sur les réseaux sociaux pour une meilleure visibilité</li>
                        </small>
                        <small>
                            <li>Sur le réseau des partenaires Flatlooker constitué des services de mobilité internationale
                                d’entreprises du CAC 40, d’agences de relocation pour expatriés et d’universités et grandes
                                écoles françaises.</li>
                        </small>
                    </div>
                </div>

                <div class="row align-items-center g-2 py-5">
                    <div class="col col-md-6 ps-3">
                        <h5 class="text-danger"> Vous choisissez votre futur locataire</h5>
                        <small>Lorsque les candidats nous transmettent leur dossier locatif, nos agents immobiliers étudient
                            les critères de solvabilité et les projets de chacun.</small> <br><br>
                        <small>Nous utilisons un algorithme de certification pour nous assurer de l'authenticité des
                            documents qui nous parviennent. Vous gardez un droit de regard sur la sélection finale du
                            locataire.</small>
                    </div>
                    <div class="col col-md-6 text-center">
                        <img src="{{ asset('storage/images/findpaper.png') }}" class="d-block mx-md-auto img-fluid"
                            alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                        <small>Nous vérifions minutieusement toutes les pièces du dossier locatif des
                            candidats</a></span></small>
                    </div>
                </div>

                <div class="row align-items-center g-2 py-5">
                    <div class="col col-md-6 ps-3">
                        <h5 class="text-danger">Nous rédigeons le bail et effectuons un état des lieux précis</h5>
                        <small>Avec votre aval, nous rédigeons le bail et les actes de cautionnement solidaire conformément
                            à la réglementation en vigueur. Nous planifions et réalisons avec soin l’état des lieux
                            d’entrée avec votre locataire.</small> <br><br>
                        <small>Notre approche est transparente : vous retrouvez tous les documents de votre location (baux,
                            états des lieux, …) sur votre espace sécurisé.</small>
                    </div>
                    <div class="col col-md-6 text-center">
                        <img src="{{ asset('storage/images/furniture1.png') }}" class="d-block mx-md-auto img-fluid"
                            alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                        <small>Nous réalisons des état des lieux très minutieux pour suivre avec précision l’état du
                            logement et éviter tout conflit lors de la restitution du dépôt de garantie. <span
                                class="text-danger"><a href="" class=""> (voir des
                                    exemples)</a></span></small>
                    </div>
                </div>
            </div>
            <div class="d-block d-md-none">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item mb-4">
                        <h2 class="accordion-header ">
                            <button class="accordion-button collapsed text-danger fs-4" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Nous mettons votre bien en valeur
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div>
                                    <small>Un photographe professionnel se rend sur place sous 48h. Votre logement bénéficie
                                        d’une visite virtuelle à 360° et de visuels de haute qualité qui augmentent
                                        l’intérêt des candidats pour votre logement de plus de 70%.
                                    </small><br><br>
                                    <small>Cela permet également d’accélérer la mise en location en faisant pré-visiter
                                        votre bien en ligne.</small>
                                </div>
                                <div class="justify-content-center text-center">
                                    <img src="{{ asset('storage/images/camera-man.png') }}"
                                        class="d-block mx-auto img-fluid" alt="Bootstrap Themes" width="200"
                                        height="500" loading="lazy">
                                    <small>Nous réalisons un reportage complet de votre logement : prises de vue 360°,
                                        photos, vidéos <a href="" class="text-danger">(voir des
                                            exemples)</a></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-4">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed text-danger fs-4" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                Nous touchons un maximum de locataires
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div>
                                    <small>L’annonce de votre bien sera diffusée tous les jours sur tous les supports
                                        pouvant générer des candidatures :</small>
                                    <small>
                                        <li>Sur 15+ portails immobiliers premium (SeLoger, Leboncoin, Logic-Immo, Bien’ici,
                                            …)</li>
                                    </small>
                                    <small>
                                        <li>Sur les réseaux sociaux pour une meilleure visibilité</li>
                                    </small>
                                    <small>
                                        <li>Sur le réseau des partenaires Flatlooker constitué des services de mobilité
                                            internationale d’entreprises du CAC 40, d’agences de relocation pour expatriés
                                            et d’universités et grandes écoles françaises.</li>
                                    </small>
                                </div>
                                <div class="text-center">
                                    <img src="{{ asset('storage/images/facebook.png') }}"
                                        class="d-block mx-auto img-fluid" alt="Bootstrap Themes" width="200"
                                        height="500" loading="lazy">
                                    <small>Notre réseau d’entreprises et d’universités nous permet d’atteindre un grand
                                        nombre de candidats</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-4">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed text-danger fs-4" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Vous choisissez votre futur locataire
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div>
                                    <small>Lorsque les candidats nous transmettent leur dossier locatif, nos agents
                                        immobiliers étudient les critères de solvabilité et les projets de chacun.</small>
                                    <br><br>
                                    <small>Nous utilisons un algorithme de certification pour nous assurer de l'authenticité
                                        des documents qui nous parviennent. Vous gardez un droit de regard sur la sélection
                                        finale du locataire.</small>
                                </div>
                                <div class=" text-center">
                                    <img src="{{ asset('storage/images/findpaper.png') }}"
                                        class="d-block mx-auto img-fluid" alt="Bootstrap Themes" width="200"
                                        height="500" loading="lazy">
                                    <small>Nous vérifions minutieusement toutes les pièces du dossier locatif des
                                        candidats</a></span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed text-danger fs-4" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false"
                                aria-controls="flush-collapseFour">
                                Nous rédigeons le bail et effectuons un état des lieux précis
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div>
                                    <small>Avec votre aval, nous rédigeons le bail et les actes de cautionnement solidaire
                                        conformément à la réglementation en vigueur. Nous planifions et réalisons avec soin
                                        l’état des lieux d’entrée avec votre locataire.</small> <br><br>
                                    <small>Notre approche est transparente : vous retrouvez tous les documents de votre
                                        location (baux, états des lieux, …) sur votre espace sécurisé.</small>
                                </div>
                                <div class="text-center">
                                    <img src="{{ asset('storage/images/furniture1.png') }}"
                                        class="d-block mx-auto img-fluid" alt="Bootstrap Themes" width="200"
                                        height="500" loading="lazy">
                                    <small>Nous réalisons des état des lieux très minutieux pour suivre avec précision
                                        l’état du logement et éviter tout conflit lors de la restitution du dépôt de
                                        garantie. <span class="text-danger"><a href="" class=""> (voir des
                                                exemples)</a></span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section>
        <div class="container-fluid loge mb-4">
            <div class="container">
                <h2 class="text-center mb-3 pt-5"><img src="{{ asset('storage/images/logez-vous.png') }}" width="18%"
                        alt="" class="img-fluid">augmente <span class="text-danger">l'occupation </span> de votre
                    logement</h2>
                <h5 class="text-center">Une agence de quartier met <span class="text-danger">30 jours</span> pour trouver
                    un locataire</h5>
                <div class="shadow bg-white p-4">
                 <div class="d-flex">
                    <div class="text-center">
                        <img src="{{ asset('storage/images/quartier.png')}}" alt="" class="d-block img-fluid">
                        <small>Agence de quartier</small>
                    </div>
                    <div class="progressbar d-flex justify-content-between">
                        <div class="progress-step"></div>
                        <div class="progress-step"></div>
                        <div class="progress-step"></div>
                        <div class="progress-step"></div>
                        <div class="progress-step"></div>
                    </div>
                 </div>
                </div>
                <h2 class="text-center mb-5 pt-5"> Avec<img src="{{ asset('storage/images/logez-vous.png') }}"
                        width="18%" alt="" class="img-fluid"> c'est en moyenne <span class="text-danger">10
                        jours !</span></h2>
            </div>
        </div>
    </section>
    <section>
        <div class="justify-content-center">
            <h2 class="text-center mb-3 pt-5"><img src="{{ asset('storage/images/logez-vous.png') }}" width="18%"
                    alt="" class="img-fluid"> <span class="text-danger">gère mieux</span> votre logement </h2>
        </div>
        <div class="container-fluid col-xxl-8 py-5 d-none d-md-block">

            <div class="row align-items-center g-5 py-5">
                <div class="col col-md-7 ps-4">
                    <h5 class="text-danger">Vous disposez d’un gestionnaire dédié et d’outils modernes</h5>
                    <span class="mb-3">Un gestionnaire locatif expérimenté vous est dédié et est disponible pour répondre
                        rapidement à toutes vos questions.</span><br>
                    <span>Suivez les opérations de votre gestionnaire via votre espace en ligne sécurisé. Bénéficiez d’un
                        accès 7/7j et 24/24h à l’ensemble des informations concernant la location de votre bien (contrats,
                        états des lieux, encaissements, devis, …).</span>
                </div>
                <div class="col col-md-5 text-center">
                    <img src="{{ asset('storage/images/woman-desk.png') }}" class="d-block mx-md-auto img-fluid"
                        alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                    <small class="text-muted">Nos gestionnaires répondent à toutes vos questions</small>
                </div>
            </div>
            <div class="row align-items-center g-2 py-5">
                <div class="col col-md-6 text-center">
                    <img src="{{ asset('storage/images/wallet-calender.png') }}" class="d-block mx-md-auto img-fluid"
                        alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                    <small class="text-muted">Les fonds sont transférés sur votre compte moins de 7 jours après le paiement
                        du locataire</small>
                </div>
                <div class="col col-md-6">
                    <h5 class="text-danger">Vous percevez vos loyers en moins de 7 jours</h5>
                    <small>L’automatisation des paiements et des relances nous permet d’être beaucoup plus rapides qu’une
                        agence de quartier. Bien entendu, nous nous occupons également du reste de votre gestion
                        administrative et financière :</small>
                    <li>Appels des loyers et charges, encaissements et quittancements des locataires</li>
                    <li>Révision annuelle des loyers et régularisation des charges</li>
                    <li>Aide à la déclaration de vos revenus fonciers</li>
                </div>
            </div>
            <div class="row align-items-center g-2 py-5">
                <div class="col col-md-6 ps-3">
                    <h5 class="text-danger">Nous nous occupons de toute la gestion technique</h5>
                    <small>Nous assurons sous votre contrôle la gestion des évènements courants pouvant avoir lieu dans
                        votre logement (plomberie, serrurerie, électricité, ménage, …) : </small>
                    <small>
                        <li>Bénéficiez de notre réseau d’artisans présélectionnés et notés à chaque intervention. C’est la
                            garantie d’un artisan fiable, à un prix juste.</li>
                    </small>
                    <small>
                        <li>Suivez les actions de votre gestionnaire locatif et les interventions des artisans à distance.
                        </li>
                    </small>
                    <small>
                        <li>Étudiez et validez électroniquement vos devis via votre espace en ligne</li>
                    </small>
                </div>
                <div class="col col-md-6 text-center">
                    <img src="{{ asset('storage/images/man.png') }}" class="d-block mx-md-auto img-fluid"
                        alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                    <small class="text-muted">Vous pouvez suivre toutes les opérations en temps réel depuis votre espace
                        propriétaire</small>
                </div>
            </div>
            <div class="row align-items-center g-2 py-5">
                <div class="col col-md-6 text-center">
                    <img src="{{ asset('storage/images/customerService.png') }}" class="d-block mx-md-auto img-fluid"
                        alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                </div>
                <div class="col col-md-6">
                    <h5 class="text-danger"> Nous sommes facilement joignables par téléphone</h5>
                    <small>Notre équipe multilingue est joignable à des horaires décalés et vous répond par
                        WhatsApp, Messenger, Mail, Téléphone, ou Skype.</small> <br><br>
                    <small>Notre service est particulièrement adapté aux propriétaires expatriés.</small>
                </div>
            </div>
        </div>
        <div class="d-block d-md-none">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item mb-4">
                    <h2 class="accordion-header ">
                        <button class="accordion-button collapsed text-danger fs-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false"
                            aria-controls="flush-collapseFive">
                            Vous disposez d’un gestionnaire dédié et d’outils modernes
                        </button>
                    </h2>
                    <div id="flush-collapseFive" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div>
                                <small>Un gestionnaire locatif expérimenté vous est dédié et est disponible pour répondre
                                    rapidement à toutes vos questions.</small><br><br>
                                <small>Suivez les opérations de votre gestionnaire via votre espace en ligne sécurisé.
                                    Bénéficiez d’un accès 7/7j et 24/24h à l’ensemble des informations concernant la
                                    location de votre bien (contrats, états des lieux, encaissements, devis, …).</small>
                            </div>
                            <div class="justify-content-center text-center">
                                <img src="{{ asset('storage/images/woman-desk.png') }}" class="d-block mx-auto img-fluid"
                                    alt="Bootstrap Themes" width="200" height="500" loading="lazy">
                                <small>Nous réalisons un reportage complet de votre logement : prises de vue 360°, photos,
                                    vidéos <a href="" class="text-danger">(voir des exemples)</a></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-4">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-danger fs-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false"
                            aria-controls="flush-collapseSix">
                            Vous percevez vos loyers en moins de 7 jours
                        </button>
                    </h2>
                    <div id="flush-collapseSix" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div>
                                <small>L’automatisation des paiements et des relances nous permet d’être beaucoup plus
                                    rapides qu’une agence de quartier. Bien entendu, nous nous occupons également du reste
                                    de votre gestion administrative et financière :</small>
                                <li>Appels des loyers et charges, encaissements et quittancements des locataires</li>
                                <li>Révision annuelle des loyers et régularisation des charges</li>
                                <li>Aide à la déclaration de vos revenus fonciers</li>
                            </div>
                            <div class="text-center mt-4">
                                <img src="{{ asset('storage/images/wallet-calender.png') }}"
                                    class="d-block mx-auto img-fluid" alt="Bootstrap Themes" width="200"
                                    height="500" loading="lazy">
                                <small class="text-muted">Les fonds sont transférés sur votre compte moins de 7 jours après
                                    le paiement du locataire</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-4">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-danger fs-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false"
                            aria-controls="flush-collapseSeven">
                            Nous nous occupons de toute la gestion technique
                        </button>
                    </h2>
                    <div id="flush-collapseSeven" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div>
                                <small>Nous assurons sous votre contrôle la gestion des évènements courants pouvant avoir
                                    lieu dans votre logement (plomberie, serrurerie, électricité, ménage, …) : </small>
                                <small>
                                    <li>Bénéficiez de notre réseau d’artisans présélectionnés et notés à chaque
                                        intervention. C’est la garantie d’un artisan fiable, à un prix juste.</li>
                                </small>
                                <small>
                                    <li>Suivez les actions de votre gestionnaire locatif et les interventions des artisans
                                        à distance.</li>
                                </small>
                                <small>
                                    <li>Étudiez et validez électroniquement vos devis via votre espace en ligne</li>
                                </small>
                            </div>
                            <div class="text-center">
                                <img src="{{ asset('storage/images/man.png') }}" class="d-block mx-auto img-fluid"
                                    alt="Bootstrap Themes" width="200" height="500" loading="lazy">
                                <small class="text-muted">Vous pouvez suivre toutes les opérations en temps réel depuis
                                    votre espace propriétaire</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-danger fs-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false"
                            aria-controls="flush-collapseEight">
                            Nous sommes facilement joignables par téléphone
                        </button>
                    </h2>
                    <div id="flush-collapseEight" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div>
                                <small>Notre équipe multilingue est joignable à des horaires décalés et vous répond par
                                    WhatsApp, Messenger, Mail, Téléphone, ou Skype.</small> <br><br>
                                <small>Notre service est particulièrement adapté aux propriétaires expatriés.</small>
                            </div>
                            <div class="text-center">
                                <img src="{{ asset('storage/images/customerService.png') }}"
                                    class="d-block mx-auto img-fluid" alt="Bootstrap Themes" width="200"
                                    height="500" loading="lazy">
                                <small class="text-muted">Vous pouvez suivre toutes les opérations en temps réel depuis
                                    votre espace propriétaire</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container-fluid mb-5 pb-2 loge">
            <div class="container">
                <div class="col-lg-10 mx-auto">
                    <h4 class=" lh-1 mb-5 text-danger text-center"><img
                            src="{{ asset('storage/images/logez-vous.png') }}" width="18%" alt=""
                            class="img-fluid"> peut vous garantir contre les
                        <span>loyers impayés</span>
                    </h4>
                    <div class="row mb-5">
                        <div class="col-lg-8">
                            <small>Chaque année en France environ 3% des locations donnent lieu à un impayé. Ce taux est
                                plus
                                faible chez Flatlooker grâce à nos outils de scoring intelligents. Nous vous proposons tout
                                de même de pouvoir vous assurer à moindre coût contre les impayés.</small><br><br>
                            <small class="mb-3">En partenariat avec Mila, nous vous proposons en option une assurance
                                contre
                                les loyers impayés à <span class="text-danger">2,5% TTC</span> du loyer charges
                                comprises.</small>
                            <div class="row row-cols-3 row-cols-md-4 gap-2 mt-5 ">
                                <div class="shadow col-sm-5 py-4">
                                    <div class="justify-content-center text-center">
                                        <img src="{{ asset('storage/images/logos/calc.png') }}" alt=""
                                            class="img-fluid mb-4">
                                        <h5 class="text-danger">Loyers <br> impayés</h5>
                                        <small>aucune limite de montant ni de durée (sans franchise)</small>
                                    </div>
                                </div>
                                <div class="shadow col-sm-5 py-4">
                                    <div class="justify-content-center text-center">
                                        <img src="{{ asset('storage/images/logos/board1.png') }}" alt=""
                                            class="img-fluid mb-1">
                                        <h5 class="text-danger">Détériorations immobilières</h5>
                                        <small>Plafond de 10.000 Frs (sans franchise)</small>
                                    </div>
                                </div>
                                <div class="shadow col-sm-5 py-4">
                                    <div class="justify-content-center text-center">
                                        <img src="{{ asset('storage/images/logos/scale.png') }}" alt=""
                                            class="img-fluid mb-1">
                                        <h5 class="text-danger">Protection <br> juridique</h5>
                                        <small>Plafond de 16.000 Frs (200frs de franchise)</small>
                                    </div>
                                </div>
                                <div class="shadow col-sm-5 py-4">
                                    <div class="justify-content-center text-center">
                                        <img src="{{ asset('storage/images/logos/gear.png') }}" alt=""
                                            class="img-fluid mb-4">
                                        <h5 class="text-danger">Taux d’effort locataire</h5>
                                        <small>Max. 40%</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <img src="{{ asset('storage/images/logos/defender.png') }}" alt=""
                                class="img-fluid d-none d-md-block">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-5 mt-2">
                        <form action="">
                            <button class="btn btn-danger rounded-pill p-3 mb-5">Confiez la gestion de votre bien à
                                Logez-vous</button>
                        </form>
                    </div>
                    <h2 class="text-center mb-3 pt-5">Ils font confiance à<img
                            src="{{ asset('storage/images/logez-vous.png') }}" width="18%" alt=""
                            class="img-fluid"> </h2>
                    <div class="row row-col-lg-6 d-flex justify-content-center mb-5">
                        <div class="col-lg-6">
                            <h4 class="text-center text-danger my-4">On parle de nous dans la presse</h4>
                            <div id="carouselExampleIndicators" class="carousel slide">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="card shadow ">
                                            <img src="{{ asset('storage/images/home/house.jpg') }}"
                                                class="card-img-top img-fluid" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title and
                                                    make up the
                                                    bulk of the card's content.</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="card shadow ">
                                            <img src="{{ asset('storage/images/home/house.jpg') }}"
                                                class="card-img-top img-fluid" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title and
                                                    make up the
                                                    bulk of the card's content.</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="card shadow ">
                                            <img src="{{ asset('storage/images/home/house.jpg') }}"
                                                class="card-img-top img-fluid" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title and
                                                    make up the
                                                    bulk of the card's content.</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="text-center text-danger my-4">On parle de nous dans la presse</h4>
                            <div id="carouselExampleIndicators2" class="carousel slide">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators2"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators2"
                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators2"
                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="card shadow ">
                                            <img src="{{ asset('storage/images/home/house.jpg') }}"
                                                class="card-img-top img-fluid" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title and
                                                    make up the
                                                    bulk of the card's content.</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="card shadow ">
                                            <img src="{{ asset('storage/images/home/house.jpg') }}"
                                                class="card-img-top img-fluid" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title and
                                                    make up the
                                                    bulk of the card's content.</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="card shadow ">
                                            <img src="{{ asset('storage/images/home/house.jpg') }}"
                                                class="card-img-top img-fluid" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title and
                                                    make up the
                                                    bulk of the card's content.</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="container shadow bg-white py-5">
                        <div class="row ps-5">
                            <div class="col-lg-3">
                                <small>Logez-vous est titulaire d'une carte professionnelle délivrée par la <span
                                        class="text-danger"> Chambre du
                                        Commerce et d'Industrie</span> de Paris Île-de-France, est certifié par <span
                                        class="text-danger">Galian</span>, et soutenu par
                                    <span class="text-danger">Bpifrance</span></small>
                            </div>
                            <div class="col-lg-3">
                                <img src="{{ asset('storage/images/logos/logo1.png') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="col-lg-3">
                                <img src="{{ asset('storage/images/logos/logo2.png') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="col-lg-3">
                                <img src="{{ asset('storage/images/logos/logo3.png') }}" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid mt-5 pt-5">
            <div class="col-lg-10 mx-auto">
                <div class="container">
                    <h1 class="my-5 pb-2 text-center">Retrouvez nos 5227 biens en gestion</h1>
                    <div>
                        <iframe src="" frameborder="0"></iframe>
                    </div>
                    <div class="">
                        <iframe style="width: 100%" height="500" frameborder="0"
                            src="https://www.bing.com/maps/embed?h=400&w=500&cp=4.051261716169492~9.871902465820312&lvl=11&typ=d&sty=r&src=SHELL&FORM=MBEDV8"
                            scrolling="no">
                        </iframe>
                    </div>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 mb-4 px-5">
                        @foreach ([1, 2, 3] as $item)
                            <div class="card shadow ms-3" style="width: 22rem;">
                                <img src="{{ asset('storage/images/home/house.jpg') }}" class="card-img-top img-fluid"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="container ">
                        <div class="row d-flex justify-content-around mt-5 mb-5 text-center">
                            <div class="col-lg-3 d-grid">
                                <a href="" class="text-decoration-none "><small>Gestion locative a
                                        Littoral</small></a><br>
                                <a href="" class="text-decoration-none"><small>Gestion locative a
                                        sud-ouest</small></a><br>
                                <a href="" class="text-decoration-none"><small>Gestion locative a
                                        l'Ouest</small></a><br>
                            </div>
                            <div class="col-lg-3 d-grid">
                                <a href="" class="text-decoration-none"><small>Gestion locative a
                                        centre</small></a><br>
                                <a href="" class="text-decoration-none my-2"><small>Gestion locative a
                                        Nord</small></a><br>
                                <a href="" class="text-decoration-none"><small>Gestion locative a
                                        Nord-ouest</small></a><br>
                            </div>
                            <div class="col-lg-3 d-grid">
                                <a href="" class="text-decoration-none"><small>Gestion locative a
                                        sud</small></a><br>
                                <a href="" class="text-decoration-none my-2"><small>Gestion locative a
                                    </small></a><br>
                                <a href="" class="text-decoration-none"><small>Gestion locative a
                                        Lille</small></a><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
