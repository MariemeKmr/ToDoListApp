@extends('adminDashboard')

@section('title', 'Edit users')
@section('stylecss')
<link rel="stylesheet" href="{{ asset('css/ManageUser.css') }}">
@endsection
@section('content-edit')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        <h2>Modifier l'utilisateur</h2>
        @csrf
        @method('PUT')
            <div class="form-group">
            <label for="first_name">Prenom</label>
            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Prenom" value="{{ old('first_name', $user->first_name) }}" required>
            <label for="last_name">Nom</label>
            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Nom" value="{{ old('last_name', $user->last_name) }}" required>
            <label for="phone">Telephone</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Telephone" value="{{ old('phone', $user->phone) }}" required>
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email', $user->email) }}" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Laissez vide pour conserver le mot de passe actuel.">
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Laissez vide pour conserver le mot de passe actuel.">
            <label for="role">Rôle</label>
            <select name="role" id="role" class="form-control">
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Utilisateur</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
            </select>
        </div>

        <button type="submit">Mettre à jour</button>
    </form>
</div>
@endsection
