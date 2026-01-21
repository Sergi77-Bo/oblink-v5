import os
import json
import glob
import time
# Note: This script requires 'google-generativeai' package
# pip install google-generativeai

# Placeholder for API Key - User will need to set this environment variable
# os.environ["GEMINI_API_KEY"] = "YOUR_API_KEY"

import google.generativeai as genai

# Configuration
ANNALES_DIR = "/Users/sergiosandoval/Downloads/webapp 5/academie/annales"
OUTPUT_FILE = "/Users/sergiosandoval/Downloads/webapp 5/academie/rag_database.json"

def setup_gemini():
    """Configures the Gemini API."""
    api_key = os.environ.get("GEMINI_API_KEY")
    if not api_key:
        print("⚠️ Erreur: La variable d'environnement GEMINI_API_KEY n'est pas définie.")
        print("   Veuillez l'exporter dans votre terminal : export GEMINI_API_KEY='votre_clé'")
        return None
    genai.configure(api_key=api_key)
    return genai.GenerativeModel('gemini-2.0-flash')

def get_extraction_prompt(subject, year):
    """Returns the prompt for the specific subject, adapted for 2024 reform."""
    
    reform_context = ""
    if year >= 2024:
        reform_context = """
        IMPORTANT : Ce sujet date de 2024 ou après (Nouveau Référentiel).
        - Mets l'accent sur le raisonnement MÉDICAL et SANITAIRE.
        - Identifie spécifiquement les questions liées aux OBJETS CONNECTÉS ou à la E-SANTÉ.
        - Le vocabulaire commercial est moins prioritaire que l'analyse paramédicale.
        """

    return f"""
    Tu es un expert pédagogique du BTS Opticien Lunetier.
    Analyse ce document d'examen (Sujet + Corrigé si disponible) pour le module: {subject}.
    Année de l'épreuve : {year}.

    {reform_context}
    
    Tâche: Extraire les concepts clés pour une base de données RAG (Retrieval Augmented Generation).
    Nous voulons que l'IA puisse répondre aux questions des étudiants en se basant sur ce document.

    Format de sortie (JSON uniquement) :
    {{
        "year": {year},
        "curriculum_version": "{"2024-reform" if year >= 2024 else "legacy"}",
        "subject": "{subject}",
        "concepts": [
            {{
                "topic": "Titre du concept (ex: Prisme)",
                "sub_topic": "Sous-titre (ex: Relation de Prentice)",
                "question_snippet": "La question posée dans l'examen",
                "official_answer_snippet": "La réponse officielle ou une synthèse précise",
                "difficulty": 3,
                "common_mistakes": ["Erreur classique 1", "Erreur classique 2"]
            }}
        ]
    }}
    """

def process_file(model, file_path):
    """Sends a PDF file (and its correction if found) to Gemini for extraction."""
    print(f"📄 Traitement de : {os.path.basename(file_path)}...")
    
    # Try to extract year from filename
    filename = os.path.basename(file_path)
    import re
    match = re.search(r'20[0-9]{2}', filename)
    year = int(match.group(0)) if match else 2023 

    # Look for correction
    correction_path = file_path.replace("sujet", "corrige")
    files_to_send = []

    try:
        # 1. Upload Subject
        print(f"   📤 Upload du Sujet...")
        subject_file = genai.upload_file(path=file_path, display_name="Sujet Exam")
        while subject_file.state.name == "PROCESSING":
            time.sleep(1)
            subject_file = genai.get_file(subject_file.name)
        files_to_send.append(subject_file)

        # 2. Upload Correction (if exists)
        if os.path.exists(correction_path):
            print(f"   outils Upload du Corrigé ({os.path.basename(correction_path)})...")
            corrige_file = genai.upload_file(path=correction_path, display_name="Corrigé Officiel")
            while corrige_file.state.name == "PROCESSING":
                time.sleep(1)
                corrige_file = genai.get_file(corrige_file.name)
            files_to_send.append(corrige_file)
        else:
            print("   ⚠️ Pas de corrigé trouvé, l'IA devra déduire les réponses.")

        # Generate content
        subject = "Analyse de la Vision" 
        if "math" in file_path: subject = "Mathématiques"
        elif "eco" in file_path or "gestion" in file_path: subject = "Gestion"
        elif "ogp" in file_path: subject = "Optique Géométrique"
        elif "etso" in file_path: subject = "Etude Technique"
        
        # Prepare Prompt with Reform Context
        prompt = get_extraction_prompt(subject, year)
        
        # Call Gemini (Prompt + Files)
        print("   🧠 Analyse par Gemini 1.5 Flash (cela peut prendre 10-20s)...")
        response = model.generate_content([prompt] + files_to_send)
        
        # Simple extraction of JSON code block
        text = response.text
        if "```json" in text:
            json_str = text.split("```json")[1].split("```")[0]
            return json.loads(json_str)
        else:
            print("   ⚠️ Pas de JSON détecté dans la réponse.")
            return None

    except Exception as e:
        print(f"   ❌ Erreur: {e}")
        return None

def main():
    print("🚀 Démarrage de l'extraction RAG pour OBLINK Académie")
    model = setup_gemini()
    
    if not model:
        return

    # Find PDFs (Limit to 1 for demonstration/test)
    pdfs = glob.glob(f"{ANNALES_DIR}/**/*.pdf", recursive=True)
    
    # Filter for a specific subject/year for testing (e.g., 2024 Analyse Vision)
    target_pdf = next((f for f in pdfs if "2024" in f and "vision" in f and "sujet" in f), None)
    
    if not target_pdf:
        print("⚠️ Aucun fichier test (2024 + vision) trouvé.")
        print(f"   Dossier scanné: {ANNALES_DIR}")
        return

    print(f"🔎 Fichier test trouvé : {target_pdf}")
    
    data = process_file(model, target_pdf)
    
    if data:
        with open(OUTPUT_FILE, 'w') as f:
            json.dump(data, f, indent=2, ensure_ascii=False)
        print(f"\n✅ Extraction réussie ! Données sauvegardées dans : {OUTPUT_FILE}")
        print("\n--- Aperçu des données ---")
        print(json.dumps(data, indent=2, ensure_ascii=False)[:500] + "...\n")
    else:
        print("\n❌ Aucun résultat généré.")

if __name__ == "__main__":
    main()
