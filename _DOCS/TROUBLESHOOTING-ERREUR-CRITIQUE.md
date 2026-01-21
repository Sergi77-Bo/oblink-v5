# 🔧 GUIDE DE DÉPANNAGE - Erreur Critique OBLINK

## ❌ Problème: "Il y a eu une erreur critique sur ce site"

### ✅ Solutions Rapides (essayez dans cet ordre)

---

## **Solution 1: Vérifier le fichier debug.log**

1. Connectez-vous en FTP/SFTP au serveur
2. Allez dans `/wp-content/debug.log`
3. Regardez les dernières lignes pour voir l'erreur exacte

### Erreurs courantes et solutions:

#### ❌ `Call to undefined function get_template_directory()`
- **Cause**: Le fichier est chargé avant WordPress
- **Solution**: Vérifier que `functions.php` est bien dans `/wp-content/themes/oblink/`

#### ❌ `Fatal error: Uncaught Error: Call to undefined function wp_get_current_user()`
- **Cause**: WordPress n'est pas entièrement chargé
- **Solution**: Idem - vérifier le chemin du thème

#### ❌ `Parse error: syntax error, unexpected end of file`
- **Cause**: Balise PHP non fermée ou syntaxe invalide
- **Solution**: Les corrections ont été appliquées (suppression des `?>` à la fin)

---

## **Solution 2: Réinstaller le thème**

1. **Connectez-vous à WordPress**
2. **Allez à Apparence → Thèmes**
3. **Activez un autre thème temporairement** (ex: WordPress par défaut)
4. **Supprimez le thème OBLINK** (en bas de sa page)
5. **Réinstaller**: Ajouter un thème → Téléverser → `oblink-theme-WORDPRESS-UPLOAD.zip`
6. **Attendre la fin de l'installation**
7. **Activer le thème OBLINK**

---

## **Solution 3: Configuration wp-config.php**

Ouvrez `/wp-config.php` et assurez-vous que ces lignes existent:

```php
// Ajouter AVANT "/* That's all, stop editing! */"

define('SUPABASE_KEY', 'votre_clé_ici');
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

---

## **Solution 4: Vérifier les permissions**

Via FTP, assurez-vous que:
- Dossiers: permissions **755**
- Fichiers: permissions **644**

Commande SSH:
```bash
chmod -R 755 /wp-content/themes/oblink/
chmod -R 644 /wp-content/themes/oblink/*
find /wp-content/themes/oblink/ -type f -exec chmod 644 {} \;
find /wp-content/themes/oblink/ -type d -exec chmod 755 {} \;
```

---

## **Solution 5: Vérifier la structure du ZIP**

Le ZIP doit avoir cette structure:
```
oblink-theme-WORDPRESS-UPLOAD.zip
└── oblink/                    ← Important!
    ├── style.css              ← REQUIS
    ├── functions.php
    ├── index.php
    ├── inc/
    └── ...autres fichiers
```

✅ Le nouveau ZIP a cette structure correcte!

---

## **Solution 6: Activer le debug mode**

Ajoutez ceci à `wp-config.php`:

```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

Puis vérifiez `/wp-content/debug.log` pour voir l'erreur exacte.

---

## **Contactez le support avec:**

Si rien ne marche, préparez ces infos:

1. **Le contenu de `/wp-content/debug.log`** (dernières 20 lignes)
2. **Version de WordPress**: Tableau de bord → En bas à droite
3. **Version de PHP**: Vérifier auprès de votre hébergeur
4. **Plugins actifs**: Apparence → Plugins (pour vérifier les conflits)
5. **Theme activé avant**: Quel thème utilisiez-vous avant?

---

## **Retour de Secours**

Si vous ne pouvez pas accéder à l'admin:

1. Connectez-vous en FTP
2. Allez dans `/wp-content/themes/`
3. Renommez le dossier `oblink` en `oblink-broken`
4. Activez un autre thème (ex: via la base de données)
5. Puis réessayez l'installation

---

## 📦 Fichiers à Vérifier

- ✅ `/wp-content/themes/oblink/style.css` - DOIT exister
- ✅ `/wp-content/themes/oblink/functions.php` - DOIT exister
- ✅ `/wp-content/themes/oblink/index.php` - DOIT exister
- ✅ `/wp-content/debug.log` - Vérifier pour les erreurs

---

**Version du thème**: OBLINK v60 (Corrections Bug-Fix du 19 Jan 2026)
**Dernière mise à jour**: ZIP créé avec style.css à la racine ✅
