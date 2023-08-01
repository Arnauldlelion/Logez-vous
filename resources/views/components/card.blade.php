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
