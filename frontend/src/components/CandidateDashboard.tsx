import { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';

interface Application {
    id: number;
    mission: {
        title: string;
        city: string;
        company: {
            company_name: string;
        };
    };
    status: 'PENDING' | 'ACCEPTED' | 'REJECTED';
}

export default function CandidateDashboard() {
    const [applications, setApplications] = useState<Application[]>([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        const token = localStorage.getItem('access_token');
        fetch('http://localhost:8000/api/applications/', {
            headers: { 'Authorization': `Bearer ${token}` }
        })
            .then(res => res.json())
            .then(data => {
                if (Array.isArray(data)) {
                    setApplications(data);
                }
            })
            .catch(err => console.error(err))
            .finally(() => setLoading(false));
    }, []);

    const getStatusBadge = (status: string) => {
        switch (status) {
            case 'ACCEPTED': return <span className="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold border border-green-200 shadow-sm">Acceptée 🎉</span>;
            case 'REJECTED': return <span className="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-bold border border-red-200">Refusée</span>;
            default: return <span className="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-bold border border-yellow-200">En attente ⏳</span>;
        }
    };

    return (
        <div className="container mx-auto px-4 py-8 max-w-6xl animate-fade-in-up">
            {/* HEADER */}
            <div className="flex flex-col md:flex-row justify-between items-center mb-10 gap-6">
                <div>
                    <h1 className="text-3xl md:text-4xl font-extrabold text-brand-dark font-primary mb-2">Bonjour ! 👋</h1>
                    <p className="text-gray-600 font-medium">Gérez votre carrière d'opticien et suivez vos opportunités.</p>
                </div>
                <div className="flex gap-4">
                    <Link to="/candidat/profil" className="bg-white border border-gray-200 text-gray-700 px-5 py-3 rounded-xl font-bold hover:bg-gray-50 transition-colors shadow-sm hover:shadow">
                        ✏️ Modifier mon CV
                    </Link>
                    <Link to="/missions" className="bg-brand-dark text-white px-5 py-3 rounded-xl font-bold hover:bg-black transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        🔍 Trouver une mission
                    </Link>
                </div>
            </div>

            {/* STATS */}
            <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div className="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-2xl border border-blue-200 shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
                    <div className="relative z-10">
                        <h3 className="text-blue-800 font-bold mb-1 text-sm uppercase tracking-wider">Candidatures</h3>
                        <p className="text-4xl font-extrabold text-blue-900 font-primary">{applications.length}</p>
                    </div>
                    <div className="absolute right-[-10px] bottom-[-10px] text-blue-200/50 transform group-hover:scale-110 transition-transform">
                        <svg className="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" /></svg>
                    </div>
                </div>

                <div className="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-2xl border border-purple-200 shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
                    <div className="relative z-10">
                        <h3 className="text-purple-800 font-bold mb-1 text-sm uppercase tracking-wider">Academy</h3>
                        <p className="text-4xl font-extrabold text-purple-900 font-primary">Niveau 1</p>
                        <div className="mt-2 inline-flex items-center text-xs font-bold text-purple-700 bg-white/50 px-2 py-1 rounded-lg">
                            <span className="w-1.5 h-1.5 bg-purple-500 rounded-full mr-2 animate-pulse"></span>
                            Entraînement en cours
                        </div>
                    </div>
                    <div className="absolute right-[-10px] bottom-[-10px] text-purple-200/50 transform group-hover:scale-110 transition-transform">
                        <svg className="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" /></svg>
                    </div>
                </div>

                <div className="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-2xl border border-green-200 shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
                    <div className="relative z-10">
                        <h3 className="text-green-800 font-bold mb-1 text-sm uppercase tracking-wider">Disponibilité</h3>
                        <div className="flex items-center gap-2 mt-2">
                            <span className="h-4 w-4 bg-green-500 rounded-full animate-pulse shadow-lg shadow-green-500/50"></span>
                            <span className="text-2xl font-bold text-green-900 font-primary">À l'écoute</span>
                        </div>
                    </div>
                    <div className="absolute right-[10px] bottom-[10px] text-green-200/50">
                        <div className="w-16 h-8 bg-green-300/30 rounded-full"></div>
                    </div>
                </div>
            </div>

            {/* TABLEAU */}
            <div className="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div className="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                    <h2 className="text-xl font-bold text-brand-dark flex items-center gap-2">
                        📂 Mes Candidatures <span className="text-gray-400 text-base font-normal">({applications.length})</span>
                    </h2>
                </div>

                {loading ? (
                    <div className="p-12 flex justify-center"><div className="animate-spin rounded-full h-10 w-10 border-b-2 border-brand-primary"></div></div>
                ) : applications.length === 0 ? (
                    <div className="p-20 text-center flex flex-col items-center">
                        <div className="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center text-4xl mb-4">📭</div>
                        <h3 className="text-xl font-bold text-gray-800 mb-2">Aucune candidature en cours</h3>
                        <p className="text-gray-500 mb-6 max-w-md">Vous n'avez pas encore postulé à des offres. C'est le moment de trouver votre prochaine mission !</p>
                        <Link to="/missions" className="bg-brand-primary text-white px-6 py-3 rounded-full font-bold hover:bg-orange-600 transition shadow-lg hover:shadow-brand-primary/30">
                            Explorer les offres
                        </Link>
                    </div>
                ) : (
                    <div className="overflow-x-auto">
                        <table className="w-full text-left">
                            <thead className="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider font-bold">
                                <tr>
                                    <th className="p-5">Poste</th>
                                    <th className="p-5">Entreprise</th>
                                    <th className="p-5">Ville</th>
                                    <th className="p-5">Statut</th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-gray-100">
                                {applications.map(app => (
                                    <tr key={app.id} className="hover:bg-blue-50/30 transition-colors group">
                                        <td className="p-5 font-bold text-brand-dark">{app.mission.title}</td>
                                        <td className="p-5 text-gray-600 font-medium">{app.mission.company.company_name || "Confidentiel"}</td>
                                        <td className="p-5 text-gray-500">{app.mission.city}</td>
                                        <td className="p-5">{getStatusBadge(app.status)}</td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                )}
            </div>
        </div>
    );
}
