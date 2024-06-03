<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/resetPassword.css') }}">
    <title>Mot de passe oublié</title>
</head>
<body>
    <h1>Veuillez saisir votre Email</h1>
    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required="required" placeholder="Veuillez saisir votre email">
        <button type="submit">Demander un lien de réinitialisation de mot de passe</button>
    </form>
</body>
</html>
