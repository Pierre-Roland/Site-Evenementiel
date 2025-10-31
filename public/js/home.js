document.addEventListener("DOMContentLoaded", () => {
    function requestEventHome(route, id) {
        fetch(`/events/${route}`, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(events => {
            const tbody = document.querySelector(`#${id} tbody`);
            tbody.innerHTML = ''; // Nettoyer avant d'ajouter

            if (events.length === 0) {
                tbody.innerHTML = '<tr><td colspan="4">Aucun événement trouvé.</td></tr>';
                return;
            }

            events
            .filter(event => event.rate > 0)
            .slice(0, 5)
            .forEach(event => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${event.title}</td>
                    <td>${event.description}</td>
                    <td>${event.date ? new Date(event.date).toLocaleDateString('fr-FR') : '—'}</td>

                    <td>${event.rate}</td>
                `;
                tbody.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Erreur lors du chargement des événements :', error);
        });
    }

    requestEventHome("getMostPopular", "eventsTable");
    requestEventHome("getNextEvents", "eventsTableRecent");
});