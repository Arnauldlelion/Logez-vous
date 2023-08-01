<a href="#" class="house-card h-100 shadow-lg">
    @if ($showBanner)
        <div class="img-container">
            <img src="/storage/images/premium.png" class="img-fluid premium" alt="{{ config('app.name') }}">
        </div>
    @endif
    <div class="card {{ $showBorder ? 'card-border' : '' }}">
        @if ($isSlider)
            <div class="card-img-top">
                @include('components.card-carousel', [
                    'index' => $index,
                ])
            </div>
        @else
            <img src="/storage/images/room.jpeg" alt="Room" class="card-img-top">
        @endif
        <div class="card-body">
            <div class="num-text">toulon (83200)</div>
            <div class="price">8,000 XAF cc - 57.0 m<sup>2</sup></div>
            <div class="rooms">3 pièces * non meublé * 1er étage</div>
            <div class="published">Publié le 11 juillet 2023</div>
        </div>
    </div>
</a>

@if ($type == 'featured')
<div class="col-lg-3 col-sm-12 mb-4">
    <div class="card shadow ">
        <img src="{{asset('storage/images/home/house.jpg')}}" class="card-img-top img-fluid" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
</div>
@elseif($type == 'carousel')
<div class="card shadow col-4 col-sm-12 hv-10 {{ $item > 1 ? 'd-none d-lg-block' : ''}}" style="width: 14rem;">
    <img src="{{asset('storage/images/home/house.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h6 class="card-title">Card title</h6>
        <small class="card-text">Some quick example text to build on the card tit</small>
    </div>
</div>   
<<<<<<< HEAD
@endif
=======
@endif
>>>>>>> 7175341778e194c3a39e71ec47b396b7f4bdc8d2
