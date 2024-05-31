<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier la tâche</title>
    <link rel="stylesheet" href="{{asset('css/userDashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/create_editTask.css')}}">

</head>
<body>
    <div class="container">
        <h1>Modifier la tâche</h1>
        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="title">Titre:</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description" required>{{ $task->description }}</textarea>

            <label for="status">Statut</label>
            <div id="container">
                <div class="radio-container">
                    <input type="radio" id="todo-input" name="status" value="A faire"/>
                    <label for="todo-input" class="circle-cont">
                        <div class="circle"></div>
                    </label>
                    <label for="todo-input" class="label-name">A faire</label>
                </div>

                <div class="radio-container">
                    <input type="radio" id="inprogress-input" name="status" value="En cours"/>
                    <label for="inprogress-input" class="circle-cont">
                        <div class="circle"></div>
                    </label>
                    <label for="inprogress-input" class="label-name">En cours</label>
                </div>

                <div class="radio-container">
                    <input type="radio" id="done-input" name="status" value="Terminer"/>
                    <label for="done-input" class="circle-cont">
                        <div class="circle"></div>
                    </label>
                    <label for="done-input" class="label-name">Terminé</label>
                </div>
            </div>
            <button type="submit">Modifier</button>
        </form>
    </div>
</body>
</html>
