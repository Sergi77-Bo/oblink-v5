import { Link } from 'react-router-dom';
import { useMissions } from '../hooks/useMissions';
import { motion } from 'framer-motion';
import { Briefcase, MapPin, Code } from 'lucide-react';

export default function MissionList() {
    const { missions, loading, error } = useMissions();

    if (loading) {
        return (
            <div className="flex items-center justify-center p-20">
                <div className="relative">
                    <div className="w-16 h-16 border-4 border-orange-200 border-t-orange-600 rounded-full animate-spin"></div>
                    <div className="absolute inset-0 w-16 h-16 border-4 border-transparent border-t-purple-600 rounded-full animate-spin" style={{ animationDirection: 'reverse', animationDuration: '1s' }}></div>
                </div>
            </div>
        );
    }

    if (error) {
        return (
            <div className="p-10 text-center">
                <div className="inline-block px-6 py-4 bg-red-50 border border-red-200 rounded-2xl">
                    <p className="text-red-600 font-medium">⚠️ {error}</p>
                </div>
            </div>
        );
    }

    if (missions.length === 0) {
        return (
            <div className="p-20 text-center">
                <div className="inline-block px-8 py-6 glass rounded-3xl">
                    <p className="text-gray-500 text-lg">Aucune mission disponible pour le moment.</p>
                </div>
            </div>
        );
    }

    return (
        <div className="relative">
            {/* Liquid Glass Background Blobs */}
            <div className="liquid-glass-blob blob-1"></div>
            <div className="liquid-glass-blob blob-2"></div>
            <div className="liquid-glass-blob blob-3"></div>

            <div className="grid gap-8 md:grid-cols-2 lg:grid-cols-3 relative z-10">
                {missions.map((mission, index) => (
                    <motion.div
                        key={mission.id}
                        initial={{ opacity: 0, y: 30 }}
                        animate={{ opacity: 1, y: 0 }}
                        transition={{ duration: 0.5, delay: index * 0.1 }}
                        className="group relative"
                    >
                        {/* Mission Card - Liquid Glass */}
                        <div className="relative p-6 glass rounded-2xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full flex flex-col">

                            {/* Gradient Overlay on Hover */}
                            <div className="absolute inset-0 bg-gradient-to-br from-orange-500/10 via-transparent to-purple-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                            {/* Shimmer Effect */}
                            <div className="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                                <div className="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                            </div>

                            <div className="relative z-10 flex-1 flex flex-col">
                                {/* Header */}
                                <div className="flex justify-between items-start mb-4">
                                    <div className="flex-1">
                                        <h3 className="font-bold text-xl text-gray-900 leading-tight mb-1 group-hover:text-orange-600 transition-colors duration-300">
                                            {mission.title}
                                        </h3>
                                        <p className="text-sm text-gray-500 font-medium flex items-center gap-1">
                                            <Briefcase className="w-3.5 h-3.5" />
                                            {mission.company?.companyName || 'Entreprise confidentielle'}
                                        </p>
                                    </div>
                                    <span className="ml-3 px-3 py-1.5 text-xs font-bold rounded-full bg-gradient-to-r from-orange-500 to-purple-600 text-white shadow-lg group-hover:shadow-orange-500/50 transition-shadow duration-300">
                                        {mission.jobType}
                                    </span>
                                </div>

                                {/* Description */}
                                <p className="text-gray-600 text-sm mb-4 line-clamp-3 flex-1">
                                    {mission.description}
                                </p>

                                {/* Software Tags */}
                                {mission.softwareRequired && mission.softwareRequired.length > 0 && (
                                    <div className="flex flex-wrap gap-2 mb-4">
                                        {mission.softwareRequired.map((soft) => (
                                            <span
                                                key={soft}
                                                className="inline-flex items-center gap-1 px-2.5 py-1 bg-gradient-to-r from-orange-50 to-purple-50 text-orange-700 text-xs font-semibold rounded-lg border border-orange-200/50 group-hover:border-orange-400/50 transition-colors duration-300"
                                            >
                                                <Code className="w-3 h-3" />
                                                {soft}
                                            </span>
                                        ))}
                                    </div>
                                )}

                                {/* Footer */}
                                <div className="flex justify-between items-center pt-4 mt-auto border-t border-gray-200/50">
                                    <div className="flex items-center gap-1.5 text-sm text-gray-600 font-medium">
                                        <MapPin className="w-4 h-4 text-orange-500" />
                                        <span>{mission.city}</span>
                                    </div>
                                    <Link
                                        to={`/missions/${mission.id}`}
                                        className="relative px-5 py-2.5 bg-gradient-to-r from-orange-600 to-purple-600 text-white text-sm font-bold rounded-xl overflow-hidden group/btn transition-all duration-300 hover:shadow-lg hover:shadow-orange-500/50 hover:-translate-y-0.5"
                                    >
                                        <span className="relative z-10">Voir l'offre</span>
                                        <div className="absolute inset-0 bg-gradient-to-r from-orange-500 to-purple-500 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></div>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </motion.div>
                ))}
            </div>
        </div>
    );
}
