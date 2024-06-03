<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 'Admin')</title>
        <link rel="stylesheet" href="{{asset('css/ManageUser.css')}}">
        @yield('stylecss')
    </head>
    <body>
        <div class="container">
            <div class="userDashboard"></div>
            <ul class="navBar">
                <h1>Admin Dashboard</h1>
                @auth
                <li>
                    <form action="{{route('logout')}}" method="POST" class="form-logout">
                        @method('DELETE') @csrf
                        <button type="submit" id="Deconnexion">Se déconnecter</button>
                    </form>
                </li>
                <li>
                    <a href="{{route('admin.users.list')}}">lister les utilisateurs</a>
                </li>
                <li>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Ajouter un utilisateur</a>
                </li>
                <li>
                    <a href="{{route('admin.dashboard')}}">DashBoard</a>
                </li>

            </ul>
            <br>
            <style>
                #Deconnexion,
                btn-delete {
                    background: none;
                    border: none;
                    cursor: pointer;
                    text-decoration: none;
                    padding: 16px 20px;
                    background-color: #003f7d;
                    color: white;
                    border: none;
                    cursor: pointer;
                    display: block;
                    margin: 2px auto 10px;
                    border-radius: 8px;
                    text-decoration: none;
                    text-align: center;
                }

                #Deconnexion:hover {
                    background-color: #00509e;
                }
            </style>
            <div class="contenus">
                @endauth @yield('content-list') @yield('content-edit') @yield('content-create')
            </div>
        </body>
    </html>
