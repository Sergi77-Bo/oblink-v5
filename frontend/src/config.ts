const getApiUrl = () => {
    const envUrl = import.meta.env.VITE_API_URL;
    if (!envUrl) {
        throw new Error('VITE_API_URL must be defined');
    }
    return envUrl.startsWith('http') ? envUrl : `https://${envUrl}`;
};
export const API_URL = getApiUrl();
