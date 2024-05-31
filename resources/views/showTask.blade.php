<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Voir la tâche</title>
        <link rel="stylesheet" href="{{asset('css/showTask.css')}}">
    </head>
    <body>
        <div class="container">
            <h1>{{ $task->title }}</h1>
            <h2>Tâches -
                {{ ucfirst($status) }}</h1>
            <p>{{ $task->description }}</p>

            <div class="button-edit-delete">
                <a href="{{ route('tasks.edit', $task) }}">Modifier</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </body>
</html>
