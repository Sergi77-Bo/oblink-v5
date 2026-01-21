#!/bin/bash

# Script de téléchargement automatique des annales BTS OL (1999-2025)
# Créé pour OBLINK Académie

BASEDIR="/Users/sergiosandoval/Downloads/webapp 5/academie/annales"
mkdir -p "$BASEDIR"

echo "🚀 Téléchargement des annales BTS Opticien Lunetier (1999-2025)"
echo "📁 Dossier de destination: $BASEDIR"
echo ""

# Fonction de téléchargement avec gestion d'erreurs
download_pdf() {
    local url=$1
    local filename=$2
    
    if [ -z "$url" ] || [ "$url" == "" ]; then
        echo "  ⚠️  Pas de lien disponible pour $filename"
        return
    fi
    
    echo "  ⬇️  $filename"
    curl -L -s -o "$filename" "$url"
    
    if [ $? -eq 0 ] && [ -f "$filename" ] && [ -s "$filename" ]; then
        echo "  ✅ OK"
    else
        echo "  ❌ Échec"
        rm -f "$filename"
    fi
}

# Années 2025 à 2021 (Format complet avec les 5 matières)
for year in 2025 2024 2023 2022 2021; do
    echo "📅 Année $year"
    yeardir="$BASEDIR/$year"
    mkdir -p "$yeardir"
    cd "$yeardir" || exit
    
    case $year in
        2025)
            # Analyse de la Vision
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/25olavis_-_sujet.pdf" "analyse_vision_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/corrige_btsol_av_2025_version_finale_0.pdf" "analyse_vision_corrige.pdf"
            
            # Mathématiques
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/sujet_maths_2025.pdf" "maths_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/corrige_mathematiques_2025.pdf" "maths_corrige.pdf"
            
            # Économie/Gestion
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/25oleco_-_sujet_2025.pdf" "gestion_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/corrige_eco_gestion_bts_ol_2025.pdf" "gestion_corrige.pdf"
            
            # Optique Géométrique et Physique
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/optique_geometrique_et_physique_sujet_2025.pdf" "ogp_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/25ologph_-_corrige.pdf" "ogp_corrige.pdf"
            
            # ETSO
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/25olets_-_sujet_2025.pdf" "etso_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/etso_2025_corrige.pdf" "etso_corrige.pdf"
            ;;
            
        2024)
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/24olavis_-_sujet.pdf" "analyse_vision_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/corrige_analyse_vision_2024.pdf" "analyse_vision_corrige.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/24olmat_sujet_metropole.pdf" "maths_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/corrige_maths_2024.pdf" "maths_corrige.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/24oleco_-_sujetgestion.pdf" "gestion_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/corrige_gestion_2024.pdf" "gestion_corrige.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/24ologph_-_sujet.pdf" "ogp_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/corrige_ogp_2024.pdf" "ogp_corrige.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/24olets_-_sujet.pdf" "etso_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/corrige_etso_2024.pdf" "etso_corrige.pdf"
            ;;
            
        2023)
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/analyse_de_la_vision_sujet.pdf" "analyse_vision_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/corrige_analyse_vision_2023.pdf" "analyse_vision_corrige.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/sujet_bts_ol_mathematiques.pdf" "maths_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/corrige_maths_2023.pdf" "maths_corrige.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/sujet_bts_ol_gestion.pdf" "gestion_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/corrige_gestion_2023.pdf" "gestion_corrige.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/sujet_bts_ol_optique_geometrique_et_physique.pdf" "ogp_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/corrige_ogp_2023.pdf" "ogp_corrige.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/sujet_bts_ol_etso.pdf" "etso_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/corrige_etso_2023.pdf" "etso_corrige.pdf"
            ;;
            
        2022)
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts-ol-analyse-vision-2022-sujet.pdf" "analyse_vision_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts-ol-analyse-vision-2022-corrige-v2.pdf" "analyse_vision_corrige.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts-ol-maths-2022-sujet.pdf" "maths_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts-ol-maths-2022-corrige.pdf" "maths_corrige.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts-ol-gestion-2022-sujet.pdf" "gestion_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts-ol-gestion-2022-corrige.pdf" "gestion_corrige.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts-ol-ogp-2022-sujet.pdf" "ogp_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts-ol-ogp-2022-corrige-v2.pdf" "ogp_corrige.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts-ol-etso-2022-sujet.pdf" "etso_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts-ol-etso-2022-corrige-v3.pdf" "etso_corrige.pdf"
            ;;
            
        2021)
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts_ol-analyse_vision-2021-sujet.pdf" "analyse_vision_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts_ol-analyse_vision-2021-corrige.pdf" "analyse_vision_corrige.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts_ol-maths-2021-sujet.pdf" "maths_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts_ol-maths-2021-corrige.pdf" "maths_corrige.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts_ol-gestion-2021-sujet.pdf" "gestion_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts_ol-gestion-2021-corrige.pdf" "gestion_corrige.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts_ol-ogp-2021-sujet.pdf" "ogp_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts_ol-ogp-2021-corrige.pdf" "ogp_corrige.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts_ol-etso-2021-sujet.pdf" "etso_sujet.pdf"
            download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts_ol-etso-2021-corrige-2.pdf" "etso_corrige.pdf"
            ;;
    esac
    
    echo ""
done

# Années 2020 à 1999 (Plus anciennes - seulement Analyse de la Vision disponible en général)
for year in {2020..1999}; do
    echo "📅 Année $year (Archives)"
    yeardir="$BASEDIR/$year"
    mkdir -p "$yeardir"
    cd "$yeardir" || exit
    
    # Analyse de la Vision (matière principale)
    download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts_ol-analyse_vision-$year-sujet.pdf" "analyse_vision_sujet.pdf"
    download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts_ol-analyse_vision-$year-corrige.pdf" "analyse_vision_corrige.pdf"
    
    # Tentative pour autres matières (peuvent ne pas exister)
    download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts_ol-maths-$year-sujet.pdf" "maths_sujet.pdf"
    download_pdf "https://www.acuite.fr/sites/acuite.fr/files/bts_ol-maths-$year-corrige.pdf" "maths_corrige.pdf"
    
    echo ""
done

echo ""
echo "✅ Téléchargement terminé!"
echo "📊 Statistiques:"
find "$BASEDIR" -name "*.pdf" | wc -l | xargs echo "   Total de fichiers PDFs téléchargés:"
du -sh "$BASEDIR" | awk '{print "   Taille totale: " $1}'
echo ""
echo "📁 Les fichiers sont dans: $BASEDIR"
