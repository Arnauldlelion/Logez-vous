
<div class="banner w-100 d-flex justify-content-center align-items-end">
    <video id="videoBG" poster="{{ asset('storage/images/home/img.jpg') }}" autoplay muted loop>
        <source src="{{ asset('storage/images/video/video.mp4') }}" type="video/mp4">
    </video>
    <div class="content col-lg-7 mx-lg-auto text-center pb-3">
        <h1 class="text-light mb-4">Visitez et louez votre prochain logement depuis chez vous</h1>
        <div class="row  ">
            <div class="col-10 mx-auto">
                <div class="py-3" style="background: white; border-radius:10px;">
                    <ul class="nav nav-tabs  justify-content-center mb-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active py-2" id="tab1-tab" data-bs-toggle="tab" href="#tab1"
                                role="tab" aria-controls="tab1" aria-selected="true">LOCATAIRE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab"
                                aria-controls="tab2" aria-selected="false">PROPRIETAIRE</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane show fade active" id="tab1">
                            <div class="container">
                                <form method="GET" enctype="multipart/form-data" action="/properties">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" name="title"
                                                    placeholder="Indiquez une adresse, un lieu, une rue..."
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-3">
                                                <input type="text" name="price" placeholder="Budget CFA max"
                                                    class="form-control">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" placeholder="Surface m2 min" class="form-control">
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-danger rounded-pill w-100"
                                                    type="submit">Rechercher</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade " id="tab2">
                            <div class="container">
                                <form method="POST" enctype="multipart/form-data" action="">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" name="title" placeholder="Indiquez une adresse"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <button class="btn btn-outline-danger rounded-pill w-100">Estimer mon
                                                    loyer</button>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-danger rounded-pill w-100">Obtenir un
                                                    devis</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
