#!/bin/bash

echo "🚀 Démarrage de l'installation OBLINK Frontend..."

# 1. Création du projet avec Vite (React + TypeScript)
# On utilise --template react-ts pour avoir TypeScript directement
echo "📦 Création du projet React/Vite..."
npm create vite@latest frontend -- --template react-ts

cd frontend

# 2. Installation des dépendances de base
echo "📥 Installation des dépendances (npm install)..."
npm install

# 3. Installation de Tailwind CSS
echo "🎨 Installation de Tailwind CSS..."
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p

# 4. Configuration de Tailwind (content paths)
echo "🛠️ Configuration de Tailwind..."
cat > tailwind.config.js <<EOF
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
EOF

# 5. Ajout des directives Tailwind dans index.css
echo "@tailwind base;
@tailwind components;
@tailwind utilities;" > src/index.css

# 6. Création de la structure de dossiers demandée
mkdir -p src/types src/components

echo "✅ Frontend prêt !"
echo "👉 Lancez le serveur frontend avec : cd frontend && npm run dev"
