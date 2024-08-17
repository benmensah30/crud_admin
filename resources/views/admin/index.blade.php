@extends('layouts.base')

@section('content')
    @include('includes.slidebar')

    <div class="wrap-content">
        @include('includes.appbar')

        <br /><br /><br />

        <div class="container">

            @if ($message = Session::get('success'))
                <ul class="alert alert-success">
                    <li>{{ $message }}</li>
                </ul>
            @endif

            <div class="border datatable-cover">
                <table id="datatable" class="stripe">
                    <thead>
                        <tr>
                            <th width="300" >Nom</th>
                            <th width="300" class="text-center">
                                Emails
                            </th>
                            <th width="300" class="text-center">
                                Opérations
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td width="300" class="text-center">
                                    {{ $user->name }}
                                </td>
                                <td width="300" class="text-center">
                                    {!! $user->email !!}
                                </td>
                                <td width="300" class="text-center" class="text-center">
                                    <a href="{{ route('users.edit_user', $user->id) }}" class="icon-button primary">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                    &nbsp;
                                    <form class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer la catégorie {{ $user->name }} ? Cette action sera irréversible !')">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="icon-button error">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection