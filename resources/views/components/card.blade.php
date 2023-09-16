<div class="house-card h-100 shadow-lg">
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
            <img src="{{ asset('storage/' . $apartment->coverImage->url) }}" alt="Room" class="card-img-top object-fit-cover" width="150px" height="150px">
        @endif
<div class="card-body">
    <div class="num-text">{{$apartment->property->location}} (83200)</div>
    <div class="price">{{ $apartment->monthly_price}} XAF cc - 57.0 m<sup>2</sup></div>
<<<<<<< HEAD
    <div class="rooms">{{ $apartment->number_of_appartnents}} * {{ $apartment->furnished}} * {{ $apartment->floor}}</div>
    <!--<div class="published">Publié le 11 juillet 2023</div>-->
=======
    <div class="rooms d-flex">
            <li class="list-unstyled">{{ $apartment->number_of_appartnents}} pièces</li>
            <li class="ms-2">{{ $apartment->furnished}}</li>
            <li class="ms-2">{{ $apartment->floor}} étage</li>
    </div>
        
    <div class="published">Publié le 11 juillet 2023</div>
>>>>>>> f6430b596c30cc99d69e92e6d7317911f6c06183
</div>
</div>
</div>
{{-- <div class="card-body">
    <div class="num-text">toulon (83200)</div>
    <div class="price">8,000 XAF cc - 57.0 m<sup>2</sup></div>
    <div class="rooms">3 pièces * non meublé * 1er étage</div>
    <div class="published">Publié le 11 juillet 2023</div>
</div>
</div>
</a>
pièces --}}
