@props(['apartment', 'index' => null, 'isSlider' => false, 'showBanner' => false, 'showBorder' => false])

<div class="house-card h-100 shadow-lg">
    @if ($apartment->created_at->diffInWeeks() < 1) <div class="img-container">
        <img src="/storage/images/premium.png" class="img-fluid premium" alt="{{ config('app.name') }}">
</div>
@endif
<div class="card {{ $showBorder ? 'card-border' : '' }}">
    @if ($isSlider)
    <div class="card-img-top">
        @include('web.components.card-carousel', [
        'index' => $index,
        ])
    </div>
    @else
    @if ($apartment->coverImage)
    <img src="{{ asset('storage/' . $apartment->coverImage->url) }}" alt="Room" class="card-img-top object-fit-cover" style=" height: 150px; border-radius:0">
    @endif
    @endif
    <div class="card-body">
        <div class="text-uppercase text-mute">{{ $apartment->property->location }}</div>
        <div class="text-main">{{ $apartment->monthly_price }} XAF - {{ $apartment->size }}m<sup>2</sup></div>
        <div>{{ $apartment->number_of_pieces }} pièces ● {{ $apartment->furnished }} ● {{ $apartment->floor }} étage
        </div>
        <div class="text-mute">Publié le {{ \Carbon\Carbon::parse($apartment->created_at)->locale('fr_FR')->isoFormat(' D MMMM YYYY') }}</div>
    </div>
</div>
</div>
