<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sign up Page</title>
        <link rel="stylesheet" href="{{asset('css/signupPage.css')}}">
    </head>
    <body>
        <form method="post" action="{{ route('signup') }}" class="form-signup">
            @csrf
            <legend>Inscription</legend>

            @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <label for="Nom">Nom:</label>
            <input
                type="text"
                name="last_name"
                id="Nom"
                placeholder="Veuillez saisir votre Nom"
                required="required"
                value="{{ old('last_name') }}">
            @error('last_name')
            <div class="error">{{ $message }}</div>
            @enderror

            <label for="Prenom">Prénom:</label>
            <input
                type="text"
                name="first_name"
                id="Prenom"
                placeholder="Veuillez saisir votre Prénom"
                required="required"
                value="{{ old('first_name') }}">
            @error('first_name')
            <div class="error">{{ $message }}</div>
            @enderror

            <label for="email">Email :</label>
            <input
                type="email"
                name="email"
                id="email"
                placeholder="Veuillez saisir votre email"
                required="required"
                value="{{ old('email') }}">
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror

            <label for="Telephone">Téléphone:</label>
            <input
                type="text"
                name="phone"
                id="Telephone"
                placeholder="Veuillez saisir votre Téléphone"
                required="required"
                value="{{ old('phone') }}">
            @error('phone')
            <div class="error">{{ $message }}</div>
            @enderror

            <label for="motdepasse">Mot de passe :</label>
            <input
                type="password"
                name="password"
                id="motdepasse"
                placeholder="Veuillez saisir votre mot de passe"
                required="required">
            @error('password')
            <div class="error">{{ $message }}</div>
            @enderror

            <label for="password_confirmation">Confirmation Mot de passe :</label>
            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                placeholder="Veuillez resaisir votre mot de passe"
                required="required">

            <a href="{{route('login')}}">Vous avez deja un compte ? </a>
            <button type="submit">S'inscrire</button>
        </form>
    </body>
</html>
