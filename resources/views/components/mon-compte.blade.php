@extends('layouts.locatairespanel')

@section('content')

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