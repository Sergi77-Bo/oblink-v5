import axios from 'axios';
import { API_URL } from '../config';

const api = axios.create({
    baseURL: API_URL || 'http://localhost:8000',
    headers: {
        'Content-Type': 'application/json',
    },
});

let logoutHandler: (() => void) | null = null;
export function registerLogoutHandler(handler: () => void) {
    logoutHandler = handler;
}

// Interceptor for Request (Inject Token)
api.interceptors.request.use(
    (config) => {
        const token = localStorage.getItem('access_token');
        if (token) {
            config.headers.Authorization = `Bearer ${token}`;
        }
        return config;
    },
    (error) => {
        return Promise.reject(error);
    }
);

// Interceptor for Response (Handle 401 & Errors)
api.interceptors.response.use(
    (response) => response,
    async (error) => {
        const originalRequest = error.config;

        // If 401 Unauthorized (Token expired or invalid)
        if (error.response?.status === 401 && !originalRequest._retry) {
            originalRequest._retry = true;

            if (logoutHandler) {
                logoutHandler();
            } else {
                localStorage.removeItem('access_token');
                localStorage.removeItem('refresh_token');
                window.location.href = '/login';
            }

            return Promise.reject(error);
        }

        return Promise.reject(error);
    }
);

export default api;
