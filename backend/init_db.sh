#!/bin/bash
# Script pour initialiser la base de données en production Railway

echo "🔄 Application des migrations Django..."
python manage.py migrate

echo "✅ Migrations appliquées!"
echo ""
echo "🚀 Création des missions de test..."
python manage.py create_test_missions

echo ""
echo "✅ Base de données initialisée avec succès!"
