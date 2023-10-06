
@endsection
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
        
           @if($apartment->coverImage)
           <img src="{{ asset('storage/' . $apartment->coverImage->url) }}" alt="Room" class="card-img-top object-fit-cover" style=" height: 150px; border-radius:0">
           @endif
        @endif
<div class="card-body">
    <div class="num-text">{{$apartment->name}} </div>
    <div class="num-text">{{$apartment->property->location}} (83200)</div>
    <div class="price">{{ $apartment->monthly_price}} XAF cc - 57.0 m<sup>2</sup></div>
    <div class="rooms d-flex">
            <li class="list-unstyled">{{ $apartment->number_of_pieces}} pièces</li>
            <li class="ms-2">{{ $apartment->furnished}}</li>
            <li class="ms-2">{{ $apartment->floor}} étage</li>
    </div>
        
    
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
