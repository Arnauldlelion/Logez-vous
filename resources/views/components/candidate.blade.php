@extends('layouts.app')

@section('content')
    {{-- /* Candidate section */ --}}

    <section>
        <div class="container">
            <h2>Candidatures</h2>
            <div class="candidate_dropdown">
                <div class="shadow">
                    <div class="dashboard_dropdown">
                        <div class="shadow">
                            <div class="dashboard_dropdown_header my-4 p-4">
                                <div class="question d-flex justify-content-between align-items-center py-2">
                                    <h6 class="text-danger">Les
                                        étapes de votre candidature chez Flatlooker</h6>
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
                <div class="shadow">
                    <div class="align-items-center rounded-1 shadow mt-3 ps-3 py-2" style="border-left: 5px solid green">
                        <p>Vous n'avez pas de candidatures en cours. Pour débuter votre recherche, <span
                                class="text-danger">
                                cliquez-ici !</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Partners section --}}
    <section>
        <div class="container">
            <h4>Nos partenaires</h4>
            <small>Flatlooker fait équipe avec des prestataires de confiance, pour vous assurer un séjour de qualité dans
                votre logement.</small>
            <div class="row d-block d-md-flex mb-4 gap-4">
                <div class="col shadow py-4">
                    <div>
                        <img src="{{ asset('storage/images/logos/luko.png') }}" alt="">
                    </div>
                    <div class="container ">
                        <div>
                            <small>Flatlooker s'associe à Luko pour vous <b> offrir 2 mois sur votre assurance Habitation <i class="fa-solid fa-house"></i></b></small>
                        </div>
                        <div>
                            <small>Luko, c'est la néo-assurance hafatation #1 en Afrique :</small>
                        </div>
                        <ul>
                            <li><small>+350k assurés</small></li><br>
                            <li><small>Assuré(e) en 2mn, et 20% moins cher en moyenne que le marché</small></li><br>
                            <li><small>Remboursements 2x plus rapides en cas de sinistres</small></li>
                        </ul>
                       <div>
                        <a href="" class="text-decoration-none text-reset"> <small><i class="fa-solid fa-chevron-down" style="color: rgb(231, 21, 21)"></i>En savoir plus </small></a>
                       </div>
                       <div class="mt-3">
                        <button class="btn btn-danger rounded-pill">1 mois offert chez Luko</button>
                       </div>
                    </div>
                </div>
                <div class="col shadow py-4">
                    <div>
                        <img src="{{ asset('storage/images/logos/pepla.png') }}" alt="">
                    </div>
                    <div class="container ">
                        <div class="mt-2">
                            <small><i class="fa fa-rocket"></i> Donne un coup de booste à ton épargne avec Mon Petit Placement</small>
                        </div>
                        <div class="my-2">
                            <small>Logez-vous s'associe à Mon Petit Placement pour rendre l<b>'investissement <br> accessible à tous</b> . Grâce à Logez-vous, vous pouvez bénéficiez de <br> <b>0% de réduction</b> 3 sur leurs commissions.</small>
                        </div>
                        <div>
                            <small>C’est LA solution simple et efficace pour faire fructifier ton épargne et accéder aux meilleurs placements dès 300€ et en moins de 10 minutes !</small>
                        </div>
                       <div class="mt-2">
                        <a href="" class="text-decoration-none text-reset"> <small><i class="fa-solid fa-chevron-down" style="color: rgb(231, 21, 21)"></i>En savoir plus </small></a>
                       </div>
                       <div class="mt-5">
                        <a href=""><button class="btn btn-danger rounded-pill">30% offerts sur vous commissions</button></a>
                       </div>
                    </div>
                </div>
                
            </div>
            <div class="row d-block d-md-flex mb-4 gap-4">
                <div class="col shadow py-4">
                    <div>
                        <img src="{{ asset('storage/images/logos/papernest.png') }}" alt="">
                    </div>
                    <div class="container ">
                        <div class="my-4">
                            <small>Papernest est une conciergerie administrative qui s’occupe gratuitement de tester votre éligibilité puis de trouver pour vous la meilleure 
                                offre de box internet pour votre nouveau logement. Ne perdez plus de temps pour trouver les meilleures offres, notre partenaire papernest s’en
                                 charge pour vous ! Il s’occupe de tout, de la souscription à la résiliation. C’est simple, rapide et 100% gratuit.</small>
                            
                        </div>
                       <div class="mt-4 d-flex align-items-end">
                        <button class="btn btn-danger rounded-pill">Découvrir Papernest</button>
                       </div>
                    </div>
                </div>
                <div class="col shadow py-4">
                    <div>
                        <img src="{{ asset('storage/images/logos/engie.png') }}" alt="">
                    </div>
                    <div class="container ">
                        <div>
                            <small>Le premier fournisseur de gaz naturel en France. Engie vous permet de souscrire à votre contrat gaz en 5 minutes, sans engagement et sans frais d’annulation.</small>
                        </div>
                       
                       <div class="mt-3 d-flex ">
                        <a href=""><button class="btn btn-danger rounded-pill d-flex align-items-end">Découvrir Engie</button></a>
                       </div>
                    </div>
                </div>
                
            </div>
            <div class="row d-block d-md-flex mb-4 gap-4">
                <div class="col shadow py-4">
                    <div>
                        <img src="{{ asset('storage/images/logos/free.png') }}" alt="">
                    </div>
                    <div class="container ">
                        <div class="my-2">
                            <small>Choisissez Free pour la box internet de votre futur logement. Vous pouvez bénéficier de réductions sur vos freebox et vos forfaits mobiles.</small>
                        </div>
                        <div>
                            <small>Free c'est le N°1 du débit fibre depuis 2 ans.</small>
                        </div>
                       
                       <div class="mt-2">
                        <a href="" class="text-decoration-none text-reset"> <small><i class="fa-solid fa-chevron-down" style="color: rgb(231, 21, 21)"></i>En savoir plus </small></a>
                       </div>
                       <div class="mt-3">
                        <button class="btn btn-danger rounded-pill">Choisissez votre Freebox</button>
                       </div>
                    </div>
                </div>
                <div class="col shadow py-4">
                    <div>
                        <img src="{{ asset('storage/images/logos/ilek.png') }}" alt="">
                    </div>
                    <div class="container ">
                        <div class="my-2">
                            <small>Emménagez en toute sérénité grâce à notre partenaire énergie ilek. Le fournisseur de gaz et électricité ilek promet une énergie verte aux mêmes tarifs qu'EDF. </small>
                        </div>
                        
                       <div class="mt-2">
                        <a href="" class="text-decoration-none text-reset"> <small><i class="fa-solid fa-chevron-down" style="color: rgb(231, 21, 21)"></i>En savoir plus </small></a>
                       </div>
                       <div class="mt-5">
                        <a href=""><button class="btn btn-danger rounded-pill">10000frs offert chez ilek</button></a>
                       </div>
                    </div>
                </div>
                
            </div>
            <div class="row d-block d-md-flex gap-4">
                <div class="col shadow py-4">
                    <div>
                        <img src="{{ asset('storage/images/logos/nextories.png') }}" alt="">
                    </div>
                    <div class="container ">
                        <div>
                            <small>Nextories vous accompagne dans votre déménagement du début à la fin !</small>
                        </div>
                        <ul>
                            <li><small><b>100% Gratuit</b> et <b> sans engagement</b></small></li><br>
                            <li><small><b>Personnalisé</b> : un interlocuteur dédié, vous accompagne tout au long de votre projet.</small></li><br>
                            <li><small><b>Garanti zéro mauvaise surprise</b> : une estimation rigoureuse et exhaustive, par visio-conférence.</small></li>
                            <li><small><b>Premium</b> : des déménageurs professionnels, sélectionnés et certifiés pour la qualité et le sérieux de leurs prestations, validés par nos avis clients.</small></li>
                        </ul>
                       <div>
                        <a href="" class="text-decoration-none text-reset"> <small><i class="fa-solid fa-chevron-down" style="color: rgb(231, 21, 21)"></i>En savoir plus </small></a>
                       </div>
                       <div class="mt-3">
                        <button class="btn btn-danger rounded-pill">Déménagez avex Nextories</button>
                       </div>
                    </div>
                </div>
                <div class="col shadow py-4">
                    <div>
                        <img src="{{ asset('storage/images/logos/climb_ex.png') }}" alt="">
                    </div>
                    <div class="container align-items-end ">
                        <div class="mt-2">
                            <small>Les experts Climb vous accompagnent et vous aident à réduire vos impôts. En moyenne, vous économiserez 4500€ / an. 800 000 utilisateurs leur ont déjà fait confiance et ont attribué la note de 4,9/5 à leur service.</small>
                        </div>
                        <div class="my-2">
                            <small>Bénéficiez de l'accompagnement des experts Climb gratuitement dans l'aide à la déclaration de vos revenus (partage d'écran et une prise en main complète sur impots.gouv).</small>
                        </div>
                       <div class="mt-5">
                        <a href=""><button class="btn btn-danger rounded-pill">Découvrire Climb</button></a>
                       </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>



    {{-- Delete account section --}}
    <section>
        <div class="container py-4">
            <h2>Mon compte</h2>
            <form action="" method="post">
                @csrf
                <div class="shadow py-4 mb-3 px-3">
                    <h5 class="text-danger">Changer mes informations</h5>
                    <div class="row mb-3">
                        <div class="form-group col-12 col-lg-6">
                            <label for="fname">Prénom</label>
                            <input type="text" class="form-control w-100 rounded-pill" name="fname"
                                value="{{ old('fname') }}">
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="lname">Nom</label>
                            <input type="text" class="form-control w-100 rounded-pill" name="lname"
                                value="{{ old('lname') }}">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="form-group col-12 col-lg-6">
                            <label for="email">Adresse e-mail</label>
                            <input type="email" class="form-control w-100 rounded-pill" name="email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="tel_number">Numéro de téléphone</label>
                            <input type="number" class="form-control w-100 rounded-pill" name="tel_number"
                                value="{{ old('tel_number') }}">
                        </div>
                    </div>
                    <hr>
                    <div class="row my-3 mt-4">
                        <h5 class="text-danger">Changer mon mot de passe</h5>
                        <div class="form-group col-12 col-lg-6">
                            <label for="new_password">Nouveau mot de passe</label>
                            <input type="password" class="form-control w-100 rounded-pill" name="new_password">
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="password_confimation">Confirmation du nouveau mot de passe</label>
                            <input type="password" class="form-control w-100 rounded-pill" name="password_confimation">
                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-danger rounded-pill float-end ">Enregistrer les modifications</button>
                </div>
            </form>
            <div class="dashboard_dropdown mt-5">
                <div class="shadow mt-5">
                    <div class="dashboard_dropdown_header my-4 p-4">
                        <div class="question d-flex justify-content-between align-items-center">
                            <p class="text-danger">Supprimer mon compte</p>
                            <i class="fa fa-chevron-down"></i>
                        </div>
                        <div class="dashboard_dropdown_content">
                            <p> vous n'êtes pas satisfait des services de Logez-vous? Vous pouvez à tout moment supprimer
                                votre
                                compte. Attention, cette action est irréversible.</p>
                            <button class="btn btn-danger rounded-pill mt-4">Supprimer mon compte</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        /*   dashboard  */
        const dropdowns = document.querySelectorAll('.dashboard_dropdown_header')

        dropdowns.forEach(dropdown => {
            dropdown.addEventListener("click", () => {
                dropdown.classList.toggle("active")
            })
        })
    </script>
@endsection
