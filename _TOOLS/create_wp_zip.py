#!/usr/bin/env python3
import shutil
import os
import zipfile
from pathlib import Path

# Chemin du répertoire de travail
work_dir = Path.home() / "Downloads" / "webapp 5"
theme_src = work_dir / "theme-seo-fixed-extracted" / "theme"
output_zip = work_dir / "oblink-theme-WORDPRESS-UPLOAD.zip"

print(f"Source: {theme_src}")
print(f"Output: {output_zip}")

# Vérifier que la source existe
if not theme_src.exists():
    print(f"❌ Erreur: {theme_src} n'existe pas")
    exit(1)

# Créer le zip
print("📦 Création du ZIP...")
shutil.make_archive(
    str(output_zip.with_suffix('')),  # Sans l'extension .zip
    'zip',
    theme_src.parent,
    theme_src.name
)

# Vérifier le résultat
if output_zip.exists():
    size_mb = output_zip.stat().st_size / (1024*1024)
    print(f"✅ ZIP créé: {output_zip.name} ({size_mb:.1f} MB)")
    
    # Afficher le contenu
    print("\n📋 Contenu (premiers fichiers):")
    with zipfile.ZipFile(output_zip, 'r') as zf:
        for info in list(zf.filelist)[:10]:
            print(f"  - {info.filename}")
else:
    print("❌ Erreur lors de la création du ZIP")
    exit(1)
