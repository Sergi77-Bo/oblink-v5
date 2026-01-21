import os
# import openai # Décommente quand tu as la clé

class OpticienAI:
    @staticmethod
    def get_response(user_message, context="GÉNÉRAL"):
        """
        Simule un prof d'optique.
        Si pas de clé API, renvoie une réponse statique pour la démo.
        """
        api_key = os.getenv("OPENAI_API_KEY")
        
        # --- MODE DÉMO (SANS API KEY) ---
        if not api_key:
            return f"[DEMO] Je suis le Professeur Virtuel. J'ai bien reçu ta question sur : \"{user_message}\".\n\n(Configure la clé API OpenAI dans le fichier .env pour activer mon intelligence réelle 🧠)."

        # --- MODE RÉEL (AVEC OPENAI) ---
        # client = openai.OpenAI(api_key=api_key)
        # response = client.chat.completions.create(
        #     model="gpt-3.5-turbo",
        #     messages=[
        #         {"role": "system", "content": "Tu es un professeur expert en BTS Opticien Lunetier. Tu réponds de manière pédagogique, précise, et tu cites les formules d'optique géométrique si nécessaire."},
        #         {"role": "user", "content": user_message}
        #     ]
        # )
        # return response.choices[0].message.content
        
        return "Erreur config IA"
