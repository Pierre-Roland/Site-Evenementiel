<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        <div class="event-comment">
            <h2 class="comment-title">Espace Commentaire</h2>

            <div id="commentaireFormContainer" 
                data-username="{{ auth()->check() ? auth()->user()->name : 'Non' }}" 
                data-idEvent="{{ $event->id ?? '' }}">
                <form id="commentaireForm" class="comment-form">
                    <input type="text" name="comment" placeholder="Écrire un commentaire..." required>
                    <button type="submit">Publier</button>
                </form>
                <p id="result" class="comment-result"></p>
            </div>

            <div class="comment-list" id="commentList">
                <!-- Les commentaires seront injectés ici -->
            </div>
        </div>
    </main>
    <script src="{{ asset('js/comment.js') }}"></script>
</body>
</html>
