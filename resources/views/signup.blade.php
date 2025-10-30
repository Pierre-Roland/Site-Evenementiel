<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/connection.css') }}">
    <title>Signup</title>
</head>
<body>
    @include('header')
    <main>
        <div class="login-container">
            <h2>Inscription</h2>
            <form id="loginForm">
                <input type="text" name="username" placeholder="Username" required>
                <input type="text" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">S'inscrire</button>
            </form>
            <a href="{{ route('login') }}" class="btn">Retour</a>
            <p id="result"></p>
        </div>
    </main>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
