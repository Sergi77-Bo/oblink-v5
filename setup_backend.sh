#!/bin/bash

# Exit immediately if a command exits with a non-zero status
set -e

echo "🚀 Starting OBLINK Backend Build..."

# 1. Install Dependencies
echo "📦 Installing requirements..."
pip install -r backend/requirements.txt

# 2. Collect Static Files
echo "🗂️ Collecting static files..."
cd backend
python manage.py collectstatic --noinput
cd ..

echo "✅ Build script completed successfully."

