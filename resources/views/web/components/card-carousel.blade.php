<div id="card-carousel-{{ $index }}" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach ($apartment->images as $key => $image)
            <button type="button" data-bs-target="#card-carousel-{{ $index }}"
                data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"
                aria-current="{{ $key === 0 ? 'true' : 'false' }}"
                aria-label="Slide {{ $key + 1 }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach ($apartment->images as $key => $image)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $image->url) }}" class="d-block object-fit-cover" style=" height: 150px; border-radius:0">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#card-carousel-{{ $index }}"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#card-carousel-{{ $index }}"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>