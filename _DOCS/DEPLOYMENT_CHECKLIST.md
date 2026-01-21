CHECKLIST DÉPLOIEMENT - OBLINK THEME BUGS FIXED
================================================

📋 PRÉ-DÉPLOIEMENT
==================

ÉTAPE 1: Validation Locale
[ ] Extraire oblink-theme-BUGS-FIXED-20260119.zip
[ ] Copier dans WordPress /wp-content/themes/oblink/
[ ] Activer le thème via admin
[ ] Tester page d'accueil (pas d'erreurs PHP)
[ ] Vérifier console navigateur (pas d'erreurs JS)
[ ] Tester inscription opticien
[ ] Tester formulaire contact
[ ] Vérifier dashboard admin

ÉTAPE 2: Tests Sécurité
[ ] Vérifier que credentials Supabase ne sont pas en dur
  - Checker functions.php: define('SUPABASE_KEY')
[ ] Tester SQL injection sur messages
  - Envoyer message avec caractères spéciaux: ' OR 1=1--
  - Vérifier qu'il ne passe pas
[ ] Tester XSS sur messages
  - Envoyer message avec <script>alert('xss')</script>
  - Vérifier qu'il s'affiche en text, pas exécuté
[ ] Vérifier usernames uniques
  - Créer 2 comptes même nom/prénom
  - Vérifier que usernames sont différents

ÉTAPE 3: Tests Fonctionnels
[ ] Page admin dashboard: vérifier statistiques affichent
[ ] Page comparatif verres: vérifier calculs corrects
[ ] Recherche opticiens: vérifier pas de null errors
[ ] Formation ERP: vérifier chargement
[ ] Blog: vérifier filtres catégories
[ ] Connexion: tester login/logout

ÉTAPE 4: Tests Performance
[ ] Charger homepage: < 3 secondes
[ ] Charger admin dashboard: < 2 secondes
[ ] Tester navigation (pas de lag)
[ ] Vérifier pas d'erreurs console

ÉTAPE 5: Tests Compatibilité
[ ] Desktop Chrome ✓
[ ] Desktop Firefox ✓
[ ] Desktop Safari ✓
[ ] Mobile iOS Safari ✓
[ ] Mobile Android Chrome ✓

📦 ÉTAPE 6: Build Production
================================================

[ ] Minifier CSS si nécessaire
[ ] Minifier JavaScript si nécessaire
[ ] Optimiser images
[ ] Vérifier robots.txt
[ ] Vérifier sitemap.xml
[ ] Vérifier .htaccess (si Apache)

🚀 DÉPLOIEMENT STAGING
======================

[ ] Uploader theme sur serveur staging
[ ] Déployer base de données (si changements)
[ ] Exécuter migrations (dbDelta si nécessaire)
[ ] Vérifier env variables SUPABASE_URL, SUPABASE_KEY
[ ] Vérifier permissions fichiers (chmod 755, 644)
[ ] Vérifier uploads directory writable
[ ] Redémarrer PHP-FPM / Apache

Validation Staging:
[ ] Tester toutes les fonctionnalités
[ ] Vérifier logs d'erreur (error.log)
[ ] Tester emails d'enregistrement
[ ] Tester paiement/transactions
[ ] Load test avec Apache Bench

ab -n 100 -c 10 https://staging.oblink.fr/

✅ DÉPLOIEMENT PRODUCTION
==========================

Avant le go-live:
[ ] Backup base de données complet
[ ] Backup thème actuel
[ ] Backup fichiers media
[ ] Informer l'équipe support
[ ] Préparer plan de rollback

Déploiement:
[ ] Git pull / Upload fichiers
[ ] Lancer migrations si nécessaire
[ ] Clear WordPress cache
[ ] Verifier health status
[ ] Vérifier erreurs logs après 5 min
[ ] Vérifier 404 pages
[ ] Vérifier robots crawlability

Tests Post-Deploy:
[ ] Tester 10 pages aléatoires
[ ] Vérifier Google Search Console
[ ] Tester formulaire inscription
[ ] Tester système messaging
[ ] Vérifier notifications emails
[ ] Tester admin dashboard

📊 MONITORING 24h
=================

[ ] Vérifier error logs toutes les heures
[ ] Vérifier bounce rates
[ ] Vérifier conversion rates
[ ] Vérifier user complaints
[ ] Vérifier server CPU/Memory

🔍 ROLLBACK (Si problèmes)
===========================

Proc rapide (< 15 min):
1. git revert / restore previous theme
2. wp cli theme activate [theme-parent]
3. Flush cache
4. Test homepage
5. Alerter équipe

⚠️  BUGS CONNUS APRÈS DÉPLOIEMENT
==================================

Les 40 bugs restants seront traités ultérieurement:

CRITIQUES (6):
- dbDelta en boucle (optimiser)
- Navigation null checks JS (fix JS)
- CORS error handling (fix fetch)
- 3 autres...

MAJEURS (24):
- Validation inputs
- Division par zéro
- NaN checks
- etc...

MINEURS (12):
- CSS compatibility
- Console logs
- Accessibility
- etc...

Timeline correction: 2-3 semaines

📧 DOCUMENTATION
================

Créer/Update:
[ ] README.md avec instructions
[ ] CHANGELOG.md avec version
[ ] INSTALLATION.md pour futurs devs
[ ] BUG_TRACKING.md pour issues
[ ] API documentation si applicable

✨ POST-DÉPLOIEMENT (1 semaine après)
======================================

[ ] Tester encore fonctionnalités clés
[ ] Vérifier pas de degradation performance
[ ] Vérifier feedback utilisateurs
[ ] Optimiser si needed
[ ] Update documentation

🎯 SIGN-OFF
===========

Déploiement approuvé par:
- [ ] Dev Lead
- [ ] QA Lead
- [ ] Security Officer
- [ ] Product Manager

Date déploiement: _______________
Version: ________________________
Hash git: _______________________

Notes additionnelles:
_________________________________
_________________________________

Status: [ ] READY [ ] HOLD [ ] CANCELLED

---
Généré: 19/01/2026
Responsable: Infrastructure Team
