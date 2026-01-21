# Guide de Tests SEO - OBLINK

## 🧪 Tests à Effectuer

Une fois le thème déployé sur WordPress, validez que tout fonctionne correctement.

---

## 1. Google Rich Results Test

### URL
https://search.google.com/test/rich-results

### Pages à Tester

| Page | Schema Attendu | Résultat |
|------|----------------|----------|
| Homepage | Organization + Breadcrumb | ✅ |
| /emploi-opticien | Organization + JobPosting + Breadcrumb | ✅ |
| /comment-ca-marche | Organization + FAQPage + Breadcrumb | ✅ |
| /pour-opticiens | Organization + FAQPage + Breadcrumb | ✅ |
| /opticien-freelance-paris | Organization + Breadcrumb | ✅ |
| /blog/[article] | Organization + Breadcrumb (3 niveaux) | ✅ |

### Comment tester

1. Copiez l'URL de votre page
2. Collez dans l'outil Google
3. Cliquez "Test URL"
4. Vérifiez "Valid items detected"
5. Cliquez sur chaque schema pour voir détails

### Erreurs communes

**"Missing field"** → Ajouter le champ manquant dans seo-meta.php  
**"Invalid URL"** → Vérifier canonical URLs  
**"No structured data"** → Vérifier que JSON-LD s'affiche dans source

---

## 2. Facebook Open Graph Debugger

### URL
https://developers.facebook.com/tools/debug/

### Test

1. Entrez votre URL (ex: homepage)
2. Cliquez "Debug"
3. Vérifiez :
   - ✅ Image s'affiche (1200x630px)
   - ✅ Titre correct
   - ✅ Description présente
   - ✅ Type = "website"
   - ✅ Pas de warnings

### Si l'image ne s'affiche pas

1. Vérifiez que `/wp-content/uploads/oblink-og-image.jpg` existe
2. Image doit être accessible publiquement (pas de protection)
3. Cliquez "Scrape Again" pour forcer le refresh
4. Attendez 5-10 minutes (cache Facebook)

---

## 3. Twitter Card Validator

### URL
https://cards-dev.twitter.com/validator

### Test

1. Entrez votre URL
2. Cliquez "Preview card"
3. Vérifiez :
   - ✅ Card type = "summary_large_image"
   - ✅ Image s'affiche (1200x600px)
   - ✅ Titre + description corrects

**Note:** Twitter utilise OG fallback si twitter: tags manquent (notre cas est OK).

---

## 4. Test Meta Tags (Source Code)

### Méthode

Sur chaque page :
1. Clic droit → "Afficher le code source" (ou Ctrl+U / Cmd+Option+U)
2. Cherchez dans le code (Ctrl+F / Cmd+F)

### Checklist par page

**Homepage :**
```html
✅ <title>OBLINK - Un opticien en un clin d'œil</title>
✅ <meta name="description" content="OBLINK connecte opticiens freelances...">
✅ <link rel="canonical" href="https://59.examlabelecole.fr/">
✅ <meta property="og:title" content="OBLINK - Plateforme opticiens freelances">
✅ <meta property="og:image" content=".../oblink-og-image.jpg">
✅ <script type="application/ld+json"> avec Organization schema
```

**Page Paris :**
```html
✅ <title>Opticien Freelance Paris | Missions & Emplois Optique 75 | OBLINK</title>
✅ <meta name="description" content="Opticien freelance à Paris...">
✅ Breadcrumb schema présent
```

**Page Comment ça marche :**
```html
✅ FAQPage schema avec 3 questions
✅ Breadcrumb schema
```

---

## 5. Sitemap.xml Validation

### Tests Manuels

**1. Accessibilité**
```
https://59.examlabelecole.fr/sitemap.xml
```
→ Doit afficher du XML, pas une erreur 404

**2. Format XML valide**
- Copier le contenu
- Coller sur : https://www.xmlvalidation.com/
- Vérifier "Valid XML"

