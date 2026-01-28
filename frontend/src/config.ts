const getApiUrl = () => {
    // Use environment variable if available, otherwise fallback to production URL
    const envUrl = import.meta.env.VITE_API_URL || 'https://oblink-backend-production.up.railway.app';
    return envUrl.startsWith('http') ? envUrl : `https://${envUrl}`;
};

export const API_URL = getApiUrl();

