<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/event-show.css') }}">
</head>
<body>
    @include('header')

    <main class="container">
        <div class="event-card">
            <h2 class="event-title">{{ $event->title }}</h2>
            <p class="event-description">{{ $event->description }}</p>
            <p class="event-date"><strong>Date :</strong> {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>
            <p class="event-rate"><strong>Note :</strong> {{ $event->rate }}</p>
            <a href="{{ route('events.index') }}" class="btn-back">Retour</a>
        </div>
    </main>
</body>
</html>
