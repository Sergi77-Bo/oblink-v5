import { useState, useEffect } from 'react';
import api from '../services/api';
import type { Mission } from '../types';

export function useMissions() {
    const [missions, setMissions] = useState<Mission[]>([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState('');

    useEffect(() => {
        const fetchMissions = async () => {
            try {
                // api.get automatically injects token & handles base URL
                const response = await api.get('/api/missions/');
                setMissions(response.data);
            } catch (err) {
                console.error(err);
                setError("Impossible de contacter le serveur. Vérifiez qu'il tourne bien sur le port 8000.");
            } finally {
                setLoading(false);
            }
        };

        fetchMissions();
    }, []);

    return { missions, loading, error };
}
