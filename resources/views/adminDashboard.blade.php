<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin</title>
        <link rel="stylesheet" href="{{asset('css/adminDashboard.css')}}">
    </head>
    <body>
        <h1>Admin Dashboard</h1>
        {{-- <button type="submit" id="Deconnexion">Se deconnecter</button> --}}
        @auth
        <form action="{{route('logout')}}" method="POST" class="form-logout">
            @method('DELETE') @csrf
            <button type="submit" id="Deconnexion">Se déconnecter</button>
        </form>
        @endauth
    </body>
</html>
