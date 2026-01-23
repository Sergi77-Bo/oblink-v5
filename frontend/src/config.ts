const getApiUrl = () => {
    const envUrl = import.meta.env.VITE_API_URL;
    if (!envUrl) return 'http://localhost:8000';
    return envUrl.startsWith('http') ? envUrl : `https://${envUrl}`;
};
export const API_URL = getApiUrl();
