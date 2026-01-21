# 🛒 OBLINK - Système de Panier & Formations

## ✅ Nouvelles Fonctionnalités

Le thème inclut maintenant un **système complet d'e-commerce** pour :
- ✅ Formations
- ✅ Abonnements
- ✅ Panier persistant (session)
- ✅ Checkout

**Pas de paiement requis pour le moment** - C'est juste la structure de commande !

---

## 🚀 Comment Ça Marche

### 1. **Page Formations** (`/formations`)
- Liste de formations avec prix
- Bouton "Ajouter au panier"
- AJAX - Pas de rechargement

### 2. **Panier** (`/panier`)
- Affiche les articles ajoutés
- Gérer les quantités (+ / -)
- Supprimer des articles
- Voir le total

### 3. **Checkout** (`/checkout`)
- Formulaire de client
- Adresse de facturation
- Résumé de commande
- Bouton "Valider"

---

## 📁 Fichiers Clés

### Nouveau Système
```
inc/cart-system.php          - Logique du panier (session)
page-formations-v2.php       - Catalogue formations
page-panier-v2.php           - Affichage du panier
page-checkout-v2.php         - Formulaire de checkout
```

### Fonctions Disponibles
```php
// Ajouter au panier
oblink_add_to_cart($product_id, $type, $name, $price, $quantity);

// Supprimer du panier
oblink_remove_from_cart($cart_key);

// Mettre à jour la quantité
oblink_update_cart_quantity($cart_key, $quantity);

// Récupérer le panier
$cart = oblink_get_cart();

// Total
$total = oblink_get_cart_total();

// Nombre d'articles
$count = oblink_get_cart_count();

// Vider le panier
oblink_clear_cart();
```

---

## 🔧 Configuration

### 1. Créer les pages WordPress

```
1. Allez à Pages → Ajouter une page
2. Titre: "Formations"
3. Modèle: "Formations"
4. Publiez

Répétez pour:
- Panier (modèle "Panier")
- Checkout (modèle "Checkout")
```

### 2. Ajouter les liens au menu

```
Apparence → Menus
- Ajouter "Formations"
- Ajouter "Panier"
```

---

## 💡 Données Stockées

Le panier utilise les **sessions PHP** (navigateur) :

```php
$_SESSION['oblink_cart'] = [
    'formation_1' => [
        'product_id' => 1,
        'type' => 'formation',
        'name' => 'BTS Opticien',
        'price' => 1299,
        'quantity' => 1,
    ]
];
```

**Avantage**: Pas besoin de base de données  
**Durée**: Jusqu'à fermeture du navigateur (ou configuration PHP)

---

## 🛠️ Ajouter Plus de Formations

Éditez `page-formations-v2.php` et ajoutez à l'array `$formations` :

```php
[
    'id' => 5,
    'name' => 'Ma nouvelle formation',
    'description' => 'Description...',
    'price' => 499,
    'duration' => '6 semaines',
    'level' => 'Débutant',
],
```

---

## 💳 Ajouter un Paiement Plus Tard

Pour ajouter Stripe/PayPal/etc:

1. **Installer un plugin** (ex: Stripe for WordPress)
2. **Ou modifier** `page-checkout-v2.php` :
   - Ajouter formulaire de carte
   - Intégrer l'API de paiement
   - Valider et créer commande

Pour le moment, le checkout se termine avec `alert()` - parfait pour tester le flux !

---

## 📊 Flux de Commande

```
Formations → Ajouter au panier → Panier → Checkout → Validation
     ↓              ↓               ↓         ↓           ↓
   [Catalog]    [AJAX]          [Review]  [Collect]  [Email/DB]
                 +Session        Info     Shipping
                 +Cart Count     Total    Address
```

---

## 🔐 Sécurité

✅ **Inclus:**
- CSRF protection (nonce)
- Sanitization des inputs
- Validation des données

⏳ **À ajouter:**
- Vérification des prix (anti-tampering)
- Validation des addresses
- Confirmation d'email
- Gestion des stocks

---

## 🎯 Étapes pour Tester

1. **Installez le thème** - Version avec panier
2. **Créez les pages** - Formations, Panier, Checkout
3. **Testez le flux** :
   - Allez à /formations
   - Cliquez "Ajouter"
   - Allez à /panier
   - Vérifiez le total
   - Allez à /checkout
   - Remplissez le formulaire
   - Validez

---

## 🚀 Prochaines Phases

### Phase 1: Formations (FAIT ✅)
- Catalogue formations
- Panier
- Checkout

### Phase 2: Paiement (À FAIRE)
- Intégration Stripe/PayPal
- Traitement du paiement
- Confirmation email

### Phase 3: Gestion (À FAIRE)
- Dashboard utilisateur
- Mes commandes
- Télécharger ressources formation

### Phase 4: Analytics (À FAIRE)
- Suivi des ventes
- Rapports
- CRM

---

## 📞 Support

**Problèmes courants:**

❓ Le panier se vide après reload
→ C'est normal avec les sessions (configuré pour 24h par défaut)

❓ AJAX ne fonctionne pas
→ Vérifiez que jQuery est chargé

❓ Les prix ne s'affichent pas
→ Vérifiez le format dans `page-formations-v2.php`

---

**Status**: ✅ PRÊT À TESTER
**Version**: OBLINK v60+ Shopping

Le système est minimaliste mais complet. Prêt pour ajouter des features !

