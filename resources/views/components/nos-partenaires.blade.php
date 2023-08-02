@extends('layouts.locatairespanel')

@section('content')

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


@endsection