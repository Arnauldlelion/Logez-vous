<a href="/appartements/name" class="house-card h-100 shadow-lg">
    @if ($showBanner)
        <div class="img-container">
            <img src="{{ asset('storage/' . $item->featured() )}}" class="img-fluid premium" alt="{{ config('app.name') }}">
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
            <img src="{{ asset('storage/'. $item->featured())}}" alt="Room" class="card-img-top">
        @endif
        <div class="card-body">
            <div class="num-text">toulon (83200)</div>
            <div class="price">{{ $item->monthly_price }} XAF cc - {{ $item->size }} m<sup>2</sup></div>
            <div class="rooms">{{ $item->pieces }} pièces * non meublé * 1er étage</div>
            <div class="published">{{ $item->created_at->DiffForHumans()}}</div>
        </div>
    </div>
</a>
