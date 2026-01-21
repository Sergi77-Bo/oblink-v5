/**
 * OBLINK - Address Autocomplete Helper
 * Using French Government API: https://adresse.data.gouv.fr
 */

class AddressAutocomplete {
    constructor(inputId, options = {}) {
        this.input = document.getElementById(inputId);
        if (!this.input) {
            console.error(`[AddressAutocomplete] Input #${inputId} not found`);
            return;
        }

        this.options = {
            minChars: 3,
            debounceDelay: 300,
            limit: 5,
            onSelect: options.onSelect || (() => { }),
            ...options
        };

        this.suggestionsList = null;
        this.debounceTimer = null;
        this.selectedIndex = -1;

        this.init();
    }

    init() {
        // Create suggestions dropdown
        this.createSuggestionsUI();

        // Attach event listeners
        this.input.addEventListener('input', (e) => this.handleInput(e));
        this.input.addEventListener('keydown', (e) => this.handleKeyboard(e));
        this.input.addEventListener('blur', () => {
            setTimeout(() => this.hideSuggestions(), 200);
        });

        console.log('[AddressAutocomplete] Initialized for', this.input.id);
    }

    createSuggestionsUI() {
        // Create container
        this.suggestionsList = document.createElement('ul');
        this.suggestionsList.id = `${this.input.id}-suggestions`;
        this.suggestionsList.className = 'address-suggestions';
        this.suggestionsList.style.cssText = `
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #e5e7eb;
            border-top: none;
            border-radius: 0 0 0.5rem 0.5rem;
            max-height: 300px;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            display: none;
            margin: 0;
            padding: 0;
            list-style: none;
        `;

        // Make input container relative
        this.input.parentElement.style.position = 'relative';
        this.input.parentElement.appendChild(this.suggestionsList);
    }

    handleInput(e) {
        const query = e.target.value.trim();

        if (query.length < this.options.minChars) {
            this.hideSuggestions();
            return;
        }

        // Debounce API calls
        clearTimeout(this.debounceTimer);
        this.debounceTimer = setTimeout(() => {
            this.searchAddresses(query);
        }, this.options.debounceDelay);
    }

    async searchAddresses(query) {
        try {
            const url = `https://api-adresse.data.gouv.fr/search/?q=${encodeURIComponent(query)}&limit=${this.options.limit}`;
            const response = await fetch(url);
            const data = await response.json();

            if (data.features && data.features.length > 0) {
                this.displaySuggestions(data.features);
            } else {
                this.hideSuggestions();
            }
        } catch (error) {
            console.error('[AddressAutocomplete] Error fetching addresses:', error);
            this.hideSuggestions();
        }
    }

    displaySuggestions(features) {
        this.suggestionsList.innerHTML = '';
        this.selectedIndex = -1;

        features.forEach((feature, index) => {
            const li = document.createElement('li');
            li.className = 'address-suggestion-item';
            li.dataset.index = index;
            li.style.cssText = `
                padding: 0.75rem 1rem;
                cursor: pointer;
                border-bottom: 1px solid #f3f4f6;
                transition: background-color 0.15s;
            `;

            const props = feature.properties;
            li.innerHTML = `
                <div style="font-weight: 600; color: #1f2937; margin-bottom: 0.25rem;">
                    ${props.name || props.label}
                </div>
                <div style="font-size: 0.875rem; color: #6b7280;">
                    ${props.postcode} ${props.city} ${props.context ? '· ' + props.context : ''}
                </div>
            `;

            li.addEventListener('mouseenter', () => {
                this.selectSuggestion(index);
            });

            li.addEventListener('click', () => {
                this.applySuggestion(feature);
            });

            this.suggestionsList.appendChild(li);
        });

        this.suggestionsList.style.display = 'block';
    }

    selectSuggestion(index) {
        // Remove previous selection
        const items = this.suggestionsList.querySelectorAll('.address-suggestion-item');
        items.forEach(item => {
            item.style.backgroundColor = '';
        });

        // Apply new selection
        if (items[index]) {
            items[index].style.backgroundColor = '#f3f4f6';
            this.selectedIndex = index;
        }
    }

    handleKeyboard(e) {
        const items = this.suggestionsList.querySelectorAll('.address-suggestion-item');

        if (items.length === 0) return;

        switch (e.key) {
            case 'ArrowDown':
                e.preventDefault();
                this.selectedIndex = Math.min(this.selectedIndex + 1, items.length - 1);
                this.selectSuggestion(this.selectedIndex);
                break;

            case 'ArrowUp':
                e.preventDefault();
                this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
                this.selectSuggestion(this.selectedIndex);
                break;

            case 'Enter':
                e.preventDefault();
                if (this.selectedIndex >= 0 && items[this.selectedIndex]) {
                    items[this.selectedIndex].click();
                }
                break;

            case 'Escape':
                this.hideSuggestions();
                break;
        }
    }

