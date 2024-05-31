<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login Page</title>
        <link rel="stylesheet" href="{{asset('css/loginPage.css')}}">
    </head>
    <body>

        <form method="post" action="{{ route('login') }}" class="form-login">

            @csrf
            <legend>Connexion</legend>

            <label for="email">Email
            </label>
            <input
                type="email"
                name="email"
                id="email"
                placeholder="Veillez saisir votre email"
                required="required"
                value="{{old('email')}}">

            <label for="motdepasse">Mot de passe
            </label>
            <input
                type="password"
                name="password"
                id="motdepasse"
                placeholder="Veillez saisir votre mot de passe"
                required="required">

            {{-- Message d'erreur --}}
                    @if ($errors->any())
                    <div style="color: red; font-size: 13px; margin-top:0px;">
                        @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif
                    <a href="{{route('forgot-password')}}">Mot de passe oublier ?</a>
            <div class="button-login-signup">
                <button type="submit">Se connecter</button>
                <button onclick="window.location.href='/signup';">S'incrire</button>
            </div>

        </form>
    </body>
</html>

