<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Créer une tâche</title>
        <link rel="stylesheet" href="{{asset('css/create_editTask.css')}}">
    </head>
    <body>
        <h1>Ajouter tâche</h1>

            <form action="{{ route('tasks.store') }}" method="post">

            @csrf
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" required="required">

            <label for="description">Description</label>
            <textarea name="description" id="description" required="required"></textarea>

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

            <button type="submit">Enregistrer</button>
            <button type="button" onclick="window.location.href='/user/dashboard';">Annuler</button>
        </form>
    </body>
</html>
