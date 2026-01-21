import json
import os
import datetime

CACHE_FILE = os.path.join(os.path.dirname(__file__), 'questions_cache.json')
QUARANTINE_FILE = os.path.join(os.path.dirname(__file__), 'questions_quarantine.json')

def load_json(filepath):
    if os.path.exists(filepath):
        try:
            with open(filepath, 'r', encoding='utf-8') as f:
                return json.load(f)
        except:
            return {} if filepath == CACHE_FILE else []
    return {} if filepath == CACHE_FILE else []

def save_json(filepath, data):
    with open(filepath, 'w', encoding='utf-8') as f:
        json.dump(data, f, indent=4, ensure_ascii=False)

def run_quality_control():
    """
    Scans the cache for 'toxic' questions and moves them to quarantine.
    Criteria:
    - Rating < 2.5 (and at least 5 votes)
    - Reports >= 3
    """
    print("--- Démarrage du Contrôle Qualité OBLINK ---")
    
    cache = load_json(CACHE_FILE)
    quarantine = load_json(QUARANTINE_FILE)
    
    questions_removed = 0
    total_questions = 0
    
    # We need to iterate and modify, so we'll build a new cache dict
    new_cache = {}
    
    for topic, questions in cache.items():
        new_questions_list = []
        for q in questions:
            total_questions += 1
            
            # Calculate Average Rating
            avg_rating = 5.0
            if q.get('rating_count', 0) > 0:
                avg_rating = q.get('rating_sum', 0) / q.get('rating_count')
            
            report_count = q.get('report_count', 0)
            usage_count = q.get('rating_count', 0) # Using rating count as proxy for usage for now
            
            # Check Criteria
            is_toxic = False
            reason = ""
            
            if avg_rating < 2.5 and usage_count >= 5:
                is_toxic = True
                reason = f"Note insuffisante ({avg_rating:.1f}/5)"
            elif report_count >= 3:
                is_toxic = True
                reason = f"Trop de signalements ({report_count})"
            
            if is_toxic:
                print(f"⚠️ [QUARANTINE] ID {q.get('id')} - Topic: {topic} - Raison: {reason}")
                
                # Archive in Quarantine
                q['quarantined_at'] = str(datetime.datetime.now())
                q['quarantine_reason'] = reason
                quarantine.append(q)
                questions_removed += 1
            else:
                # Keep in Active Cache
                new_questions_list.append(q)
        
        if new_questions_list:
            new_cache[topic] = new_questions_list
            
    # Save Updates
    save_json(CACHE_FILE, new_cache)
    save_json(QUARANTINE_FILE, quarantine)
    
    print(f"--- Fin du nettoyage ---")
    print(f"Total analysé : {total_questions}")
    print(f"Questions mises en quarantaine : {questions_removed}")
    print(f"Questions actives restantes : {total_questions - questions_removed}")

def simulate_feedback(question_id, rating=None, report=False):
    """
    Helper to simulate user feedback for testing purposes.
    """
    cache = load_json(CACHE_FILE)
    found = False
    for topic in cache:
        for q in cache[topic]:
            if q.get('id') == question_id:
                if rating is not None:
                    q['rating_sum'] = q.get('rating_sum', 0) + rating
                    q['rating_count'] = q.get('rating_count', 0) + 1
                if report:
                    q['report_count'] = q.get('report_count', 0) + 1
                found = True
                print(f"Feedback enregistré pour {question_id}")
    
    if found:
        save_json(CACHE_FILE, cache)
    else:
        print("Question non trouvée.")

if __name__ == "__main__":
    # Example Usage
    run_quality_control()
