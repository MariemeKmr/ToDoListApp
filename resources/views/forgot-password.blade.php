<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mot de passe oublié</title>
        <link rel="stylesheet" href="{{asset('css/resetPassword.css')}}">

    </head>
    <body>
        <form action="{{ route('forgot-password') }}" method="POST">
            @csrf
            <h1>Veuillez saisir votre Email</h1>

            {{-- <label for="phone">Telephone</label>
            <input
                type="phone"
                name="phone"
                placeholder="Telephone"
                required="required">

            <label for="last_name">Nom</label>
            <input
                type="text"
                name="last_name"
                placeholder="Veuillez saisir votre nom"
                required="required">
            <label for="first_name">Prenom</label>
            <input
                type="text"
                name="first_name"
                placeholder="Veuillez saisir votre prenom"
                required="required"> --}}

            <label for="email">Email</label>
            <input
                type="email"
                name="email"
                placeholder="adresse e-mail"
                required="required">
            <button type="submit">
                Demander une réinitialisation de mot de passe</button>
        </form>
    </body>
</html>
