@extends('landlord.layouts.app')

@section('content')

    <div class="table-responsive">
        <table class="table table-centered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Property</th>
                </tr>
            </thead>
            <tbody>
                @forelse($properties as $property)
                    @foreach ($property->apartments as $apartment)
                        <tr>
                            <td>{{ $loop->parent->index * 10 + $loop->index + 1 }}</td>
                            <td>Apartment {{ $apartment->id }}</td>
                            <td>{{ $property->name }}</td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="3">No apartments found for any property.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- {{ $admins->appends($search)->links()}} --}}

@endsection

@section('footer_script')
    <script></script>
@endsection