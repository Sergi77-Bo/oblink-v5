import React, { useState, useEffect } from 'react';
import { useProfile } from '../hooks/useProfile';

const SOFTWARES = ['COSIUM', 'POLEYRE', 'IVOIR', 'OSIRIS', 'WINOPTICS'];

export default function ProfileForm() {
    const { profile, updateProfile } = useProfile();
    const [formData, setFormData] = useState({
        yearsExperience: 0,
        softwareSkills: [] as string[],
        isFreelance: false,
        hasEquipment: false,
        mobilityRadiusKm: 30
    });

    // Mettre à jour le formulaire quand le profil est chargé
    useEffect(() => {
        if (profile) {
            setFormData({
                yearsExperience: profile.yearsExperience || 0,
                softwareSkills: profile.softwareSkills || [],
                isFreelance: profile.isFreelance || false,
                hasEquipment: profile.hasEquipment || false,
                mobilityRadiusKm: profile.mobilityRadiusKm || 30
            });
        }
    }, [profile]);

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();
        try {
            await updateProfile(formData);
            alert("Profil mis à jour ! Vous êtes visible par les recruteurs.");
        } catch (err) {
            alert("Erreur lors de la sauvegarde : " + err);
        }
    };

    const toggleSoftware = (soft: string) => {
        setFormData(prev => {
            const skills = prev.softwareSkills.includes(soft)
                ? prev.softwareSkills.filter(s => s !== soft)
                : [...prev.softwareSkills, soft];
            return { ...prev, softwareSkills: skills };
        });
    };

    return (
        <div className="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-100">
            <h2 className="text-2xl font-bold mb-6 text-brand-dark font-primary">Votre Profil Opticien</h2>

            <form onSubmit={handleSubmit} className="space-y-6">

                {/* Expérience */}
                <div>
                    <label className="block text-sm font-medium text-gray-700 mb-1">Années d'expérience</label>
                    <input
                        type="number"
                        value={formData.yearsExperience}
                        onChange={e => setFormData({ ...formData, yearsExperience: parseInt(e.target.value) || 0 })}
                        className="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-brand-primary focus:border-brand-primary outline-none transition"
                    />
                </div>

                {/* Logiciels (Tags cliquables) */}
                <div>
                    <label className="block text-sm font-medium text-gray-700 mb-2">Logiciels maîtrisés</label>
                    <div className="flex gap-2 flex-wrap">
                        {SOFTWARES.map(soft => (
                            <button
                                key={soft}
                                type="button"
                                onClick={() => toggleSoftware(soft)}
                                className={`px-4 py-2 rounded-full text-sm font-medium transition ${formData.softwareSkills.includes(soft)
                                        ? 'bg-brand-primary text-white shadow-md'
                                        : 'bg-gray-100 text-gray-600 hover:bg-gray-200'
                                    }`}
                            >
                                {soft}
                            </button>
                        ))}
                    </div>
                </div>

                {/* Toggle Freelance */}
                    <div className="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <div>
                        <span className="font-medium text-gray-900">Mode Freelance</span>
                        <p className="text-sm text-gray-500">Je cherche des missions de remplacement</p>
                    </div>
                    <input
                        type="checkbox"
                            checked={formData.isFreelance}
                            onChange={e => setFormData({ ...formData, isFreelance: e.target.checked })}
                        className="h-5 w-5 text-brand-primary rounded focus:ring-brand-primary"
                    />
                </div>

                {/* Conditionnel : Si Freelance, afficher mobilité et matos */}
                {formData.isFreelance && (
                    <div className="pl-4 border-l-4 border-brand-secondary/30 space-y-4 animate-fade-in-up">
                        <label className="flex items-center space-x-2 cursor-pointer">
                            <input
                                type="checkbox"
                                checked={formData.hasEquipment}
                                onChange={e => setFormData({ ...formData, hasEquipment: e.target.checked })}
                                className="h-4 w-4 text-brand-primary rounded focus:ring-brand-primary"
                            />
                            <span className="text-sm text-gray-700">Je possède ma mallette (Frontofocomètre, etc.)</span>
                        </label>

                        <div>
                            <label className="text-sm font-medium text-gray-700">Mobilité : <span className="text-brand-primary font-bold">{formData.mobilityRadiusKm} km</span></label>
                            <input
                                type="range" min="0" max="200" step="10"
                                value={formData.mobilityRadiusKm}
                                onChange={e => setFormData({ ...formData, mobilityRadiusKm: parseInt(e.target.value) })}
                                className="w-full mt-2 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-brand-primary"
                            />
                        </div>
                    </div>
                )}

                <button type="submit" className="w-full bg-brand-dark text-white py-3 rounded-lg font-bold hover:bg-brand-primary transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    Enregistrer mon profil
                </button>
            </form>
        </div>
    );
}
