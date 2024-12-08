document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.useful-button').forEach(button => {
        button.addEventListener('click', () => {
            const opinionId = button.dataset.id;

            fetch(`/opinions/${opinionId}/toggle-useful`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    button.textContent = data.new_value ? 'Ya marcaste como útil' : '¿Te resultó útil?';
                    button.classList.toggle('marked', data.new_value);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
