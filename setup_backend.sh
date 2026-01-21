#!/bin/bash

echo "🚀 Démarrage de l'installation OBLINK Backend (FORCE RESET)..."

# 0. NETTOYAGE (Pour éviter les erreurs "syntax [])
echo "🧹 Nettoyage des anciennes migrations et de la base de données..."
rm -f backend/db.sqlite3
rm -rf backend/core/migrations
mkdir -p backend/core/migrations
touch backend/core/migrations/__init__.py

# 1. Vérifier si pip est installé
if ! command -v pip &> /dev/null; then
    echo "⚠️ Pip introuvable, tentative avec pip3..."
    PIP_CMD="pip3"
else
    PIP_CMD="pip"
fi

# 2. Installer les dépendances
echo "📦 Installation des librairies..."
$PIP_CMD install -r backend/requirements.txt || { echo "❌ Échec de l'installation des dépendances"; exit 1; }

# 3. Migrations
echo "🗄️ Création de la base de données..."
python3 backend/manage.py makemigrations core
python3 backend/manage.py migrate

# 4. Création Admin automatique
echo "👤 Création de l'admin (admin / admin)..."
python3 backend/create_admin.py

echo "✅ TOUT EST PRÊT (Pour de bon cette fois) !"
echo "👉 Lancez le serveur avec : python3 backend/manage.py runserver"
