@extends('layouts.app')

@section('content')
    <form action="/register" method="post">
        @csrf
        <div>
            <input type="text" placeholder="name" name="name">
        </div>
        <div>
            <input type="text" placeholder="email" name="email">
        </div>
        <div>
            <input type="text" placeholder="phone" name="phone">
        </div>
        <div>
            <input type="text" placeholder="password" name="password">
        </div>
        <div>
            <input type="text" placeholder="confirm password" name="password_confirmation">
        </div>
        <div>
            <input type="checkbox" name="type"> I am a landlord
        </div>
        <div>
            <input type="checkbox" name="subscribed"> I subscribe to new properties
        </div>

        <button type="submit">Register</button>
    </form>
@endsection
