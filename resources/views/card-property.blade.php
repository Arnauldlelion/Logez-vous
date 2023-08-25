<div class="card">
    @foreach ($data as $property)
        <h2>{{ $property->type }}</h2>
        <img src="{{ $property->image }}" alt="Property Image">
        <p>{{ $property->description }}</p>
        <p>Town: {{ $property->town }}</p>
        <p>Quarter: {{ $property->quarter }}</p>
        <p>Monthly Price: {{ $property->monthly_price }}</p>
        <p>Size: {{ $property->size }}</p>
        <p>Number of pieces: {{ $property->pieces }}</p>
        <p>Furnished: {{ $property->furnished ? 'Yes' : 'No' }}</p>
        <p>Floor: {{ $property->floor }}</p>
    @endforeach
</div>