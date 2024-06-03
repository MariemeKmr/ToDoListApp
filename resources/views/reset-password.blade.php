<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Réinitialiser le mot de passe</title>
    <link rel="stylesheet" href="{{ asset('css/resetPassword.css') }}">
</head>
<body>
    <h1>Réinitialiser le mot de passe</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('password.update', ['token' => $token])  }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $email ?? old('email') }}" required="required">
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required="required">
        <label for="password_confirmation">Confirmation mot de passe:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required="required">
        <button type="submit">Réinitialiser le mot de passe</button>
    </form>
</body>
</html>
