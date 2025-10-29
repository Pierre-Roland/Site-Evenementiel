document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById('loginForm');
    const result = document.getElementById('result');

    form.addEventListener('submit', async (e) => {
        e.preventDefault(); // Empêche le rechargement de la page
        
        const name = form.elements.username.value;
        const password = form.elements.password.value;
       
        const response = await fetch('/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ name, password })
        });

        const data = await response.json();

        if(data.success){
            result.style.color = 'green';
            result.textContent = 'Connexion réussie !';
            // Redirection après connexion (exemple)
            setTimeout(() => { window.location.href = '/home'; }, 1000);
        } else {
            result.style.color = 'red';
            result.textContent = data.message || 'Erreur de connexion';
        }
    });
});