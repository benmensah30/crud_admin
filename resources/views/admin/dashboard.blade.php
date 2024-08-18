@extends('layouts.base')

@section('content')
    @include('includes.slidebar')

    <div class="wrap-content">
        @include('includes.appbar')

        <br /><br /><br />

        <div class="wrap-content">
            <br /><br /><br />

            @php
            $user = Auth::user();
            @endphp

            <div class="container">
                <div class="border datatable-cover">
                    <h2>Bienvenue {{ $user->name }} sur votre page d'acceuil, <br />vous êtes administrateur</h2>
                </div>
            </div>
        </div>
    </div>

@endsection

<style>
    #countdown {
        font-size: 2em;
        font-family: Arial, sans-serif;
    }
</style>