import AcademyChat from '../components/AcademyChat';

export default function AcademyPage() {
    return (
        <div className="max-w-4xl mx-auto py-8">
            <div className="mb-8 text-center animate-fade-in-up">
                <h1 className="text-4xl font-extrabold text-brand-dark mb-3 font-primary">Académie <span className="text-brand-primary">OBLINK</span></h1>
                <p className="text-lg text-gray-600 max-w-2xl mx-auto">
                    Besoin d'aide pour vos révisions ? Le Professeur Virtuel est là pour répondre à toutes vos questions sur les modules du BTS Opticien-Lunetier.
                </p>
            </div>

            <div className="animate-fade-in-up" style={{ animationDelay: '100ms' }}>
                <AcademyChat />
            </div>

            <div className="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6 text-center text-sm text-gray-500 animate-fade-in-up" style={{ animationDelay: '200ms' }}>
                <div className="p-4 bg-white rounded-lg shadow-sm border border-gray-50">
                    <span className="text-2xl mb-2 block">📚</span>
                    <strong>Optique Géométrique</strong>
                    <p className="mt-1">Trajectoires, Dioptres, Systèmes centrés...</p>
                </div>
                <div className="p-4 bg-white rounded-lg shadow-sm border border-gray-50">
                    <span className="text-2xl mb-2 block">👁️</span>
                    <strong>Analyse de la Vision</strong>
                    <p className="mt-1">Amétropies, Vision binoculaire, Phories...</p>
                </div>
                <div className="p-4 bg-white rounded-lg shadow-sm border border-gray-50">
                    <span className="text-2xl mb-2 block">👓</span>
                    <strong>Technologie</strong>
                    <p className="mt-1">Matériaux, Montures, Prises de mesures...</p>
                </div>
            </div>
        </div>
    );
}
