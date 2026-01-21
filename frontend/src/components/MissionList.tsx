import { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import type { Mission } from '../types';

export default function MissionList() {
    const [missions, setMissions] = useState<Mission[]>([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState('');

    useEffect(() => {
        fetch('http://127.0.0.1:8000/api/missions/')
            .then((res) => {
                if (!res.ok) throw new Error('Erreur réseau');
                return res.json();
            })
            .then((data) => {
                setMissions(data);
                setLoading(false);
            })
            .catch((err) => {
                console.error(err);
                setError("Impossible de contacter le serveur. Vérifiez qu'il tourne bien sur le port 8000.");
                setLoading(false);
            });
    }, []);

    if (loading) return <div className="p-10 text-center text-gray-500">Chargement des missions...</div>;
    if (error) return <div className="p-10 text-red-500">Erreur: {error}</div>;

    if (missions.length === 0) {
        return <div className="p-10 text-center text-gray-500">Aucune mission disponible pour le moment.</div>;
    }

    return (
        <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            {missions.map((mission) => (
                <div key={mission.id} className="border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition bg-white flex flex-col justify-between">

                    <div>
                        <div className="flex justify-between items-start mb-4">
                            <div>
                                <h3 className="font-bold text-lg text-gray-900 leading-tight">{mission.title}</h3>
                                <p className="text-sm text-gray-500 font-medium">{mission.company?.company_name || 'Entreprise confidentielle'}</p>
                            </div>
                            <span className="bg-blue-50 text-blue-700 text-xs font-semibold px-2.5 py-0.5 rounded-full border border-blue-200">
                                {mission.job_type}
                            </span>
                        </div>

                        <p className="text-gray-600 text-sm mb-4 line-clamp-3">
                            {mission.description}
                        </p>

                        <div className="flex flex-wrap gap-2 mb-4">
                            {mission.software_required?.map((soft) => (
                                <span key={soft} className="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded font-medium">
                                    {soft}
                                </span>
                            ))}
                        </div>
                    </div>

                    <div className="flex justify-between items-center border-t border-gray-100 pt-4 mt-2">
                        <div className="flex items-center text-sm text-gray-500">
                            <span>📍 {mission.city}</span>
                        </div>
                        <Link to={`/missions/${mission.id}`} className="bg-brand-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-brand-primary transition-colors">
                            Voir l'offre
                        </Link>
                    </div>
                </div>
            ))}
        </div>
    );
}
