# Guide d'Ingestion RAG (OBLINK Académie)

Ce guide explique comment peupler le fichier `rag_schema.json` à partir des 138 annales PDF téléchargées, pour alimenter le "Correcteur IA".

## 1. Structure des Données
Le schéma JSON (`academie/rag_schema.json`) est conçu pour capturer non seulement le texte, mais la **logique pédagogique** des examens.

### Champs Clés pour l'IA
- `knowledge_graph` : C'est le cœur du système. Au lieu de copier le PDF, on extrait des concepts atomiques.
- `common_mistakes` : Pour que l'IA puisse dire "Tu as fait l'erreur classique du signe moins" au lieu de juste donner la réponse.
- `official_answer_snippet` : La preuve faisant foi (citation du corrigé officiel).

## 2. Pipeline d'Extraction (Suggéré)

Puisque nous avons les fichiers dans `academie/annales/{year}/{subject}_*.pdf`, voici le prompt système à utiliser avec un modèle multimodal (Gemini 1.5 Pro ou Flash) pour chaque paire (Sujet + Corrigé) :

```text
Tu es un expert en optique lunetterie et en ingénierie pédagogique.
Analyse les deux documents suivants : 
1. Le sujet d'examen (PDF)
2. Le corrigé officiel (PDF)

Ta tâche est d'extraire structurer les connaissances pour notre base de données RAG selon le schéma JSON fourni.

Pour chaque question/sous-partie de l'examen :
1. Identifie le concept clé (Graph Node).
2. Résume la question.
3. Extrait la réponse officielle.
4. Identifie les pièges courants (analyse pédagogique).
5. Assigne une difficulté (1-5).

Sortie attendue : Un objet JSON conforme au schéma pour cette matière.
```

## 3. Utilisation dans le Chatbot (Inférence)

Lorsque l'étudiant pose une question :

1. **Retrieval** : On cherche dans le JSON les `questions` ou `keywords` proches de la requête de l'étudiant.
2. **Context** : On injecte le `official_answer_snippet` et les `common_mistakes` dans le contexte du Chatbot.
3. **Réponse** : Le chatbot répond en utilisant la pédagogie définie, sans halluciner, car il est "grounded" par le JSON.

## 4. Prochaines Étapes Techniques

1. **Script Python** : Itérer sur le dossier `annales/`.
2. **Call API** : Envoyer chaque PDF à Gemini API.
3. **Merge** : Fusionner les sorties JSON dans une base de données vectorielle (ex: Supabase pgvector ou Pinecone).
