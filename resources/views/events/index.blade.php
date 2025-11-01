<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des événements</title>
    <link rel="stylesheet" href="{{ asset('css/events.css') }}">
</head>
<body>
    @include('header')

    <main class="container">
        <h2>Liste des événements</h2>

        @if (auth()->check() && auth()->user()->role)
            <a href="{{ route('events.create') }}" class="btn-create">Créer un événement</a>
            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif
        @endif

        <ul class="event-list">
            @foreach($events as $event)
                <li class="event-item">
                    <div class="event-info">
                        <a href="{{ route('events.show', $event->id) }}" class="event-title">{{ $event->title }}</a>
                        <span class="event-date">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</span>
                    </div>
                    @if (auth()->check() && auth()->user()->role)
                        <div class="event-actions">
                            <a href="{{ route('events.edit', $event->id) }}" class="btn-edit">Modifier</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Supprimer</button>
                            </form>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    </main>
</body>
</html>
