#!/bin/bash

WORK_DIR="/Users/sergiosandoval/Downloads/webapp 5"
cd "$WORK_DIR"

# Créer un dossier temporaire avec le nom du thème
mkdir -p oblink_temp
cp -r theme-seo-fixed-extracted/theme/* oblink_temp/

# Créer le zip en naviguant dans le bon répertoire
cd oblink_temp
zip -r -q ../oblink-theme-WORDPRESS-UPLOAD.zip .
cd ..

# Nettoyer
rm -rf oblink_temp

# Afficher les infos
echo "✅ ZIP créé pour WordPress"
ls -lh oblink-theme-WORDPRESS-UPLOAD.zip

# Vérifier le contenu
echo ""
echo "📦 Premier fichiers du ZIP:"
unzip -l oblink-theme-WORDPRESS-UPLOAD.zip | head -15
