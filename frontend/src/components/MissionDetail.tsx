import { useState } from 'react';
import { useParams, Link, useNavigate } from 'react-router-dom';
import { useMission } from '../hooks/useMission';
import api from '../services/api';

export default function MissionDetail() {
    const { id } = useParams();
    const navigate = useNavigate();

    // Use the Hook!
    const { mission, loading, error } = useMission(id);

    const [applying, setApplying] = useState(false);
    const [hasApplied, setHasApplied] = useState(false);

    const handleApply = async () => {
        const token = localStorage.getItem('access_token');

        if (!token) {
            alert("Connectez-vous pour postuler !");
            navigate('/login');
            return;
        }

        setApplying(true);

        try {
            // Use api.post (Automatic Headers & CamelCase response)
            await api.post('/api/applications/', { mission: mission?.id });

            setHasApplied(true);
            alert("Candidature envoyée avec succès ! ✅");

        } catch (error: any) {
            if (error.response?.status === 409) {
                alert("Vous avez déjà postulé à cette offre !");
                setHasApplied(true);
            } else {
                console.error("Erreur Application:", error);
                alert("Erreur Technique lors de la candidature.");
            }
        } finally {
            setApplying(false);
        }
    };

    if (loading) return <div className="p-10 text-center animate-pulse">Chargement de la mission...</div>;
    if (error || !mission) return <div className="p-10 text-center text-red-500">Erreur : {error}</div>;

    return (
        <div className="max-w-4xl mx-auto">
            <div className="mb-6">
                <Link to="/missions" className="text-brand-secondary hover:text-brand-primary font-medium transition-colors">← Retour aux missions</Link>
            </div>

            <div className="bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-100 animate-fade-in-up">
                <div className="p-8 md:p-10">
                    <div className="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                        <div>
                            <span className="inline-block px-3 py-1 bg-brand-light text-brand-primary text-xs font-bold uppercase tracking-wide rounded-full mb-3">
                                {mission.jobType}
                            </span>
                            <h1 className="text-3xl md:text-4xl font-extrabold font-primary text-brand-dark mb-2">{mission.title}</h1>
                            <div className="flex items-center text-gray-500 font-medium">
                                {mission.city} • {mission.company?.companyName || "Entreprise"}
                            </div>
                        </div>
                        <div className="text-right hidden md:block">
                            <div className="text-2xl font-bold text-brand-primary">{mission.dailyRate}€ <span className="text-sm text-gray-400 font-normal">/jour</span></div>
                        </div>
                    </div>

                    <hr className="border-gray-100 my-8" />

                    <div className="prose max-w-none text-gray-600 mb-10">
                        <h3 className="text-xl font-bold text-brand-dark mb-4 font-primary">Description du poste</h3>
                        <p className="whitespace-pre-line">{mission.description}</p>

                        <h3 className="text-xl font-bold text-brand-dark mt-8 mb-4 font-primary">Logiciels requis</h3>
                        <div className="flex gap-2 flex-wrap">
                            {mission.softwareRequired?.map((soft, i) => (
                                <span key={i} className="px-3 py-1 bg-gray-100 text-gray-600 rounded-md text-sm font-medium">
                                    {soft}
                                </span>
                            ))}
                        </div>
                    </div>

                    <button
                        onClick={handleApply}
                        disabled={applying || hasApplied}
                        className={`w-full py-4 rounded-xl shadow-lg transition-all transform duration-200 font-bold text-lg ${hasApplied
                            ? "bg-green-600 text-white cursor-default shadow-none"
                            : "bg-brand-primary hover:bg-orange-600 text-white hover:-translate-y-1 hover:shadow-orange-500/30"
                            } disabled:opacity-70 disabled:cursor-not-allowed`}
                    >
                        {applying ? "Envoi en cours..." : hasApplied ? "Candidature Envoyée ✅" : "Postuler maintenant"}
                    </button>
                </div>
            </div>
        </div>
    );
}
