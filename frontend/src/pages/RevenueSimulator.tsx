import { useState } from 'react';
import { calculateFreelanceNet } from '../utils/calculator';
import { Link } from 'react-router-dom';

export default function RevenueSimulator() {
    const [tjm, setTjm] = useState(350); // Mzoyenne marché
    const [days, setDays] = useState(20); // Temps plein

    const { ca, netMicro } = calculateFreelanceNet(tjm, days);

    return (
        <div className="max-w-4xl mx-auto py-12 px-4 animate-fade-in-up">
            <div className="text-center mb-10">
                <h1 className="text-4xl font-extrabold text-brand-dark font-primary mb-3">Simulateur Revenus <span className="text-brand-primary">Freelance</span></h1>
                <p className="text-xl text-gray-600">Combien pourriez-vous gagner en devenant indépendant ?</p>
            </div>

            <div className="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div className="grid md:grid-cols-2">

                    {/* CONTRÔLES */}
                    <div className="p-8 md:p-10 bg-gray-50/50">
                        <h3 className="font-bold text-gray-800 mb-6 uppercase tracking-wider text-sm">Paramètres</h3>

                        <div className="mb-8">
                            <label className="block font-bold mb-2 text-brand-dark flex justify-between">
                                <span>Tarif Journalier (TJM)</span>
                                <span className="text-brand-primary">{tjm}€ / jour</span>
                            </label>
                            <input
                                type="range" min="200" max="600" step="10"
                                value={tjm} onChange={e => setTjm(Number(e.target.value))}
                                className="w-full h-3 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-brand-primary"
                            />
                            <div className="flex justify-between text-xs text-gray-400 mt-2 font-medium">
                                <span>Junior (200€)</span>
                                <span>Expert (600€)</span>
                            </div>
                        </div>

                        <div>
                            <label className="block font-bold mb-2 text-brand-dark flex justify-between">
                                <span>Jours travaillés / mois</span>
                                <span className="text-brand-primary">{days} jours</span>
                            </label>
                            <input
                                type="range" min="1" max="25" step="1"
                                value={days} onChange={e => setDays(Number(e.target.value))}
                                className="w-full h-3 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-brand-primary"
                            />
                            <div className="flex justify-between text-xs text-gray-400 mt-2 font-medium">
                                <span>Temps partiel</span>
                                <span>Full time (25)</span>
                            </div>
                        </div>
                    </div>

                    {/* RÉSULTATS */}
                    <div className="p-8 md:p-10 bg-brand-dark text-white flex flex-col justify-center relative overflow-hidden">
                        <div className="relative z-10 text-center">
                            <p className="text-gray-400 text-sm uppercase tracking-widest mb-2 font-bold">Chiffre d'Affaires Mensuel</p>
                            <p className="text-4xl font-bold mb-8">{ca.toLocaleString('fr-FR')} €</p>

                            <div className="border-t border-white/10 pt-8">
                                <p className="text-brand-primary text-sm uppercase tracking-widest mb-2 font-bold animate-pulse">Net estimé (Poche)</p>
                                <p className="text-6xl font-extrabold leading-none">{netMicro.toLocaleString('fr-FR')} €</p>
                                <p className="text-xs text-gray-500 mt-4">*Estimation Micro-Entreprise (~23% charges social), hors impôt et frais pro.</p>
                            </div>
                        </div>

                        {/* Decoration */}
                        <div className="absolute top-[-50px] right-[-50px] w-40 h-40 bg-brand-primary/10 rounded-full blur-3xl"></div>
                        <div className="absolute bottom-[-50px] left-[-50px] w-40 h-40 bg-blue-500/10 rounded-full blur-3xl"></div>
                    </div>
                </div>
            </div>

            {/* CTA CONVERSION */}
            <div className="mt-10 text-center max-w-2xl mx-auto">
                <h3 className="text-2xl font-bold text-gray-800 mb-4">Ce résultat vous intéresse ?</h3>
                <p className="text-gray-600 mb-6">Des dizaines d'opticiens gagnent déjà ce montant grâce à OBLINK. Trouvez une mission qui correspond à vos attentes.</p>
                <Link to="/missions" className="inline-flex items-center gap-2 bg-gradient-to-r from-brand-primary to-orange-600 text-white font-bold py-4 px-10 rounded-full shadow-lg hover:shadow-orange-500/30 hover:-translate-y-1 transition-all transform text-lg">
                    Voir les missions à {tjm}€ / jour
                    <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </Link>
            </div>
        </div>
    );
}
