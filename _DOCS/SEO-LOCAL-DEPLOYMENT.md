# Déploiement Pages SEO Locales - Guide Complet

## 🎯 Ce qui a été créé

### Template Réutilisable
**Fichier** : `/theme/page-ville-seo.php`  
**Type** : Template WordPress dynamique

**Fonctionnalités** :
- Design responsive premium
- Stats locales du marché
- 3 exemples de missions
- Section "Pourquoi OBLINK"
- Breadcrumbs SEO
- CTAs optimisés conversion
- **Personnalisable via Custom Fields**

---

## 📦 Comment déployer une nouvelle ville

### Méthode 1 : Via WordPress Admin (Recommandé)

#### Étape 1 : Créer la page
1. **WordPress Admin** → **Pages** → **Add New**
2. **Titre** : `Opticien Freelance Paris`
3. **Slug** (URL) : `opticien-freelance-paris`
4. **Template** : Sélectionner `Ville SEO Local`
5. **Ne rien écrire dans l'éditeur** (contenu dans le template)

#### Étape 2 : Ajouter les données de la ville (Custom Fields)

Scrollez en bas de la page, trouvez "Custom Fields" et ajoutez :

| Nom du champ | Valeur pour Paris | Description |
|--------------|-------------------|-------------|
| `ville_nom` | Paris | Nom de la ville |
| `ville_code` | 75 | Code département |
| `ville_region` | Île-de-France | Région |
| `ville_nb_magasins` | 450+ | Nombre de magasins |
| `ville_nb_opticiens` | 2 300+ | Nombre d'opticiens |
| `ville_taux_jour_min` | 280 | Taux minimum €/jour |
| `ville_taux_jour_max` | 350 | Taux maximum €/jour |

> **Note** : Si "Custom Fields" n'apparaît pas, cliquez sur les 3 points en haut à droite → Preferences → Cochez "Custom Fields"

#### Étape 3 : Publier
- Cliquez **Publish**
- Testez : `https://59.examlabelecole.fr/opticien-freelance-paris`

---

### Méthode 2 : Valeurs par défaut

Si vous ne voulez pas utiliser Custom Fields, le template utilise des **valeurs par défaut** :
- ville_nom : "Paris"
- ville_code : "75"
- ville_region : "Île-de-France"
- etc.

Créez juste la page avec le bon template, ça fonctionnera !

---

## 🏙️ Villes prioritaires à créer

### Top 5 France

| Ville | Slug | Code | Priorité |
|-------|------|------|----------|
| Paris | `opticien-freelance-paris` | 75 | ⭐⭐⭐⭐⭐ |
| Lyon | `opticien-freelance-lyon` | 69 | ⭐⭐⭐⭐ |
| Marseille | `opticien-freelance-marseille` | 13 | ⭐⭐⭐⭐ |
| Toulouse | `opticien-freelance-toulouse` | 31 | ⭐⭐⭐ |
| Bordeaux | `opticien-freelance-bordeaux` | 33 | ⭐⭐⭐ |

### Données suggérées

**Lyon (69)** :
- ville_nb_magasins : 200+
- ville_nb_opticiens : 1 500+
- ville_taux_jour_min : 260
- ville_taux_jour_max : 320

**Marseille (13)** :
- ville_nb_magasins : 150+
- ville_nb_opticiens : 1 200+
- ville_taux_jour_min : 250
- ville_taux_jour_max : 300

**Toulouse (31)** :
- ville_nb_magasins : 120+
- ville_nb_opticiens : 900+
- ville_taux_jour_min : 240
- ville_taux_jour_max : 290

**Bordeaux (33)** :
- ville_nb_magasins : 100+
- ville_nb_opticiens : 750+
- ville_taux_jour_min : 240
- ville_taux_jour_max : 280

---

## 🔍 SEO déjà intégré

Les pages de ville ont déjà leurs meta tags dans `inc/seo-meta.php` :

✅ **Paris** - Configuré  
✅ **Lyon** - Configuré  
✅ **Marseille** - Configuré  
⏳ Toulouse, Bordeaux - À ajouter si nécessaire

---

## 📊 Impact SEO attendu

| Métrique | Avant | Après (3 mois) | Objectif |
|----------|-------|----------------|----------|
| **Pages indexées** | ~15 | ~20+ | +33% |
| **Trafic organique local** | Faible | Moyen-Fort | +150% |
| **Mots-clés positionnés** | ~50 | ~200+ | x4 |
| **Conversions locales** | Baseline | +40% | Forte augmentation |

**Requêtes ciblées** :
- "opticien freelance paris"
- "mission opticien paris"
- "emploi opticien freelance lyon"
- "remplacer

ment opticien marseille"
- etc.

---

## 🎨 Personnalisation avancée (optionnel)

### Modifier les quartiers affichés

Éditez `/theme/page-ville-seo.php` ligne ~180 :

```php
$quartiers = ['Centre', 'Nord', 'Sud', 'Est', 'Ouest', 'Périphérie'];
```

Changez pour Paris :
```php
$quartiers = ['1er', '2ème', '8ème', '15ème', '16ème', '20ème'];
```

### Ajouter des missions spécifiques

Modifiez les 3 cards de missions (lignes ~90-150) pour refléter des vraies offres si disponibles.

---

## ✅ Checklist de déploiement

### Pour Paris (immédiat)
- [ ] Créer page `opticien-freelance-paris`
- [ ] Assigner template `Ville SEO Local`
- [ ] Ajouter Custom Fields (ou laisser défaut)
- [ ] Publier
- [ ] Tester URL
- [ ] Vérifier meta tags (view source)
- [ ] Soumettre à Google Search Console

### Pour autres villes (progressif)
- [ ] Lyon
- [ ] Marseille
- [ ] Toulouse
- [ ] Bordeaux
- [ ] Nice, Nantes, Strasbourg...

---

## 🔗 Linking interne

**Ajoutez des liens** vers ces pages depuis :
- Page d'accueil (section "Où nous trouver")
- Page `/emploi-opticien` (filtres par ville)
- Footer (menu déroulant "Villes")
- Blog (articles locaux)

**Exemple de menu footer** :
```
Grandes Villes
- Paris
- Lyon
- Marseille
- Toulouse
- Bordeaux
```

---

## 📈 Suivi & Optimisation

### Google Search Console
1. Soumettez chaque URL de ville
2. Suivez impressions/clics par page
3. Optimisez selon requêtes réelles

### Google Analytics
- Créez segment "Trafic Local"
- Trackez conversions par ville
- A/B test CTAs locaux

---

## 🚀 Prochaines étapes

1. **Aujourd'hui** : Créer Paris
2. **Cette semaine** : Lyon + Marseille
3. **Mois prochain** : 5 villes supplémentaires
4. **Trim 2** : 20+ villes couverture nationale

---

**Fichiers impliqués** :
- Template : `/theme/page-ville-seo.php`
- SEO : `/theme/inc/seo-meta.php`
- Documentation : Ce guide

**Créé le** : 2026-01-15  
**Status** : ✅ prêt pour déploiement