    applySuggestion(feature) {
        const props = feature.properties;

        // Fill input
        this.input.value = props.label;

        // Call callback with address data
        this.options.onSelect({
            label: props.label,
            name: props.name,
            street: props.street,
            postcode: props.postcode,
            city: props.city,
            context: props.context,
            coordinates: {
                lat: props.y,
                lng: props.x
            }
        });

        this.hideSuggestions();
    }

    hideSuggestions() {
        this.suggestionsList.style.display = 'none';
        this.selectedIndex = -1;
    }

    destroy() {
        if (this.suggestionsList) {
            this.suggestionsList.remove();
        }
    }
}

/**
 * Get user's current location
 */
async function getCurrentLocation() {
    return new Promise((resolve, reject) => {
        if (!navigator.geolocation) {
            reject(new Error('Géolocalisation non supportée par votre navigateur'));
            return;
        }

        navigator.geolocation.getCurrentPosition(
            position => resolve({
                lat: position.coords.latitude,
                lng: position.coords.longitude
            }),
            error => {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        reject(new Error('Permission de géolocalisation refusée'));
                        break;
                    case error.POSITION_UNAVAILABLE:
                        reject(new Error('Position indisponible'));
                        break;
                    case error.TIMEOUT:
                        reject(new Error('Timeout de géolocalisation'));
                        break;
                    default:
                        reject(new Error('Erreur de géolocalisation'));
                }
            },
            {
                timeout: 10000,
                enableHighAccuracy: true
            }
        );
    });
}

/**
 * Reverse geocode (coordinates -> address)
 */
async function reverseGeocode(lat, lng) {
    try {
        const url = `https://api-adresse.data.gouv.fr/reverse/?lon=${lng}&lat=${lat}`;
        const response = await fetch(url);
        const data = await response.json();

        if (data.features && data.features.length > 0) {
            const props = data.features[0].properties;
            return {
                label: props.label,
                name: props.name,
                street: props.street,
                postcode: props.postcode,
                city: props.city,
                context: props.context,
                coordinates: { lat, lng }
            };
        }

        throw new Error('Aucune adresse trouvée');
    } catch (error) {
        console.error('[reverseGeocode] Error:', error);
        throw error;
    }
}

/**
 * Add geolocation button to input
 */
function addGeolocationButton(inputId, onSuccess) {
    const input = document.getElementById(inputId);
    if (!input) return;

    const button = document.createElement('button');
    button.type = 'button';
    button.className = 'geolocation-btn';
    button.innerHTML = '<i class="fas fa-location-arrow"></i>';
    button.style.cssText = `
        position: absolute;
        right: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        background: linear-gradient(135deg, #ff6b35 0%, #ff8c42 100%);
        color: white;
        border: none;
        border-radius: 0.5rem;
        width: 2.5rem;
        height: 2.5rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
        box-shadow: 0 2px 4px rgba(255, 107, 53, 0.2);
    `;

    button.addEventListener('mouseenter', () => {
        button.style.transform = 'translateY(-50%) scale(1.05)';
        button.style.boxShadow = '0 4px 8px rgba(255, 107, 53, 0.3)';
    });

    button.addEventListener('mouseleave', () => {
        button.style.transform = 'translateY(-50%) scale(1)';
        button.style.boxShadow = '0 2px 4px rgba(255, 107, 53, 0.2)';
    });

    button.addEventListener('click', async () => {
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        button.disabled = true;

        try {
            const { lat, lng } = await getCurrentLocation();
            const address = await reverseGeocode(lat, lng);

            input.value = address.label;
            if (onSuccess) onSuccess(address);

            button.innerHTML = '<i class="fas fa-check"></i>';
            setTimeout(() => {
                button.innerHTML = '<i class="fas fa-location-arrow"></i>';
                button.disabled = false;
            }, 2000);
        } catch (error) {
            alert('❌ ' + error.message);
            button.innerHTML = '<i class="fas fa-location-arrow"></i>';
            button.disabled = false;
        }
    });

    input.parentElement.style.position = 'relative';
    input.parentElement.appendChild(button);
}

// Export for global use
window.AddressAutocomplete = AddressAutocomplete;
window.getCurrentLocation = getCurrentLocation;
window.reverseGeocode = reverseGeocode;
window.addGeolocationButton = addGeolocationButton;
