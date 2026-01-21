import { useState } from 'react';
import { useNavigate } from 'react-router-dom';

export default function CreateMission() {
    const navigate = useNavigate();
    const [formData, setFormData] = useState({
        title: '',
        job_type: 'CDI',
        city: '',
        description: '',
        daily_rate: '',
        software_required: [] as string[]
    });

    const softwares = ['COSIUM', 'POLEYRE', 'IVOIR', 'OSIRIS', 'WINOPTICS'];

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();
        const token = localStorage.getItem('access_token');

        try {
            const res = await fetch('http://localhost:8000/api/missions/', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify(formData)
            });

            if (res.ok) {
                alert("Mission publiée avec succès !");
                navigate('/recruteur/dashboard');
            } else {
                alert("Erreur lors de la publication.");
            }
        } catch (err) {
            alert("Erreur réseau");
        }
    };

    const toggleSoftware = (soft: string) => {
        setFormData(prev => ({
            ...prev,
            software_required: prev.software_required.includes(soft)
                ? prev.software_required.filter(s => s !== soft)
                : [...prev.software_required, soft]
        }));
    };

    return (
        <div className="max-w-2xl mx-auto py-10">
            <h1 className="text-3xl font-bold mb-8 text-brand-dark">Publier une nouvelle offre</h1>

            <form onSubmit={handleSubmit} className="bg-white p-8 shadow-lg rounded-xl space-y-6">
                <div>
                    <label className="block font-medium mb-1">Titre du poste</label>
                    <input
                        type="text"
                        className="w-full border p-3 rounded-lg"
                        value={formData.title}
                        onChange={e => setFormData({ ...formData, title: e.target.value })}
                        placeholder="Ex: Opticien Collaborateur"
                        required
                    />
                </div>

                <div className="grid grid-cols-2 gap-4">
                    <div>
                        <label className="block font-medium mb-1">Type de contrat</label>
                        <select
                            className="w-full border p-3 rounded-lg"
                            value={formData.job_type}
                            onChange={e => setFormData({ ...formData, job_type: e.target.value })}
                        >
                            <option value="CDI">CDI</option>
                            <option value="FREELANCE">Freelance</option>
                            <option value="ALTERNANCE">Alternance</option>
                        </select>
                    </div>
                    <div>
                        <label className="block font-medium mb-1">Ville</label>
                        <input
                            type="text"
                            className="w-full border p-3 rounded-lg"
                            value={formData.city}
                            onChange={e => setFormData({ ...formData, city: e.target.value })}
                            placeholder="Ex: Paris 15"
                            required
                        />
                    </div>
                </div>

                <div>
                    <label className="block font-medium mb-1">Taux Journalier / Salaire</label>
                    <input
                        type="number"
                        className="w-full border p-3 rounded-lg"
                        value={formData.daily_rate}
                        onChange={e => setFormData({ ...formData, daily_rate: e.target.value })}
                        placeholder="Ex: 350"
                    />
                </div>

                <div>
                    <label className="block font-medium mb-1">Logiciels maîtrisés</label>
                    <div className="flex flex-wrap gap-2">
                        {softwares.map(soft => (
                            <button
                                key={soft}
                                type="button"
                                onClick={() => toggleSoftware(soft)}
                                className={`px-3 py-1 rounded-full text-sm border ${formData.software_required.includes(soft)
                                        ? 'bg-brand-primary text-white border-brand-primary'
                                        : 'bg-white text-gray-600 border-gray-300'
                                    }`}
                            >
                                {soft}
                            </button>
                        ))}
                    </div>
                </div>

                <div>
                    <label className="block font-medium mb-1">Description</label>
                    <textarea
                        className="w-full border p-3 rounded-lg h-32"
                        value={formData.description}
                        onChange={e => setFormData({ ...formData, description: e.target.value })}
                        placeholder="Description du poste, équipe, avantages..."
                        required
                    />
                </div>

                <button type="submit" className="w-full bg-brand-dark text-white font-bold py-4 rounded-xl hover:bg-black transition">
                    Publier l'offre 🚀
                </button>
            </form>
        </div>
    );
}
