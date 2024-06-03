@extends('adminDashboard')


@section('title', 'Create users')
@section('stylecss')
<link rel="stylesheet" href="{{ asset('css/ManageUser.css') }}">
@endsection
@section('content-create')
<div class="container">
    <h2>Créer un utilisateur</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="first_name">Prenom</label>
            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Prenom" value="{{ old('first_name') }}" required>
            <label for="last_name">Nom</label>
            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Nom" value="{{ old('last_name') }}" required>
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required>
            <label for="phone">Telephone</label>
            <input type="phone" name="phone" class="form-control" id="phone" placeholder="Telephone" value="{{ old('phone') }}" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="password" required>
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
            <label for="role">Rôle</label>
            <select name="role" id="role" class="form-control">
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Utilisateur</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrateur</option>
            </select>
        </div>

        <button type="submit">Créer</button>
    </form>
</div>
@endsection
