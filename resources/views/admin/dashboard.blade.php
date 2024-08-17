@include('includes.appbar')
<div class="wrap-content">
        <br /><br /><br />

        @php
            $user = Auth::user();
        @endphp

        <div class="container">
            <div class="border datatable-cover">
                <h2>Bienvenue {{ $user->name }} sur votre page d'acceuil, vous êtes administrateur</h2>
            </div>
        </div>
    </div>


<style>
    #countdown {
        font-size: 2em;
        font-family: Arial, sans-serif;
    }
</style>

