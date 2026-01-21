# Guide Sitemap & Robots.txt - OBLINK

## 📋 Fichiers créés

### 1. generate-sitemap.php
Script générateur de sitemap XML dynamique.

### 2. robots.txt
Configuration optimale pour les crawlers.

---

## 🚀 Déploiement

### Étape 1 : Upload generate-sitemap.php

**Via File Manager ou FTP :**
1. Connectez-vous à votre hébergeur
2. Uploadez `generate-sitemap.php` à la **racine WordPress**
   ```
   /public_html/generate-sitemap.php
   ```

### Étape 2 : Générer sitemap.xml

**Dans votre navigateur :**
```
https://59.examlabelecole.fr/generate-sitemap.php?save=true
```

**Résultat :**
- Fichier `sitemap.xml` créé automatiquement
- Contient toutes vos pages + posts
- Priorités optimisées par type de page

### Étape 3 : Upload robots.txt

**Via File Manager ou FTP :**
1. Uploadez `robots.txt` à la **racine WordPress**
   ```
   /public_html/robots.txt
   ```

### Étape 4 : Vérifier

**Testez les URLs :**
- `https://59.examlabelecole.fr/sitemap.xml` → Doit afficher le XML
- `https://59.examlabelecole.fr/robots.txt` → Doit afficher les règles

---

## 🔍 Soumettre à Google

### Google Search Console

1. **Connectez-vous** : https://search.google.com/search-console
2. **Add Property** : `https://59.examlabelecole.fr`
3. **Verify ownership** (plusieurs méthodes disponibles)
4. **Sitemaps** → **Add Sitemap**
5. **Entrez** : `sitemap.xml`
6. **Submit**

### Vérifier l'indexation

**Après 24-48h :**
- Google Search Console → Coverage
- Voir pages découvertes vs indexées
- Corriger les erreurs éventuelles

---

## 📊 Structure du Sitemap

### Priorités configurées

| Type de page | Priority | Change Freq |
|--------------|----------|-------------|
| Homepage | 1.0 | daily |
| Pour Opticiens/Entreprises | 0.9 | monthly |
| Emploi Opticien | 0.9 | daily |
| Blog | 0.9 | daily |
| Pages villes (Paris, Lyon...) | 0.8 | weekly |
| Pages standard | 0.8 | monthly |
| Articles blog | 0.7 | monthly |

---

## 🤖 Robots.txt - Détails

### Ce qui est bloqué

```
/wp-admin/           # Admin WordPress
/wp-includes/        # Core WordPress
/wp-content/plugins/ # Plugins
/wp-content/themes/  # Thèmes
/*?s=                # Résultats recherche
```

### Ce qui est autorisé

```
/                    # Tout le site public
/wp-content/uploads/ # Images et médias
/wp-admin/admin-ajax.php # AJAX WordPress
```

---

## 🔄 Mise à jour automatique (Optionnel)

### Cron WordPress

Ajoutez dans `functions.php` :

```php
// Auto-regenerate sitemap daily
add_action('wp', function() {
    if (!wp_next_scheduled('oblink_generate_sitemap')) {
        wp_schedule_event(time(), 'daily', 'oblink_generate_sitemap');
    }
});

add_action('oblink_generate_sitemap', function() {
    $url = home_url('/generate-sitemap.php?save=true');
    wp_remote_get($url);
});
```

### Cron système (Avancé)

```bash
# Dans crontab
0 2 * * * curl https://59.examlabelecole.fr/generate-sitemap.php?save=true
```

---

## ✅ Checklist Déploiement

- [ ] Upload `generate-sitemap.php` à la racine
- [ ] Visiter `/generate-sitemap.php?save=true`
- [ ] Vérifier que `sitemap.xml` existe
- [ ] Upload `robots.txt` à la racine
- [ ] Tester `/sitemap.xml` et `/robots.txt`
- [ ] Soumettre sitemap à Google Search Console
- [ ] Vérifier ownership Google Search Console
- [ ] Attendre 24-48h pour indexation
- [ ] Monitorer Coverage dans GSC

---

## 🐛 Troubleshooting

### Sitemap vide ?

**Solution :**
- Vérifiez que des pages sont publiées
- Vérifiez permissions fichiers (755)
- Vérifiez `wp-load.php` accessible

### Robots.txt ignoré ?

**Solution :**
- Désactiver robots.txt WordPress (Settings → Reading)
- Vérifier .htaccess ne bloque pas robots.txt
- Tester avec : https://www.google.com/webmasters/tools/robots-testing-tool

### Sitemap non mis à jour ?

**Solution :**
- Relancer `/generate-sitemap.php?save=true`
- Vider cache WordPress
- Revalider dans Google Search Console

---

## 📈 Métriques à Suivre

### Google Search Console (hebdomadaire)

- **Pages indexées** : Augmentation continue
- **Coverage errors** : < 5%
- **Valid pages** : > 95%
- **Sitemap status** : "Success"

### Objectifs 90 jours

- ✅ 100% pages indexées
- ✅ 0 erreurs critiques
- ✅ Sitemap soumis et validé
- ✅ Robots.txt optimisé

---

**Créé le** : 2026-01-15  
**Status** : ✅ Prêt pour déploiement  
**Prochaine action** : Upload fichiers + soumission GSC
