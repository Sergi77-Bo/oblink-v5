# OBLINK - Un opticien en un clin d'œil

## 🎨 Version Enhanced 2.0

Site web moderne et dynamique connectant opticiens indépendants et magasins d'optique.

## 🌐 URLs

- **Production**: https://3000-irjt648qgg0138ma6lxyd-02b9cc79.sandbox.novita.ai
- **API Stats**: https://3000-irjt648qgg0138ma6lxyd-02b9cc79.sandbox.novita.ai/api/stats

## ✨ Nouvelles Fonctionnalités Enhanced

### Animations et Effets
- **Cartes CTA avec flip 3D** : Les cartes "Je suis Opticien" et "Je suis Entreprise" ont un effet de retournement 3D au survol, révélant des personnages animés SVG
- **Formes flottantes animées** : Arrière-plan dynamique avec des formes organiques qui flottent et se transforment
- **Effet parallax** : Les éléments du hero se déplacent à différentes vitesses lors du scroll
- **Compteurs animés** : Les statistiques s'animent progressivement lors de l'apparition à l'écran
- **Grille tech animée** : Effet de grille technologique sur les images de fonctionnalités
- **Curseur personnalisé** : Curseur custom avec effet de suivi fluide (desktop uniquement)
- **Notifications toast** : Système de notifications élégant pour le feedback utilisateur

### Améliorations UI/UX
- **Navigation avec underline animé** : Les liens de navigation ont un soulignement qui s'anime au survol
- **Cartes de services avec hover effects** : Cartes qui se soulèvent et changent de couleur au survol
- **Témoignages avec guillemets stylisés** : Design moderne des témoignages avec citation visible
- **Motif tech sur CTA final** : Arrière-plan avec motif de grille animé
- **Smooth scroll** : Navigation fluide entre les sections
- **Responsive design** : Adapté à tous les écrans avec animations optimisées mobile

### Personnages Illustrés
- **Opticien SVG** : Personnage avec lunettes représentant un professionnel de l'optique
- **Entreprise SVG** : Illustration de bâtiment pour représenter les magasins
- **Illustrations de fonctionnalités** : Visuels modernes pour chaque section

## 🎯 Fonctionnalités Principales

### Pour les Opticiens
- Recherche de missions adaptées au profil
- Accompagnement complet (portage salarial, assurance RC)
- Paiements sécurisés et facturation simplifiée

### Pour les Entreprises
- Profils pré-validés en 4 étapes
- Réponse rapide en 48h
- Économies jusqu'à 40% vs intérim traditionnel

### Services Annexes
- Assurance RC Pro
- Portage salarial
- Formations continues
- Assistance juridique
- Facturation simplifiée
- Communauté active

## 🛠️ Stack Technique

- **Backend**: Hono (Cloudflare Workers)
- **Frontend**: HTML5 + TailwindCSS + JavaScript ES6
- **Animations**: CSS3 Animations + JavaScript Intersection Observer
- **Fonts**: Inter (corps) + Montserrat (titres)
- **Icons**: Font Awesome 6.4.0
- **Deployment**: Cloudflare Pages

## 📊 Architecture des Données

### API Endpoints
- `GET /api/stats` - Statistiques du marché de l'optique
  ```json
  {
    "market": "8.3 Md€",
    "stores": 13300,
    "opticians": 44000,
    "growth": "+15%"
  }
  ```

### Modèles de Données
- **Profil Opticien**: Diplômes, expériences, disponibilités
- **Profil Entreprise**: Magasins, besoins, critères
- **Mission**: Type, durée, localisation, rémunération
- **Validation**: 4 étapes (diplômes, expérience, test, entretien)

## 🚀 Démarrage Rapide

```bash
# Installation
npm install

# Développement local
npm run build
pm2 start ecosystem.config.cjs

# Test
npm test

# Build pour production
npm run build

# Déploiement
npm run deploy
```

## 📱 Guide Utilisateur

### Pour les Opticiens
1. Créez votre profil en quelques minutes
2. Validez votre profil en 4 étapes
3. Recevez des propositions de missions ou postulez directement
4. Gérez tout depuis votre dashboard

### Pour les Entreprises
1. Inscrivez-vous et décrivez vos besoins
2. Consultez les profils validés
3. Contactez les opticiens ou attendez des candidatures
4. Gérez vos missions et paiements

## 📈 État du Déploiement

- **Platform**: Cloudflare Pages
- **Status**: ✅ Active
- **Environment**: Development (Sandbox)
- **Last Updated**: 2025-01-15

## 🎨 Design System

### Couleurs
- **Orange Principal**: #FF6600 (oblink-orange)
- **Bleu**: #62929E (oblink-blue)
- **Violet**: #9A48D0 (oblink-violet)
- **Rose**: #FF1493 (oblink-pink)
- **Beige**: #EAEBC4 (oblink-beige)
- **Gris**: #303030 (oblink-gray)

### Typographie
- **Titres**: Montserrat (600, 700, 800)
- **Corps**: Inter (300, 400, 500, 600)

## 🔧 Scripts Disponibles

```bash
npm run dev              # Serveur de développement Vite
npm run dev:sandbox      # Serveur sandbox avec wrangler
npm run build            # Build pour production
npm run preview          # Preview du build
npm run deploy           # Déploiement Cloudflare
npm run clean-port       # Nettoyer le port 3000
npm test                 # Tester le serveur local
```

## 📝 Prochaines Étapes Recommandées

1. **Authentification** : Système de login/register pour opticiens et entreprises
2. **Dashboard** : Interface de gestion des profils et missions
3. **Matching Algorithm** : Algorithme de recommandation intelligent
4. **Chat système** : Messagerie entre opticiens et entreprises
5. **Paiement intégré** : Intégration Stripe pour les transactions
6. **Notifications** : Système de notifications push
7. **Analytics** : Tableau de bord avec statistiques détaillées
8. **Mobile App** : Application mobile native (React Native)

## 🎭 Caractéristiques Techniques des Animations

### Performance
- Utilisation de `transform` et `opacity` pour animations GPU-accelerated
- `requestAnimationFrame` pour le parallax fluide
- Intersection Observer pour lazy animations
- Optimisation mobile (désactivation de certains effets)

### Accessibilité
- Respect de `prefers-reduced-motion`
- Contraste des couleurs conforme WCAG AA
- Navigation au clavier fonctionnelle
- Alt text sur toutes les images

## 📄 License

© 2025 OBLINK - Tous droits réservés

## 👥 Contact

- **Email**: contact@oblink.fr
- **Site**: https://oblink.fr
