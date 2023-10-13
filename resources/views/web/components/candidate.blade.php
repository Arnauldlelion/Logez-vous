@extends('layouts.locatairespanel')

@section('content')

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
                <div class="shadow">
                    <div class="align-items-center rounded-1 shadow mt-3 ps-3 py-2" style="border-left: 5px solid green">
                        <p>Vous n'avez pas de candidatures en cours. Pour débuter votre recherche, <a href="{{'/appartements'}}"><span
                                class="text-danger">
                                cliquez-ici !</span></a></p>
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
