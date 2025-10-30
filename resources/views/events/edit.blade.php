<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'événement</title>
    <link rel="stylesheet" href="{{ asset('css/event-edit.css') }}">
</head>
<body>
    @include('header')

    <main class="container">
        <div class="form-card">
            <h2>Modifier l'événement</h2>

            <form action="{{ route('events.update', $event->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="title">Titre</label>
                <input type="text" id="title" name="title" value="{{ $event->title }}" placeholder="Titre">

                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Description">{{ $event->description }}</textarea>

                <label for="date">Date</label>
                <input type="date" id="date" name="date" value="{{ $event->date }}">

                <label for="rate">Note</label>
                <input type="number" id="rate" name="rate" value="{{ $event->rate }}" placeholder="Note">

                <button type="submit" class="btn-submit">Modifier</button>
            </form>

            <a href="{{ route('events.index') }}" class="btn-back">Retour</a>
        </div>
    </main>
</body>
</html>