**3. URLs valides**
- Toutes les URLs doivent être absolues (https://...)
- Pas d'URLs en double
- Pages importantes présentes (homepage, blog, villes...)

### Google Search Console

1. Search Console → Sitemaps
2. Add new sitemap : `sitemap.xml`
3. Submit
4. Attendre 24-48h
5. Vérifier status = "Success"
6. Vérifier "Discovered URLs" > 0

---

## 6. Robots.txt Validation

### Test Manuel

```
https://59.examlabelecole.fr/robots.txt
```

**Contenu attendu :**
```
User-agent: *
Allow: /
Disallow: /wp-admin/
...
Sitemap: https://59.examlabelecole.fr/sitemap.xml
```

### Google Robots Testing Tool

1. Aller sur : https://www.google.com/webmasters/tools/robots-testing-tool
2. Entrer votre domain
3. Vérifier :
   - ✅ `/` → Allowed
   - ✅ `/pour-opticiens` → Allowed
   - ❌ `/wp-admin/` → Blocked
   - ✅ `/wp-content/uploads/image.jpg` → Allowed

---

## 7. Performance & Mobile

### PageSpeed Insights

**URL:** https://pagespeed.web.dev/

**Test Homepage :**
- Desktop : Viser > 90
- Mobile : Viser > 80

**Métriques clés :**
- LCP (Largest Contentful Paint) < 2.5s
- FID (First Input Delay) < 100ms
- CLS (Cumulative Layout Shift) < 0.1

### Mobile-Friendly Test

**URL:** https://search.google.com/test/mobile-friendly

Résultat attendu : "Page is mobile-friendly" ✅

---

## 8. Breadcrumbs Visuels (Optionnel)

**Actuellement** : Breadcrumbs schema uniquement (invisible pour utilisateurs)

**Recommandation future** : Ajouter breadcrumbs visuels en haut des pages

**Exemple HTML :**
```html
<nav aria-label="breadcrumb">
  <a href="/">Accueil</a> → 
  <a href="/blog">Blog</a> → 
  <span>Article Title</span>
</nav>
```

---

## 9. Checklist Complète

### Meta Tags
- [ ] Titles uniques sur toutes les pages
- [ ] Descriptions 120-160 caractères
- [ ] Canonical URLs corrects
- [ ] Pas de duplicate content

### Open Graph
- [ ] Images OG accessibles (test Facebook)
- [ ] og:title, og:description présents
- [ ] og:type correct (website/article)
- [ ] og:url = canonical

### Twitter Cards
- [ ] twitter:card = summary_large_image
- [ ] Image Twitter accessible
- [ ] Preview OK sur Twitter validator

### JSON-LD
- [ ] Organization schema valide
- [ ] JobPosting schema (emploi page)
- [ ] FAQPage schema (2 pages)
- [ ] Breadcrumb schema (toutes sauf home)
- [ ] Pas d'erreurs Google Rich Results

### Sitemap & Robots
- [ ] sitemap.xml accessible
- [ ] Toutes pages importantes listées
- [ ] robots.txt bloque /wp-admin/
- [ ] Sitemap soumis Google Search Console

---

## 10. Suivi Post-Déploiement

### Semaine 1
- [ ] Vérifier indexation Google (site:59.examlabelecole.fr)
- [ ] Monitorer Google Search Console → Coverage
- [ ] Tester partages sociaux (Facebook, LinkedIn, Twitter)

### Semaine 2-4
- [ ] Analyser impressions Google Search Console
- [ ] Vérifier CTR par page
- [ ] Identifier pages avec issues SEO
- [ ] Optimiser meta descriptions si CTR faible

### Mois 2-3
- [ ] Mesurer croissance trafic organique
- [ ] Analyser mots-clés positionnés
- [ ] A/B test meta descriptions
- [ ] Ajouter pages villes supplémentaires

---

## 📊 Outils Recommandés

### SEO
- **Google Search Console** - Essentiel
- **Google Analytics 4** - Trafic et conversions
- **Ubersuggest** - Recherche mots-clés
- **Ahrefs / SEMrush** - Audit complet (payant)

### Tests
- **Screaming Frog** - Crawler SEO
- **SEO Meta in 1 Click** (extension Chrome)
- **Lighthouse** - Audit technique

### Monitoring
- **Google Alerts** - Mentions de marque
- **Google My Business** - SEO local
- **Hotjar** - Comportement utilisateurs

---

## 🎯 Résultats Attendus

### Après 1 mois
- ✅ 100% pages indexées
- ✅ Rich snippets visibles Google
- ✅ Partages sociaux optimisés
- ⬆️ +50% impressions Search Console

### Après 3 mois
- ⬆️ +150% trafic organique
- 🎯 Top 10 mots-clés cibles
- 🌟 Rich snippets FAQ affichés
- 💼 Premiers leads SEO

---

**Créé le** : 2026-01-15  
**Objectif** : Valider SEO Phase 1-3  
**Prochaine étape** : Tests après déploiement
