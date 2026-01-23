import { useState, useEffect } from 'react';
import api from '../services/api';

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

    // Charger le profil
    useEffect(() => {
        const fetchProfile = async () => {
            try {
                // api.get handles token injection automatically
                const { data } = await api.get('/api/candidats/me/');
                setProfile(data);
            } catch (err) {
                console.log("Info: Pas de profil chargé (ou erreur)", err);
                setProfile(null);
            } finally {
                setLoading(false);
            }
        };
        fetchProfile();
    }, []);

    // Sauvegarder
    const updateProfile = async (data: ProfileData) => {
        // Determine method/url
        const isUpdate = profile && profile.id;
        const url = isUpdate ? `/api/candidats/${profile.id}/` : '/api/candidats/';

        let res;
        if (isUpdate) {
            res = await api.patch(url, data);
        } else {
            res = await api.post(url, data);
        }

        setProfile(res.data);
        return res.data;
    };

    return { profile, loading, updateProfile };
}
