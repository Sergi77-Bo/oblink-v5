import { useState } from 'react';
import { API_URL } from '../config';

export default function ContractTool() {
    const [formData, setFormData] = useState({
        freelance_name: '',
        client_name: '',
        tjm: 300
    });

    const generatePDF = async (e: React.FormEvent) => {
        e.preventDefault();

        const response = await fetch(`${API_URL}/api/tools/generate-contract/`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(formData)
        });

        if (response.ok) {
            // Astuce pour télécharger le fichier binaire (blob)
            const blob = await response.blob();
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `Contrat_${formData.freelance_name}.pdf`;
            document.body.appendChild(a);
            a.click();
            a.remove();
        } else {
            alert("Erreur lors de la génération. Vérifiez que le backend tourne.");
        }
    };

    return (
        <div className="max-w-2xl mx-auto p-8 bg-white shadow-lg rounded-xl mt-10 animate-fade-in-up">
            <div className="text-center mb-8">
                <h1 className="text-3xl font-extrabold text-gray-800 mb-2">Générateur de Contrat <span className='text-brand-primary'>Freelance</span></h1>
                <p className="text-gray-600">Sécurisez vos missions. Téléchargez un contrat pro en 3 clics.</p>
            </div>

            <form onSubmit={generatePDF} className="space-y-6">
                <div>
                    <label className="block text-sm font-bold mb-2 text-gray-700">Votre Nom (Opticien)</label>
                    <input
                        type="text" required
                        className="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-brand-primary focus:border-transparent transition"
                        placeholder="ex: Jean Dupont"
                        value={formData.freelance_name}
                        onChange={e => setFormData({ ...formData, freelance_name: e.target.value })}
                    />
                </div>
                <div>
                    <label className="block text-sm font-bold mb-2 text-gray-700">Nom du Magasin (Client)</label>
                    <input
                        type="text" required
                        className="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-brand-primary focus:border-transparent transition"
                        placeholder="ex: Optique 2000 Paris"
                        value={formData.client_name}
                        onChange={e => setFormData({ ...formData, client_name: e.target.value })}
                    />
                </div>
                <div>
                    <label className="block text-sm font-bold mb-2 text-gray-700">Votre Tarif Journalier (€)</label>
                    <input
                        type="number" required
                        className="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-brand-primary focus:border-transparent transition"
                        value={formData.tjm}
                        onChange={e => setFormData({ ...formData, tjm: Number(e.target.value) })}
                    />
                </div>

                <button type="submit" className="w-full bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold py-4 rounded-lg hover:shadow-lg transform hover:-translate-y-1 transition duration-200">
                    📄 Télécharger mon Contrat (PDF)
                </button>
            </form>

            <p className="text-xs text-center text-gray-400 mt-6">
                Ce document est un modèle standard fourni à titre indicatif. OBLINK décline toute responsabilité juridique.
            </p>
        </div>
    );
}
