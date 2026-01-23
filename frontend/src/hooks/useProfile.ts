import { useState, useEffect } from 'react';
import { API_URL } from '../config';

// On définit la structure des données qu'on envoie
interface ProfileData {
    id?: number;
    yearsExperience: number;
    softwareSkills: string[]; // Modifié pour matcher le backend (JSONField -> liste de strings)
    isFreelance: boolean;
    hasEquipment: boolean;
    mobilityRadiusKm: number;
}

export function useProfile() {
    const [profile, setProfile] = useState<ProfileData | null>(null);
    const [loading, setLoading] = useState(true);

    // Charger le profil existant (si l'utilisateur revient)
    useEffect(() => {
        const token = localStorage.getItem('access_token'); // On utilise 'access_token' standard
        if (!token) {
            setLoading(false);
            return;
        }

        fetch(`${API_URL}/api/candidats/me/`, {
            headers: { 'Authorization': `Bearer ${token}` }
        })
            .then(res => {
                if (res.ok) return res.json();
                throw new Error('Pas de profil ou erreur auth');
            })
            .then(data => setProfile(data))
            .catch((err) => {
                console.log("Info: Pas de profil chargé", err);
                setProfile(null);
            })
            .finally(() => setLoading(false));
    }, []);

    // Fonction pour sauvegarder
    const updateProfile = async (data: ProfileData) => {
        const token = localStorage.getItem('access_token');
        if (!token) throw new Error("Vous devez être connecté");

        const method = profile ? 'PATCH' : 'POST'; // Si profil existe update, sinon create
        const url = profile && profile.id
            ? `${API_URL}/api/candidats/${profile.id}/`
            : `${API_URL}/api/candidats/`;

        const res = await fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify(data)
        });

        if (!res.ok) {
            const errorData = await res.json();
            throw new Error(JSON.stringify(errorData));
        }

        const updated = await res.json();
        setProfile(updated);
        return updated;
    };

    return { profile, loading, updateProfile };
}
