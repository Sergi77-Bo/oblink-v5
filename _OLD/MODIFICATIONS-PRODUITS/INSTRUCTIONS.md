# Modifications Page Produits - OBLINK
## Instructions pour VSCode

Ouvrez le fichier `page-produits.php` dans votre thème WordPress et faites les rechercher/remplacer suivants :

---

## 1. HEADER - Titre de la page (ligne ~14)

**CHERCHER :**
```html
Nos <span class="text-oblink-blue">Services</span> & <span class="text-oblink-orange">Tarifs</span>
```

**REMPLACER PAR :**
```html
Nos <span class="text-oblink-blue">Offres</span> OBLINK
```

---

## 2. FILTRES - Boutons de catégorie (lignes ~37-52)

### Filtre "Tous les services"
**CHERCHER :** `Tous les services`
**REMPLACER PAR :** `Toutes nos offres`

### Filtre B2B
**CHERCHER :** `B2B - Magasins`
**REMPLACER PAR :** `Recruteurs (B2B)`

### Filtre B2C  
**CHERCHER :** `B2C - Formation`
**REMPLACER PAR :** `Etudiants & Pros (B2C)`

### Filtre Partenaires
**CHERCHER :** `>Partenaires<`
**REMPLACER PAR :** `>Services Partenaires<`

---

## 3. LABELS DES CARTES (dans les balises span)

### Carte Premium (ligne ~72)
**CHERCHER :** `>B2B - Magasins</span>`
**REMPLACER PAR :** `>Abonnement Recruteur</span>`

### Carte Corporate (ligne ~110)
**CHERCHER :** `>B2B - Corporate</span>`
**REMPLACER PAR :** `>Grandes Enseignes</span>`

### Carte Pass BTS (ligne ~144)
**CHERCHER :** `>B2C - Formation</span>`
**REMPLACER PAR :** `>Preparation Examen</span>`

### Carte VAE (ligne ~175)
**CHERCHER :** `>B2C - VAE</span>`
**REMPLACER PAR :** `>Validation des Acquis</span>`

### Carte Certification (ligne ~206)
**CHERCHER :** `>B2C - Certification</span>`
**REMPLACER PAR :** `>Certification Pro</span>`

### Carte Partenaires (ligne ~239)
**CHERCHER :** `>Partenaires</span>`
**REMPLACER PAR :** `>Outils Freelance</span>`

---

## 4. DESCRIPTION PARTENAIRES (ligne ~241)

**CHERCHER :**
```html
Compte Pro, Assurance RC, Compta, Creation Societe
```

**REMPLACER PAR :**
```html
Compte Pro (Qonto), Assurance RC (Hiscox), Comptabilite, Creation Societe
```

---

## IMPORTANT - Eviter les accents !

J'ai retire les accents (é, è, ê, etc.) pour eviter les problemes d'encodage PHP.
Si vous voulez les accents, assurez-vous que votre fichier est bien en UTF-8.

---

## Raccourci VSCode

1. Ouvrez page-produits.php
2. Ctrl+H (ou Cmd+H sur Mac) pour Rechercher/Remplacer
3. Copiez-collez chaque paire chercher/remplacer
4. Cliquez "Remplacer" pour chaque modification
5. Sauvegardez (Ctrl+S)
6. Re-zippez le theme et uploadez
