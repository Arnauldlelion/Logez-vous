<!-- resources/views/create.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
   <!-- create-property.blade.php -->
   <div class="container mb-5" style="margin-top:8rem">
    <div class="shadow-lg bg-white p-3 p-lg-5">
        <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="image" class="image">Ajouter une image:</label>
            <input type="file" name="image" id="image"><br>
        
            <label for="town" class="text">Ville:</label>
            <input type="text" name="town" id="town"><br>
        
            <label for="monthly_price" class="number">Prix:</label>
            <input type="number" name="monthly_price" id="monthly_price"><br>
        
            <label for="pieces" class="number">Pièces:</label>
            <input type="number" name="pieces" id="pieces"><br>
        
            <label for="description">Description:</label>
            <input type="text" name="description" id="description"><br>
        
            <label for="furnished">Meublé:</label>
            <input type="checkbox" name="furnished" id="furnished"><br>
        
            <label for="floor">Étage:</label>
            <select name="floor" id="floor">
                <option value="ground">RDC</option>
                <option value="first">1er</option>
                <option value="second">2e</option>
                <option value="third">3e</option>
                <option value="fourth">4e</option>
                <option value="fifth">5e</option>
            </select><br>
        
            <!-- Add more input fields for other property attributes -->
            <button type="submit">Create Property</button>
        </form>
</div>
</div>
@endsection