# OBLINK Deployment Guide (Render Blueprint)

## 🚀 The Solution: "Blueprint" Deployment

We have switched to a fully automated deployment using a **Render Blueprint (`render.yaml`)**.
This deploys your database, backend, and frontend together and automatically configures them to talk to each other.

### Why this fixes the "Frontend not working" issue?
- **Automatic linking**: The frontend gets the backend URL automatically as `VITE_API_URL`.
- **Rewrite Rules**: The Blueprint includes the necessary rewrite rules so React routing works on refresh.
- **CORS Solved**: The backend gets the frontend URL automatically to allow requests.

---

## 📋 How to Deploy (One-Time Setup)

### 1. Push Code
Make sure your latest code (including `render.yaml`) is pushed to GitHub.

### 2. Create Blueprint on Render
1. Go to your [Render Dashboard](https://dashboard.render.com/blueprints).
2. Click **New +** and select **Blueprint**.
3. Connect your **GitHub Repository** (`oblink-v5`).
4. Give it a name (e.g., `oblink-stack`).
5. Click **Apply**.

Render will now:
1. Create a PostgreSQL Database.
2. Build and deploy the Django Backend.
3. Build and deploy the React Frontend.

### 3. Verify
Once the deployment finishes (green checkmarks):
1. Click on the **Frontend Service** in Render.
2. Click the URL (e.g., `https://oblink-frontend-xyz.onrender.com`).
3. Your app should now be working perfectly!

---

## 🛠️ Troubleshooting

### If Build Fails
- Check the **Logs** tab in Render for the failed service.
- If backend fails, check if `setup_backend.sh` has executable permissions (`chmod +x setup_backend.sh`).

### "Network Error" or Empty Data
- Check the browser console (F12).
- If `VITE_API_URL` is undefined, ensure the frontend service on Render has the environment variable properly linked (should happen automatically with the Blueprint).

