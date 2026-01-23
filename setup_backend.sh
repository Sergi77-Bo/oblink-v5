#!/bin/bash

# Exit immediately if a command exits with a non-zero status
set -e

echo "🚀 Starting OBLINK Backend Build..."

# 1. Install Dependencies
echo "📦 Installing requirements..."
pip install -r backend/requirements.txt

# 2. Collect Static Files
echo "🗂️ Collecting static files..."
python backend/manage.py collectstatic --noinput

echo "✅ Build script completed successfully."

