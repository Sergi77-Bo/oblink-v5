import google.generativeai as genai
import json
import os
import sys
import random
import uuid
import datetime

# Configure API Key
API_KEY = os.environ.get("GOOGLE_API_KEY")
if not API_KEY:
    pass 

genai.configure(api_key=API_KEY)

CACHE_FILE = os.path.join(os.path.dirname(__file__), 'questions_cache.json')
STATS_FILE = os.path.join(os.path.dirname(__file__), 'stats.json')

def load_file(filename):
    path = os.path.join(os.path.dirname(__file__), filename)
    try:
        with open(path, 'r', encoding='utf-8') as f:
            return f.read()
    except:
        return ""

def load_json(filepath):
    if os.path.exists(filepath):
        try:
            with open(filepath, 'r', encoding='utf-8') as f:
                return json.load(f)
        except:
            return {}
    return {}

def save_json(filepath, data):
    with open(filepath, 'w', encoding='utf-8') as f:
        json.dump(data, f, indent=4, ensure_ascii=False)

def increment_stats(metric):
    stats = load_json(STATS_FILE)
    today = str(datetime.date.today())
    
    if today not in stats:
        stats[today] = {"api_calls": 0, "cache_hits": 0, "total_generated": 0}
        
    stats[today][metric] = stats[today].get(metric, 0) + 1
    
    # Global counters for simplified Dashboard V1
    if "global" not in stats:
        stats["global"] = {"api_calls": 0, "cache_hits": 0}
    stats["global"][metric] = stats["global"].get(metric, 0) + 1
    
    save_json(STATS_FILE, stats)

def generate_exercise(topic="Général", difficulty="Normal"):
    """
    Generates a new exercise. 
    STRATEGY: Cache First (Speed & Cost Optimization).
    """
    
    # 1. Cache Lookup (The "Community Database")
    cache = load_json(CACHE_FILE)
    
    # Filter cache by Topic AND Difficulty
    potential_questions = []
    if topic in cache:
        potential_questions = [q for q in cache[topic] if q.get('difficulty') == difficulty]
    
    # Simulate "User History Check"
    if potential_questions:
        increment_stats("cache_hits") # KPI Track
        return json.dumps(random.choice(potential_questions), ensure_ascii=False)

    # 2. Load Context (Only if cache miss)
    # ... (Rest of logic) ...
    
    # 3. Build Advanced Prompt
    # ... (Prompt construction) ...
    
    # 4. Generate with Gemini
    # ...
    increment_stats("api_calls") # KPI Track
    # ...
    knowledge_base = load_file('knowledge_base.md')
    rag_data = json.loads(load_file('rag_database.json') or "{}")
    
    # 3. Build Advanced Prompt
    prompt = f"""
    RÔLE : Tu es le Concepteur Principal des examens du BTS Opticien-Lunetier, expert de la Réforme 2026.
    Ta mission est de générer un exercice de niveau EXPERT, inédit et stimulant.

    SUJET : {topic}
    DIFFICULTÉ : {difficulty} (Adapter la complexité des calculs/pièges)

    CONTEXTE & DOCUMENTS :
    Utilise les concepts de cette base de connaissances :
    {knowledge_base[:500]}...

    STRUCTURE DE L'EXERCICE À GÉNÉRER :
    1. Scénario Patient : Crée un profil complet (Nom, âge, activité, plainte visuelle, antécédents).
    2. Données Techniques : Génère des valeurs numériques réalistes (Sphère, Cylindre, Axe, Prisme) mais NOUVELLES.
    3. Problématique : Introduis une contrainte (Ex: Erreur de montage, demande esthétique, conflit tiers-payant).

    CONSIGNES DE RIGUEUR :
    - Calculs : Vérifie tes calculs optiques 3 fois.
    - Distracteurs : Les 3 mauvaises réponses doivent être des erreurs classiques d'étudiants (signes, conversions).
    - Ton : Professionnel et clinique.
    
    FORMAT DE SORTIE (JSON PUR) :
    {{
        "question": "Énoncé complet avec scénario patient...",
        "options": ["Choix A", "Choix B", "Choix C", "Choix D"],
        "correct_answer": "Choix A",
        "explanation": "Raisonnement détaillé (Mode Socratique : explique le cheminement).",
        "difficulty": "{difficulty}",
        "topic": "{topic}"
    }}
    """

    model = genai.GenerativeModel('gemini-2.0-flash')

    try:
        response = model.generate_content(prompt)
        text = response.text.replace('```json', '').replace('```', '').strip()
        
        # Validate JSON before saving
        qa_obj = json.loads(text)
        
        # Explicitly set metadata if missing from AI response
        qa_obj['difficulty'] = difficulty
        qa_obj['topic'] = topic
        
        # Initialize Quality Metrics (Feedback Loop)
        qa_obj['rating_sum'] = 0
        qa_obj['rating_count'] = 0
        qa_obj['report_count'] = 0
        qa_obj['status'] = 'active'
        
        # Save to Community Cache
        save_to_cache(qa_obj, topic)
        
        return json.dumps(qa_obj, ensure_ascii=False)

    except Exception as e:
        return json.dumps({"error": str(e)})

if __name__ == "__main__":
    # python3 generate_exercises.py "Optique Géométrique" "Expert"
    topic = sys.argv[1] if len(sys.argv) > 1 else "Optique Géométrique"
    diff = sys.argv[2] if len(sys.argv) > 2 else "Expert"
    
    print(generate_exercise(topic, diff))
