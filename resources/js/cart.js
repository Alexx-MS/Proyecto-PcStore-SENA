document.addEventListener('DOMContentLoaded', function () {
    // Función para obtener el conteo del carrito
    function updateCartCount() {
        fetch('/cart/count')
            .then(response => response.json())
            .then(data => {
                const cartCountElement = document.getElementById('cart-count');
                if (cartCountElement) {
                    cartCountElement.textContent = data.cartCount; // Actualiza el contador
                }
            })
            .catch(error => console.error('Error al actualizar el contador del carrito:', error));
    }

    // Escucha eventos de agregar al carrito
    document.querySelectorAll('.add-to-cart-button').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const productId = this.dataset.productId;
            const quantity = 1; // Cantidad por defecto, ajusta si es necesario

            fetch(`/cart/add/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ quantity })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateCartCount(); // Actualiza el contador dinámicamente
                        alert('Producto agregado al carrito');
                    }
                })
                .catch(error => console.error('Error al agregar producto al carrito:', error));
        });
    });
});
