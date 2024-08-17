
    <div class="wrap-content">
        @include('includes.appbar')

        <br /><br /><br />

        @php
            $user = Auth::user();
        @endphp

        <div class="container">
            <div class="border datatable-cover">
                <h2>welcome {{ $user->name }} <br />vous êtes un utilisateur</h2>
            </div>
        </div>
    </div>