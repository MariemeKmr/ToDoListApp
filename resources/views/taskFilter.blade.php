<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tâches - {{ ucfirst($status) }}</title>
    <link rel="stylesheet" href="{{ asset('css/userDashboard.css') }}">
</head>
<body>
    <div class="container">
        <div class="userDashboard"></div>
        <ul class="navBar">
            @auth
            <p class="acceuil">{{ Auth::user()->first_name }} Dashboard</p>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="form-logout">
                    @csrf @method('DELETE')
                    <button type="submit" class="form-logout">Déconnexion</button>
                </form>
            </li>
            @else
            <li>
                <a href="{{ route('login') }}">Se connecter</a>
            </li>
            @endauth
            <li>
                <a href="{{ route('tasks.filter', 'Terminer') }}">Terminer</a>
            </li>
            <li>
                <a href="{{ route('tasks.filter', 'En cours') }}">En cours</a>
            </li>
            <li>
                <a href="{{ route('tasks.filter', 'A faire') }}">A faire</a>
            </li>
            <li>
                @auth
                <a href="{{ route('user.dashboard') }}">DashBoard</a>
                @else
                <a href="{{ route('login') }}">Se connecter</a>
                @endauth
            </li>
            <li>
                <a href="{{ route('task-create') }}" class="add-task">+</a>
            </li>
        </ul>
        <br>
        <div class="content">
            <h1>Tâches - {{ ucfirst($status) }}</h1>
            <div class="task-list">
                @if(isset($tasks) && $tasks->count() > 0)
                    @foreach ($tasks as $task)
                        <div class="task-item">
                            <div>
                                <strong>{{ $task->title }}</strong>
                                <p>{{ $task->description }}</p>
                            </div>
                            <div class="task-actions">
                                <a href="{{ route('tasks.show', $task) }}"><img src="{{ asset('icones/view.png') }}" alt="Voir" class="icons"></a>
                                <a href="{{ route('tasks.edit', $task) }}"><img src="{{ asset('icones/edit.png') }}" alt="Modifier" class="icons"></a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="delete-button">
                                    @csrf @method('DELETE')
                                    <button type="submit"><img src="{{ asset('icones/bin.png') }}" alt="trash icon" class="icons"></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p id="No-Task">Aucune tâche disponible.</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
