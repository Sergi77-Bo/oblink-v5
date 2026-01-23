import { useState, useEffect } from 'react';
import api from '../services/api';
import type { Mission } from '../types';

export function useMission(id: string | undefined) {
    const [mission, setMission] = useState<Mission | null>(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState<string | null>(null);

    useEffect(() => {
        if (!id) return;

        const fetchMission = async () => {
            try {
                setLoading(true);
                const response = await api.get(`/api/missions/${id}/`);
                setMission(response.data);
            } catch (err: any) {
                console.error(err);
                setError("Mission introuvable");
            } finally {
                setLoading(false);
            }
        };

        fetchMission();
    }, [id]);

    return { mission, loading, error };
}
