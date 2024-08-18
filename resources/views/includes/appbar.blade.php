<header class="app-bar">
    <table width="100%">
        <tr>
            @php
                $user = Auth::user();
            @endphp

            @if ($user && $user->badge == 1)
                <td>
                    <a href="{{ route('admin.dashboard') }}">
                        <b>Home</b>
                    </a>
                </td>
            @else
                <td>
                    <a href="{{ route('users.user_dashboard') }}">
                        <b>Home</b>
                    </a>
                </td>
            @endif

            <td class="text-right">
                <a href="{{ route('ad_login') }}">
                    <b>Déconnexion</b>
                </a>
            </td>
        </tr>
    </table>
</header>