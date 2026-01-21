import google.generativeai as genai
import os
import sys

# Configure API Key (Ensure this is set in your environment or passed securely)
# Using the same setup as extract_data.py
API_KEY = os.environ.get("GOOGLE_API_KEY")
if not API_KEY:
    # Fallback for local testing if env var not set (User should set this)
    # Raising error to prompt user configuration
    # print("Error: GOOGLE_API_KEY not found.")
    # sys.exit(1)
    pass # Let the user/system handle auth if configured globally or via other means

genai.configure(api_key=API_KEY)

def load_knowledge_base():
    """Loads the markdown knowledge base."""
    kb_path = os.path.join(os.path.dirname(__file__), 'knowledge_base.md')
    try:
        with open(kb_path, 'r', encoding='utf-8') as f:
            return f.read()
    except FileNotFoundError:
        return "Erreur critique : Base de connaissances introuvable."

def get_support_response(user_query, user_role="guest"):
    """
    Generates a response using Gemini and the Knowledge Base.
    """
    knowledge_base = load_knowledge_base()
    
    system_instruction = f"""
    Tu es "Oblink Assist", l'expert en Customer Success de la plateforme OBLINK.
    
    TON RÔLE :
    - Réassurer les Gérants : Expliquer le sérieux des certifications.
    - Aider les Freelances/Étudiants : Résoudre les problèmes, expliquer les offres.
    - Vendre : Convertir les curieux en acheteurs.

    CONTEXTE UTILISATEUR :
    - Rôle : {user_role}

    BASE DE CONNAISSANCES (Vérité Absolue) :
    {knowledge_base}

    RÈGLES STRICTES :
    1. Ton de voix : Professionnel, expert, direct.
    2. Si un gérant doute d'une certification, explique les 4 étapes de validation (Diplômes, Expérience, Test Tech, Entretien Vidéo).
    3. Ne JAMAIS donner les réponses aux quiz.
    4. Refuse de répondre aux questions hors-sujet (cuisine, météo, etc.) en disant "Je suis spécialisé uniquement sur OBLINK et l'optique."
    5. Si tu ne trouves pas la réponse dans la base, dis : "Je préfère vérifier ce point précis. Voulez-vous que je notifie l'équipe support ?"
    
    IMPORTANT : À la fin de chaque réponse, ajoute une ligne vide puis cette mention exacte :
    "Ceci est un assistant IA. Pour toute question contractuelle, veuillez vous référer à nos CGV."
    """

    model = genai.GenerativeModel('gemini-2.0-flash')

    try:
        response = model.generate_content(
            contents=[
                {"role": "user", "parts": [system_instruction + "\n\nQUESTION UTILISATEUR : " + user_query]}
            ]
        )
        return response.text
    except Exception as e:
        return f"Erreur de service IA : {str(e)}"

if __name__ == "__main__":
    # Simple CLI extraction for testing
    if len(sys.argv) > 1:
        query = " ".join(sys.argv[1:])
        print(get_support_response(query))
    else:
        print("Usage: python3 support_agent.py 'Votre question ici'")
