document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById('commentaireForm');
    const container = document.getElementById('commentaireFormContainer');
    const result = document.getElementById('result');
    const idEvent = container.dataset.idevent;
    const commentList = document.getElementById('commentList');

    function loadCommentaires() {
        fetch(`/commentaires/${idEvent}`, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            credentials: 'same-origin'
        })
        .then(response => response.json())
        .then(events => {
            if (events.length === 0) {
                tbody.innerHTML = '<tr><td colspan="4">Aucun commentaire trouvé.</td></tr>';
                return;
            }
            commentList.innerHTML = '';
            events.forEach(event => {
                const card = document.createElement('div');
                card.className = 'comment-card';
                card.innerHTML = `
                    <div class="username">${event.username}</div>
                    <div class="date">${
                        event.date
                            ? new Date(event.date).toLocaleDateString('fr-FR', {
                                day: 'numeric',
                                month: 'long',
                                year: 'numeric'
                            })
                            : '—'
                    }</div>

                    <div class="comment-text">${event.comment}</div>
                `;
                commentList.appendChild(card);
            });
        })
        .catch(error => {
            console.error('Erreur lors du chargement des commentaires :', error);
        });
    }

    loadCommentaires();

    form.addEventListener('submit', async (e) => {
        e.preventDefault(); // 🔹 empêche le submit classique

        const comment = form.elements.comment.value;
        const username = container.dataset.username;

        console.log(username);

        try {
            const response = await fetch('/commentaires', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ username, comment, idEvent }),
                credentials: 'same-origin'
            });

            if (!response.ok) throw new Error(`Erreur HTTP: ${response.status}`);

            const data = await response.json();

            if(data.success){
                result.style.color = 'green';
                result.textContent = 'Commentaire publié !';
                form.reset();

                // 🔹 Recharge les commentaires après ajout
                loadCommentaires();
            } else {
                result.style.color = 'red';
                result.textContent = data.message || 'Erreur lors de la publication';
            }
        } catch (err) {
            result.style.color = 'red';
            result.textContent = 'Erreur réseau ou serveur';
            console.error('Fetch POST commentaire:', err);
        }
    });
});