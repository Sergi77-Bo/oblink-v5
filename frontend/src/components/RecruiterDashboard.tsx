import { useState, useEffect } from 'react';
import { API_URL } from '../config';


interface Applicant {
    id: number;
    candidate: {
        email: string;
        yearsExperience: number;
        softwareSkills: string[];
        isFreelance: boolean;
    };
    status: string;
}

interface MyMission {
    id: number;
    title: string;
    city: string;
    jobType: string;
}

export default function RecruiterDashboard() {
    const [missions, setMissions] = useState<MyMission[]>([]);
    const [loading, setLoading] = useState(true);

    // États pour gérer l'ouverture d'une offre et voir les candidats
    const [selectedMissionId, setSelectedMissionId] = useState<number | null>(null);
    const [applicants, setApplicants] = useState<Applicant[]>([]);
    const [loadingApplicants, setLoadingApplicants] = useState(false);

    // 1. Charger les missions du recruteur
    useEffect(() => {
        const token = localStorage.getItem('access_token');
        if (!token) {
            setLoading(false);
            return;
        }

        fetch(`${API_URL}/api/missions/mine/`, {
            headers: { 'Authorization': `Bearer ${token}` }
        })
            .then(res => res.json())
            .then(data => {
                if (Array.isArray(data)) {
                    setMissions(data);
                } else {
                    setMissions([]);
                }
            })
            .catch(err => console.error(err))
            .finally(() => setLoading(false));
    }, []);

    // 2. Charger les candidats quand on clique sur une mission
    const fetchApplicants = (missionId: number) => {
        if (selectedMissionId === missionId) {
            setSelectedMissionId(null); // Fermer si déjà ouvert
            return;
        }

        setSelectedMissionId(missionId);
        setLoadingApplicants(true);
        const token = localStorage.getItem('access_token');

        // Pour l'instant on récupère toutes les applications et on filtre (MVP)
        // Dans le futur : endpoint dédié /api/missions/{id}/applications/
        fetch(`${API_URL}/api/applications/`, {
            headers: { 'Authorization': `Bearer ${token}` }
        })
            .then(res => res.json())
            .then(data => {
                if (Array.isArray(data)) {
                    // Filtre : on ne garde que ceux de la mission sélectionnée
                    const missionApplicants = data.filter((app: any) => app.mission === missionId);
                    setApplicants(missionApplicants);
                }
            })
            .finally(() => setLoadingApplicants(false));
    };

    if (loading) return <div className="p-10 text-center animate-pulse">Chargement de votre espace...</div>;

    return (
        <div className="container mx-auto px-4 py-8 max-w-5xl">
            <div className="flex justify-between items-center mb-8 animate-fade-in-up">
                <div>
                    <h1 className="text-3xl font-extrabold text-brand-dark font-primary">Espace Recruteur</h1>
                    <p className="text-gray-500">Gérez vos offres et consultez les candidatures.</p>
                </div>
                <button className="bg-brand-dark text-white px-5 py-3 rounded-xl font-bold hover:bg-black transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    + Nouvelle Offre
                </button>
            </div>

            <div className="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden animate-fade-in-up" style={{ animationDelay: '100ms' }}>
                {missions.length === 0 ? (
                    <div className="p-16 text-center text-gray-500">
                        <div className="text-4xl mb-4">📭</div>
                        <h3 className="text-lg font-bold mb-2">Aucune offre publiée</h3>
                        <p>Commencez par créer votre première mission pour recevoir des candidats.</p>
                    </div>
                ) : (
                    missions.map((mission) => (
                        <div key={mission.id} className="border-b last:border-0 border-gray-100">
                            {/* Ligne de l'offre */}
                            <div
                                onClick={() => fetchApplicants(mission.id)}
                                className={`p-6 flex justify-between items-center cursor-pointer transition-colors ${selectedMissionId === mission.id ? 'bg-blue-50/50' : 'hover:bg-gray-50'}`}
                            >
                                <div>
                                    <h3 className="font-bold text-lg text-brand-dark">{mission.title}</h3>
                                        <p className="text-sm text-gray-500 font-medium flex items-center gap-2">
                                            <span className="bg-gray-100 px-2 py-0.5 rounded text-xs text-gray-600 uppercase tracking-wide">{mission.jobType}</span>
                                            <span>{mission.city}</span>
                                        </p>
                                </div>
                                <div className="flex items-center gap-3">
                                    <span className={`text-sm font-bold px-3 py-1 rounded-full transition-colors ${selectedMissionId === mission.id ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-600 group-hover:bg-blue-50 group-hover:text-blue-600'}`}>
                                        {selectedMissionId === mission.id ? 'Masquer candidats ▲' : 'Voir candidats ▼'}
                                    </span>
                                </div>
                            </div>

                            {/* Zone Candidats (Dépliée) */}
                            {selectedMissionId === mission.id && (
                                <div className="bg-blue-50/30 p-6 border-t border-blue-100/50 shadow-inner animate-fade-in">

                                    {loadingApplicants ? (
                                        <div className="flex justify-center p-4"><div className="animate-spin rounded-full h-8 w-8 border-b-2 border-brand-primary"></div></div>
                                    ) : applicants.length === 0 ? (
                                        <div className="text-center py-6 text-gray-500 bg-white rounded-xl border border-dashed border-gray-300">
                                            <p className="font-medium">Aucun candidat pour le moment 😢</p>
                                            <p className="text-xs mt-1">Revenez plus tard !</p>
                                        </div>
                                    ) : (
                                        <div className="grid gap-4">
                                            <h4 className="font-bold text-gray-700 text-sm uppercase tracking-wider mb-2 flex items-center gap-2">
                                                <span className="bg-brand-primary text-white w-5 h-5 rounded-full flex items-center justify-center text-xs">{applicants.length}</span>
                                                Candidatures reçues
                                            </h4>
                                            {applicants.map(app => (
                                                <div key={app.id} className="bg-white p-5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                                    <div className="flex items-center gap-4">
                                                        <div className="w-12 h-12 rounded-full bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center text-white font-bold text-lg">
                                                            {app.candidate.email[0].toUpperCase()}
                                                        </div>
                                                        <div>
                                                            <p className="font-bold text-brand-dark text-lg">{app.candidate.email}</p>
                                                            <div className="flex flex-wrap gap-2 text-xs mt-1">
                                                                <span className="px-2 py-0.5 bg-gray-100 text-gray-600 rounded font-medium">{app.candidate.yearsExperience} ans exp.</span>
                                                                {app.candidate.isFreelance && <span className="px-2 py-0.5 bg-green-100 text-green-700 rounded font-medium">Freelance</span>}
                                                                <span className="text-gray-400">|</span>
                                                                <span className="text-gray-500">{app.candidate.softwareSkills?.join(', ')}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div className="flex gap-3 w-full md:w-auto">
                                                        <button className="flex-1 md:flex-none px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-bold shadow transition-transform hover:scale-105">
                                                            Accepter
                                                        </button>
                                                        <button className="flex-1 md:flex-none px-4 py-2 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 rounded-lg text-sm font-bold transition-colors">
                                                            Refuser
                                                        </button>
                                                    </div>
                                                </div>
                                            ))}
                                        </div>
                                    )}
                                </div>
                            )}
                        </div>
                    ))
                )}
            </div>
        </div>
    );
}
