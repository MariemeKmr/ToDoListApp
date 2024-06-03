
@extends('adminDashboard')
    @section('title', 'List users')
    @section('stylecss')
    <link rel="stylesheet" href="{{ asset('css/ManageUser.css') }}">
    @endsection
    @section('content-list')
        <div class="container">
            <h2>Liste Utilisateurs</h2>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="tableau-list">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Role</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user) }}" class="modifier">Modifier</a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="btn-delete" onclick="return confirm('etes vous sur de vouloir supprimer ce compte ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
