import requests
import os
import json
import sys

# Configuration (Env vars in prod)
TELEGRAM_TOKEN = os.environ.get("TELEGRAM_TOKEN", "YOUR_BOT_TOKEN_HERE")
TELEGRAM_CHAT_ID = os.environ.get("TELEGRAM_CHAT_ID", "YOUR_CHAT_ID_HERE")
STATS_FILE = os.path.join(os.path.dirname(__file__), 'stats.json')

def get_simulated_user_cost(user_id):
    """
    Simulates fetching AI cost for a specific user.
    In prod, this would be: SELECT SUM(cost) FROM logs WHERE user_id = ...
    """
    # Mocking cost based on stats.json average or random for demo
    try:
        if os.path.exists(STATS_FILE):
            with open(STATS_FILE, 'r') as f:
                stats = json.load(f)
                # Estimate: global avg cost * random factor
                return 0.045 # Simulated approx 0.04€
    except:
        pass
    return 0.05 # Default fallback

def send_sales_alert(user_id, sale_amount, product_name, user_name):
    # 1. Calcul du coût IA cumulé
    ai_cost = get_simulated_user_cost(user_id)
    
    # 2. Calcul du bénéfice net théorique
    # Stripe Fees: 1.5% + 0.25€ (EU standard card) vs User's 3% estimate. Using User's logic.
    stripe_fees = (sale_amount * 0.03) + 0.25
    net_profit = sale_amount - stripe_fees - ai_cost
    
    # Cache Saving Estimation (Simulated)
    cache_saving_pct = 85 
    
    # 3. Construction du message
    emoji = "🎓" if "Pass" in product_name else "💼"
    
    message = (
        f"{emoji} **NOUVELLE VENTE OBLINK !**\n\n"
        f"👤 **Client :** {user_name}\n"
        f"📦 **Produit :** {product_name}\n"
        f"--- \n"
        f"💰 **Chif. Affaires :** {sale_amount:.2f}€\n"
        f"🤖 **Coût IA cumulé :** {ai_cost:.2f}€\n"
        f"📉 **Frais Stripe :** {stripe_fees:.2f}€\n"
        f"💎 **BÉNÉFICE NET : {net_profit:.2f}€**\n\n"
        f"🚀 _Le cache a sauvé {cache_saving_pct}% de la marge sur cette vente !_"
    )

    print(f"Sending Alert to Telegram: {message}")

    # 4. Envoi via Telegram API
    if TELEGRAM_TOKEN == "YOUR_BOT_TOKEN_HERE":
        print("Skipping actual Telegram call (Token not set).")
        return

    url = f"https://api.telegram.org/bot{TELEGRAM_TOKEN}/sendMessage"
    try:
        response = requests.post(url, data={"chat_id": TELEGRAM_CHAT_ID, "text": message, "parse_mode": "Markdown"})
        print(f"Status: {response.status_code}")
    except Exception as e:
        print(f"Error sending alert: {e}")

if __name__ == "__main__":
    # Test Payload
    # python3 sales_alert.py "user_123" 29.00 "Pass Examen" "Jean Dupont"
    u_id = sys.argv[1] if len(sys.argv) > 1 else "u_demo"
    amount = float(sys.argv[2]) if len(sys.argv) > 2 else 29.00
    prod = sys.argv[3] if len(sys.argv) > 3 else "Pass Examen"
    name = sys.argv[4] if len(sys.argv) > 4 else "Jean Dupont"
    
    send_sales_alert(u_id, amount, prod, name)
