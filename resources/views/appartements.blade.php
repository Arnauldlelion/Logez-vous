@extends('layouts.app')

@section('content')
    <section class="benefits py-3 pl-2 " style="padding-top: 10rem; padding-bottom: 10rem;" >
        <div class="ms-2" >
            <div class="search-block">
                <form>
                  <input type="text" placeholder="">
                 
                </form>
              </div>
            <div class="button-container">
                <button for="loyer"><i class="fa-solid fa-euro-sign"></i> Loyer</button>
                <button for="surface"><i class="fa-regular fa-square"></i>Surface</button>
                <button for="meuble"><i class="fa-solid fa-couch"></i>Meubles?</button>
            </div>
            <div class="button2-container">
                <button for="nomres-de-pieces"><i class="fa-brands fa-windows"></i>Nombre de pièces</button>
                <button for="plus-de-filtres">Plus de filtres</button>
            </div>
            <div class="button3-container">
                <button for="creer-une-alerte" style="color: #ff040c">Créer une alerte</button>
            </div>
            <div class="checkbox-container">
                <input type="checkbox" id="logements-louer"  value="true" checked>
                <label for="logements-louer">Afficher les logements deja loues</label>
            </div>
        </div>
    </section>
    <hr>
    <section class="container2">
        
     
        <div class="block-left" >
            <h2 > 95 logements disponible</h2>
            <div class="ms-2">
                
                <h5 style="padding-left: 450px;">Trier par <i class="fas fa-paper-plane" style="color: #ff040c"></i> <span style="color:#ff040c">distance du lieu choisi</span></h5>
                <h5 style="color: gray;">sur 3138</h5>

                <div data-bs-ride="card">
                    <div class="card">
                        @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31] as $i)
                            {{-- card item --}}
                            <div class="card-item {{ $i == 1 ? 'active' : '' }}" >
                                <div class="row">
                                    @foreach ([1, 2, 3] as $item)
                                        <div class="col-lg-4 mb-3" >
                                            <div class="card shadow h-100 {{ $item > 1 ? 'd-none d-lg-block' : '' }}">
                                                <img src="/storage/images/appartements.jpg" alt="Google Rating"
                                                    class="card-img-top">
                                                <div class="card-body bg-white">

                                                    <p>
                                                    <h6 style="color: gray;">Douala Bonamousadi(5e)</h6>
                                                    <h6 style="color:#ff040c;">75000 f - 48m2</h6>
                                                    <h6>2 pieces Meubles 4e etages</h6>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                           
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="block-right" >
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127357.54623182249!2d9.659401863784996!3d4.0360708364783475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1061128be2e1fe6d%3A0x92daa1444781c48b!2sDouala!5e0!3m2!1sfr!2scm!4v1690188289806!5m2!1sfr!2scm" width="700" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="scrollbar"></div>

     </div>
    </section>
@endsection
