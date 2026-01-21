// OBLINK Shopping Cart System (Demo for Jury)
// Uses LocalStorage - No Stripe integration yet

class OblinkCart {
    constructor() {
        this.cart = this.loadCart();
        this.initializeCartBadge();
        this.attachEventListeners();
    }

    loadCart() {
        const saved = localStorage.getItem('oblink_cart');
        return saved ? JSON.parse(saved) : [];
    }

    saveCart() {
        localStorage.setItem('oblink_cart', JSON.stringify(this.cart));
        this.updateCartBadge();
    }

    addItem(item) {
        // Check if item already exists
        const existing = this.cart.find(i => i.id === item.id);

        if (existing) {
            existing.quantity += 1;
        } else {
            this.cart.push({
                id: item.id,
                name: item.name,
                price: item.price,
                category: item.category,
                quantity: 1
            });
        }

        this.saveCart();
        this.showNotification(`✅ ${item.name} ajouté au panier !`);
    }

    removeItem(itemId) {
        this.cart = this.cart.filter(item => item.id !== itemId);
        this.saveCart();
    }

    updateQuantity(itemId, quantity) {
        const item = this.cart.find(i => i.id === itemId);
        if (item) {
            item.quantity = Math.max(1, quantity);
            this.saveCart();
        }
    }

    getTotal() {
        return this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    }

    getItemCount() {
        return this.cart.reduce((sum, item) => sum + item.quantity, 0);
    }

    clearCart() {
        this.cart = [];
        this.saveCart();
    }

    initializeCartBadge() {
        this.updateCartBadge();
    }

    updateCartBadge() {
        const badge = document.getElementById('cart-badge');
        const count = this.getItemCount();

        if (badge) {
            badge.textContent = count;
            badge.style.display = count > 0 ? 'flex' : 'none';
        }
    }

    showNotification(message) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'fixed top-24 right-4 bg-green-500 text-white px-6 py-4 rounded-xl shadow-2xl z-50 animate-slide-in';
        notification.innerHTML = `
            <div class="flex items-center gap-3">
                <i class="fas fa-check-circle text-2xl"></i>
                <span class="font-bold">${message}</span>
            </div>
        `;

        document.body.appendChild(notification);

        // Remove after 3 seconds
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateX(400px)';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    attachEventListeners() {
        // Add to cart buttons
        document.addEventListener('click', (e) => {
            if (e.target.closest('.add-to-cart-btn')) {
                e.preventDefault();
                const btn = e.target.closest('.add-to-cart-btn');
                const item = {
                    id: btn.dataset.id,
                    name: btn.dataset.name,
                    price: parseFloat(btn.dataset.price),
                    category: btn.dataset.category
                };
                this.addItem(item);
            }
        });
    }
}

// Initialize cart on page load
let oblinkCart;
document.addEventListener('DOMContentLoaded', function () {
    oblinkCart = new OblinkCart();
});

// CSS for animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slide-in {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    .animate-slide-in {
        animation: slide-in 0.3s ease-out;
    }
`;
document.head.appendChild(style);
