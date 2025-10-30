<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/connection.css') }}">
    <title>Login</title>
</head>
<body>
    @include('header')
    <main>
        <div class="login-container">
            <h2>Connexion</h2>
            <form id="loginForm">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">Se connecter</button>
            </form>
            <a href="{{ route('signup') }}" class="btn">S'inscrire</a>
            <p id="result"></p>
        </div>
    </main>
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
