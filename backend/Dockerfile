# Use an official Python runtime as a parent image
FROM python:3.11-slim

# Set environment variables
ENV PYTHONDONTWRITEBYTECODE 1
ENV PYTHONUNBUFFERED 1

# Set work directory
WORKDIR /app

# Install system dependencies
# libpq-dev for psycopg2 (Postgres)
# build-essential for compiling python modules
# pango/cairo/gdk-pixbuf for WeasyPrint (PDF generation)
RUN apt-get update && apt-get install -y \
    libpq-dev \
    build-essential \
    libpango-1.0-0 \
    libpangoft2-1.0-0 \
    libcairo2 \
    libpandeocairo-1.0-0 \
    && rm -rf /var/lib/apt/lists/*

# Install Python dependencies
COPY requirements.txt /app/
RUN pip install --upgrade pip && pip install -r requirements.txt

# Copy project
COPY . /app/

# Collect static files
RUN python manage.py collectstatic --noinput

# Run the application using Gunicorn
# Adjust 'config.wsgi' if your project name is different
CMD gunicorn config.wsgi:application --bind 0.0.0.0:$PORT
