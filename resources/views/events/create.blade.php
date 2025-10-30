<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un événement</title>
    <link rel="stylesheet" href="{{ asset('css/event-create.css') }}">
</head>
<body>
    @include('header')

    <main class="container">
        <div class="form-card">
            <h2>Créer un événement</h2>

            <form action="{{ route('events.store') }}" method="POST">
                @csrf

                <label for="title">Titre</label>
                <input type="text" id="title" name="title" placeholder="Titre" required>

                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Description" required></textarea>

                <label for="date">Date</label>
                <input type="date" id="date" name="date" required>

                <label for="rate">Note</label>
                <input type="number" id="rate" name="rate" placeholder="Note" required>

                <button type="submit" class="btn-submit">Créer</button>
            </form>

            <a href="{{ route('events.index') }}" class="btn-back">Retour</a>
        </div>
    </main>
</body>
</html>
