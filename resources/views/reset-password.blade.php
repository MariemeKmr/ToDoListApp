<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Réinitialiser le mot de passe</title>
        <link rel="stylesheet" href="{{asset('css/resetPassword.css')}}">
    </head>
    <body>
        <form action="{{ route('reset-password') }}" method="POST">
            @csrf
            <h1>Reinitialiser mot de passe</h1>
            {{-- <input type="hidden" name="phone" value="{{ $phone }}">
            <input type="hidden" name="first_name" value="{{ $first_name }}">
            <input type="hidden" name="last_name" value="{{ $last_name }}"> --}}

            <input type="hidden" name="email" value="{{ $email }}">

            <label for="password">
                Mot de passe</label>
            <input
                type="password"
                name="password"
                placeholder="Nouveau mot de passe"
                required="required">

            <label for="passwordConfirmation">
                Confirmation Mot de passe
            </label>
            <input
                type="password"
                name="password_confirmation"
                placeholder="Confirmez le nouveau mot de passe"
                required="required">
            <button type="submit">Réinitialiser le mot de passe</button>
        </form>
    </body>
</html>
